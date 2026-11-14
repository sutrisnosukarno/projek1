<?php

include "config/koneksi.php";

$data = mysqli_query($conn,
    "SELECT * FROM artikel
     WHERE status='Publish'
     ORDER BY tanggal DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Artikel Kursus Komputer</title>
</head>

<body>

<h1>Artikel</h1>

<nav>
    <a href="index.php">Home</a> |
    <a href="paket.php">Paket Kursus</a> |
    <a href="pendaftaran.php">Pendaftaran</a> |
    <a href="artikel.php">Artikel</a>
</nav>

<hr>

<?php while ($a = mysqli_fetch_assoc($data)) { ?>

<h2>

<a href="detail_artikel.php?id=<?= $a['id']; ?>">

<?= htmlspecialchars($a['judul']); ?>

</a>

</h2>

<p>
Tanggal: <?= $a['tanggal']; ?>
</p>

<?php
$ringkas = substr(strip_tags($a['isi']), 0, 200);
?>

<p>
<?= htmlspecialchars($ringkas); ?>...
</p>

<a href="detail_artikel.php?id=<?= $a['id']; ?>">
Baca Selengkapnya
</a>

<hr>

<?php } ?>

</body>
</html>