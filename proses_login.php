<?php
include'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$user = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password' ");

if (mysqli_num_rows($user) > 0) {
   
    $data = mysqli_fetch_array($user);
    echo"
    <script>
    alert('Login Berhasil! ')
    window.location.href='home.php'
    </script>";
}

else {
    echo"
    <script>
    alert('Login Gagal !')
    window.location.href='index.php'
    </script>";
}