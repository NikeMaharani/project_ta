<?php
session_start();
include 'koneksi.php';

$data_user = $_POST['email'];
$data_password = $_POST['password'];

// Query untuk mengecek user berdasarkan email dan password
$query = mysqli_query($koneksi, "SELECT * FROM multi_user WHERE email='$data_user' AND password='$data_password'");

if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);

    $_SESSION['email'] = $data_user;
    $_SESSION['role'] = $row['role'];
    $_SESSION['login'] = true;

    // Arahkan pengguna berdasarkan role
    if ($row['role'] == 'admin') {
        header("location:dashboard.php"); // Admin diarahkan ke dashboard admin
    } elseif ($row['role'] == 'user') {
        header("location:home.php"); // User diarahkan ke halaman home
    }
} else {
    echo "<script>
            alert('Email atau Password salah!');
            window.location.replace('login.php');
          </script>";
}
?>
