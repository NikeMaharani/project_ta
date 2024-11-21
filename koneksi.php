<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "maharani_shop";

$koneksi = new mysqli('localhost', 'root', '', 'maharani_shop');

if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>