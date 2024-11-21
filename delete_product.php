<?php
include 'koneksi.php';

if (isset($_GET['id_product']) && !isset($_GET['confirm'])) {
    $id = $_GET['id_product'];

    $check_order = mysqli_query($koneksi, "SELECT * FROM order_item WHERE id_product = $id");

    if (mysqli_num_rows($check_order) > 0) {
        // Jika produk sudah dipesan, tampilkan alert
        echo "<script>
            alert('Produk tidak dapat dihapus karena sedang dalam pesanan.');
            window.location.href = 'product.php';
        </script>";
    } else {
        // Jika produk belum dipesan, minta konfirmasi penghapusan
        echo "<script>
            var confirmDelete = confirm('Apakah Anda yakin ingin menghapus produk ini?');
            if (confirmDelete) {
                window.location.href = 'delete_product.php?confirm=yes&id_product=$id';
            } else {
                window.location.href = 'product.php';
            }
        </script>";
    }
}

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id = $_GET['id_product'];

    $query = mysqli_query($koneksi, "DELETE FROM products WHERE id_product = $id");

    if ($query) {
        echo "<script>";
        echo "alert('Produk berhasil dihapus!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Gagal menghapus Produk!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
    }
}
?>
