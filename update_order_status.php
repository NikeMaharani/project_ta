<?php
session_start();
include 'koneksi.php';

if (isset($_GET['id_order']) && isset($_GET['status'])) {
    $orderId = $_GET['id_order'];
    $status = $_GET['status'];

    // Update the order status in the database
    $updateQuery = "UPDATE orders SET status = '$status' WHERE id_order = '$orderId'";
    $result = mysqli_query($koneksi, $updateQuery);

    if ($result) {
        // Add the order ID to the session array for tracking sent orders
        if (!isset($_SESSION['sent_orders'])) {
            $_SESSION['sent_orders'] = [];
        }
        $_SESSION['sent_orders'][] = $orderId;

        // Set success message
        $_SESSION['message'] = "Pesanan dengan ID $orderId telah berhasil dikirim.";
    } else {
        // Set error message
        $_SESSION['message'] = "Gagal mengupdate pesanan: " . mysqli_error($koneksi);
    }
}

// Redirect back to the data order page
header('Location: data_order.php');
exit;
?>
