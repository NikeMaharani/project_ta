<?php
include 'koneksi.php';

if (isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];

    // Ubah status pesanan menjadi "selesai"
    $query = "UPDATE orders SET status = 'selesai' WHERE id_order = '$id_order'";
    mysqli_query($koneksi, $query);
}

header("Location: riwayat_pesanan.php"); // Kembali ke halaman riwayat pesanan
exit();
?>
