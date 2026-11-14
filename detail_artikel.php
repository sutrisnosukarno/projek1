<?php

include "config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,
    "SELECT * FROM artikel
     WHERE id='$id'
     AND status='Publish'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Artikel tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title><?= htmlspecialchars($data['judul']); ?></title>
</head>

<body>

<h1><?= htmlspecialchars($data['judul']); ?></h1>

<p>
Tanggal: <?= $data['tanggal']; ?>
</p>

<hr>

<p>
<?= nl2br(htmlspecialchars($data['isi'])); ?>
</p>

<hr>

<a href="artikel.php">Kembali ke Artikel</a>

</body>
</html>