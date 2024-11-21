<?php
include "koneksi.php";

$id = $_GET['id_multi'];

$id = intval($id);

$query = mysqli_query($koneksi, "DELETE FROM multi_user WHERE id_multi=$id");

if($query){
  echo "<script>";
  echo "alert('Delete Data Berhasil!');";
  echo "window.location.replace('data_user.php')";
  echo "</script>";
} else {
  echo "<script>";
  echo "alert('Delete Data Gagal!');";
  echo "window.location.replace('data_user.php')";
  echo "</script>";
}
?>
