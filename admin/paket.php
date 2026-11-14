<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($conn,
    "SELECT * FROM paket_kursus
     ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Kelola Paket</title>
</head>

<body>

<h1>Kelola Paket Kursus</h1>

<a href="index.php">Dashboard</a> |
<a href="paket_tambah.php">Tambah Paket</a> |
<a href="pendaftaran.php">Pendaftaran</a> |
<a href="artikel.php">Artikel</a> |
<a href="logout.php">Logout</a>

<hr>

<table border="1" cellpadding="8">

<tr>

<th>No</th>
<th>Nama Paket</th>
<th>Pertemuan</th>
<th>Durasi</th>
<th>Biaya</th>
<th>Status</th>
<th>Aksi</th>

</tr>

<?php

$no = 1;

while ($p = mysqli_fetch_assoc($data)) {

?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($p['nama_paket']); ?></td>

<td><?= $p['jumlah_pertemuan']; ?></td>

<td><?= $p['durasi_pertemuan']; ?> menit</td>

<td>
Rp <?= number_format($p['biaya'],0,',','.'); ?>
</td>

<td><?= $p['status']; ?></td>

<td>

<a href="paket_edit.php?id=<?= $p['id']; ?>">
Edit
</a>

|

<a href="paket_hapus.php?id=<?= $p['id']; ?>"
onclick="return confirm('Hapus paket ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>