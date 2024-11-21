<?php
session_start(); // Pastikan session dimulai

// Hapus keranjang belanja setelah sukses
if (isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

// include 'layout/header2.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .success-icon {
            font-size: 50px;
            color: #28a745; /* Warna hijau */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card text-center">
        <div class="card-body">
            <div class="mb-4">
                <i class="bi bi-check-circle success-icon"></i> <!-- Gambar centang -->
            </div>
            <h5 class="card-title">Order Berhasil</h5>
            <p class="card-text">Terima kasih telah berbelanja! Pesanan Anda telah berhasil diproses.</p>
            <a href="Riwayat.php" class="btn btn-primary">Lihat Riwayat Pesanan</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Tambahkan Bootstrap Icons CDN untuk ikon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</body>
</html>
