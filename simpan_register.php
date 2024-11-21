<?php
include 'koneksi.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = 'user';

// Query untuk memeriksa apakah username atau email sudah digunakan
$check_query = mysqli_query($koneksi, "SELECT * FROM multi_user WHERE username = '$username' OR email = '$email'");

if (mysqli_num_rows($check_query) > 0) {
    // Ambil data user untuk mengecek apakah username atau email yang sudah terdaftar
    $row = mysqli_fetch_assoc($check_query);
    
    if ($row['username'] == $username) {
        echo "<script>
        alert('Username sudah terdaftar, silakan gunakan username lain.');
        window.location.replace('register.php');
        </script>";
    } elseif ($row['email'] == $email) {
        echo "<script>
        alert('Email sudah terdaftar, silakan gunakan email lain.');
        window.location.replace('register.php');
        </script>";
    }
} else {
    // Insert data baru ke tabel users jika tidak ada yang duplikat
    $query = mysqli_query($koneksi, "INSERT INTO multi_user VALUES (null, '$username', '$email', '$password', '$role')");

    if ($query) {
        echo "<script>
        alert('Registrasi berhasil!');
        window.location.replace('login.php');
        </script>";
    } else {
        echo "<script>
        alert('Registrasi gagal! " . mysqli_error($koneksi) . "');
        window.location.replace('register.php');
        </script>";
    }
}
?>
