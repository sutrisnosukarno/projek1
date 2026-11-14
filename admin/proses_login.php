<?php

session_start();

include "../config/koneksi.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn,
    "SELECT * FROM admin
     WHERE username='$username'
     AND password='$password'"
);

$data = mysqli_fetch_assoc($query);

if ($data) {

    $_SESSION['admin'] = $data['id'];

    header("Location: index.php");
    exit;

} else {

    echo "<h2>Login gagal</h2>";

    echo "<p>Username atau password salah.</p>";

    echo '<a href="login.php">Kembali Login</a>';

}

?>