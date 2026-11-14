<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_POST['id'];
$status = $_POST['status'];

mysqli_query($conn,
    "UPDATE pendaftaran
     SET status='$status'
     WHERE id='$id'"
);

header("Location: pendaftaran.php");

exit;

?>