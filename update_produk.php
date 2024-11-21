<?php
include 'koneksi.php';

$nama = $_POST['product_name'];
$harga = $_POST['price'];
$id = $_POST['id_product'];

$query = mysqli_query($conn, "UPDATE products SET product_name='$nama', price='$harga' WHERE id_product='$id'");
$rand = rand();
    $ekstensi = array('png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi)){
        echo "<script>";
        echo "alert('Gagal Ekstensi!!!!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
    }if(!$filename){
        $query = "UPDATE products SET product_name='$nama', price='$harga' WHERE id_product=$id";
    }else{
        if($ukuran < 1044070){
            $xx = $rand.'.'.$ext;
            move_uploaded_file($_FILES['foto']['tmp_name'],'gambar/'.$rand.'.'.$ext);
            $query = "UPDATE poducts SET product_name='$nama', price='$harga', picture='$xx' WHERE id_product=$id";
        }else{
            echo "<script>";
            echo "alert('Gagal ukuran file!!!');";
            echo "window.location.replace('product.php')";
            echo "</script>";
        }
    }

    $query = mysqli_query($koneksi, $query);

if ($query) {
  echo "<script>";
  echo "alert('Update Data Berhasil!!!');";
  echo "window.location.replace('product.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Update Data Gagal!!!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
}
?>