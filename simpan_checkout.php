<?php
session_start(); // Start session to access cart data
include 'koneksi.php'; // Include database connection

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    echo "You must be logged in to checkout!";
    exit;
}

// Get user email from session
$email = $_SESSION['email'];

// Prepare statement to get user ID from email
$stmt = $koneksi->prepare("SELECT id_multi FROM multi_user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id_user);
$stmt->fetch();
$stmt->close();

// Check if id_user was found
if (!isset($id_user)) {
    echo "User ID not found.";
    exit;
}

$status = "Pesan"; // Default order status
$order_date = date('Y-m-d H:i:s'); // Get current date and time
$total_amount = 0; // Will calculate this based on the cart items

// Check if cart is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {

    // Start a database transaction for atomicity
    $koneksi->begin_transaction();

    try {
        // Step 1: Insert into `orders` table
        $order_sql = "INSERT INTO orders (total_ammount, order_date, status, id_multi) VALUES (?, ?, ?, ?)";
        $order_stmt = $koneksi->prepare($order_sql);
        $order_stmt->bind_param("dssi", $total_amount, $order_date, $status, $id_user);
        
        if ($order_stmt->execute()) {
            // Get the last inserted order ID
            $order_id = $koneksi->insert_id;

            // Step 2: Insert into `order_items` table
            $order_item_sql = "INSERT INTO order_item (quantity, id_order, id_product) VALUES (?, ?, ?)";
            $order_item_stmt = $koneksi->prepare($order_item_sql);
            $order_item_stmt->bind_param("iii", $quantity, $order_id, $id_product);

            // Loop through cart items
            foreach ($_SESSION['cart'] as $id => $product) {
                $id_product = $id;
                $quantity = $product['quantity'];
                $price = $product['price'];
                $subtotal = $price * $quantity;
                
                // Add product's subtotal to total amount
                $total_amount += $subtotal;

                // Insert order item into the database
                if (!$order_item_stmt->execute()) {
                    throw new Exception("Failed to insert order item: " . $order_item_stmt->error);
                }

                // Step 3: Update the stock in the `products` table
                $update_stock_sql = "UPDATE products SET stock = stock - ? WHERE id_product = ?";
                $update_stock_stmt = $koneksi->prepare($update_stock_sql);
                $update_stock_stmt->bind_param("ii", $quantity, $id_product);

                if (!$update_stock_stmt->execute()) {
                    throw new Exception("Failed to update stock: " . $update_stock_stmt->error);
                }
            }

            // Step 4: Update the total amount in the `orders` table
            $update_total_sql = "UPDATE orders SET total_ammount = ? WHERE id_order = ?";
            $update_total_stmt = $koneksi->prepare($update_total_sql);
            $update_total_stmt->bind_param("di", $total_amount, $order_id);
            $update_total_stmt->execute();

            // Commit the transaction
            $koneksi->commit();
            
            // Clear the cart
            unset($_SESSION['cart']);
            
            // Redirect to success page
            header("Location: checkout_success.php");
            exit;

        } else {
            throw new Exception("Failed to insert order: " . $order_stmt->error);
        }
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $koneksi->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Your cart is empty!";
}

// Close the database connection
$koneksi->close();
?>
