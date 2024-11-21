<?php
include 'koneksi.php';


$id = $_POST['id'];
$nama = $_POST['product_name'];
$deskripsi = $_POST['description'];
$stok = $_POST['stock'];
$harga = $_POST['price'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg', 'gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if (!$filename) {
    
    $query = "UPDATE products SET product_name='$nama', description='$deskripsi', stock='$stok', price='$harga' WHERE id_product=$id";
} else {
    
    if ($ukuran < 1044070) {
        $xx = $rand . '.' . $ext;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $xx);
        $query = "UPDATE products SET picture='$xx', product_name='$nama', description='$deskripsi', stock='$stok', price='$harga' WHERE id_product=$id";
    } else {
        echo "<script>
        alert('Gagal ukuran file!!!');
        window.location.replace('product.php');
        </script>";
        exit();
    }
}


$result = mysqli_query($koneksi, $query);

if ($result) {
    echo "<script>
    alert('Update Data Berhasil!!!');
    window.location.replace('product.php');
    </script>";
} else {
    echo "<script>
    alert('Update Data Gagal!!!');
    window.location.replace('product.php');
    </script>";
}
?>
