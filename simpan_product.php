<?php
    include "koneksi.php";
    $produk = $_POST['product_name'];
    $deskripsi = $_POST['description'];
    $stok = $_POST['stock'];
    $harga = $_POST['price'];

    $rand = rand();
    $ekstensi = array('png','jpg','jpeg');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi)){
        echo "<script>";
        echo "alert('Gagal Ekstensi!!!!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
    }if(!$filename){
        $query = "INSERT INTO products VALUES (null,'', '$produk', '$deskripsi', '$stok', '$harga')";
    }else{
        if($ukuran < 1044070){
            $xx = $rand.'.'.$ext;
            move_uploaded_file($_FILES['foto']['tmp_name'],'uploads/'.$rand.'.'.$ext);
            $query = "INSERT INTO products VALUES (null,'$xx', '$produk', '$deskripsi', '$stok', '$harga')";
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
        echo "alert('Tambah Produk Berhasil!');";
        echo "window.location.replace('product.php')";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Tambah Produk Gagal!');";
        echo "window.location.replace('add_product.php')";
        echo "</script>";
    }
    
?>