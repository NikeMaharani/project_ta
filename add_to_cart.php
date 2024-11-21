<?php
session_start(); 
include 'koneksi.php'; 


if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    
    $product_id = mysqli_real_escape_string($koneksi, $_GET['id']);

    
    $query = "SELECT * FROM products WHERE id_product = '$product_id'";
    $result = mysqli_query($koneksi, $query);

    
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);

        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array(); 
        }

        
        if (isset($_SESSION['cart'][$product_id])) {
            
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        } else {
            
            $_SESSION['cart'][$product_id] = array(
                'id_product' => $product['id_product'],
                'name' => $product['product_name'],
                'price' => $product['price'],
                'quantity' => 1,
                'image' => $product['picture'] 
            );
        }

        
        header('Location: keranjang.php');
        exit(); 
    } else {
        echo "Peoduk tidak ditemukan."; 
    }
} else {
    echo "ID produk tidak ada.";
}


mysqli_close($koneksi);
?>
