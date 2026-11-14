<?php
include "config/koneksi.php";

$data = mysqli_query($conn,
    "SELECT * FROM paket_kursus
     WHERE status='Aktif'
     ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paket Kursus</title>
</head>

<body>

<h1>Paket Kursus Komputer</h1>

<nav>
    <a href="index.php">Home</a> |
    <a href="paket.php">Paket Kursus</a> |
    <a href="pendaftaran.php">Pendaftaran</a> |
    <a href="artikel.php">Artikel</a>
</nav>

<hr>

<?php while ($p = mysqli_fetch_assoc($data)) { ?>

<h2><?= htmlspecialchars($p['nama_paket']); ?></h2>

<p><?= nl2br(htmlspecialchars($p['deskripsi'])); ?></p>

<p>
Jumlah Pertemuan:
<?= $p['jumlah_pertemuan']; ?>
</p>

<p>
Durasi:
<?= $p['durasi_pertemuan']; ?> menit/pertemuan
</p>

<p>
Biaya:
<strong>
Rp <?= number_format($p['biaya'],0,',','.'); ?>
</strong>
</p>

<p>
<a href="pendaftaran.php?id_paket=<?= $p['id']; ?>">
    DAFTAR SEKARANG
</a>
</p>

<hr>

<?php } ?>

</body>
</html>