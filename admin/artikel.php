<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($conn,
    "SELECT * FROM artikel ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Artikel</title>
</head>

<body>

<h1>Kelola Artikel</h1>

<nav>
    <a href="index.php">Dashboard</a> |
    <a href="paket.php">Paket Kursus</a> |
    <a href="pendaftaran.php">Pendaftaran</a> |
    <a href="artikel.php">Artikel</a> |
    <a href="logout.php">Logout</a>
</nav>

<hr>

<p>
    <a href="artikel_tambah.php">+ Tambah Artikel</a>
</p>

<table border="1" cellpadding="8">

<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Slug</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php

$no = 1;

while ($a = mysqli_fetch_assoc($data)) {

?>

<tr>

<td><?= $no++; ?></td>

<td>
<?= htmlspecialchars($a['judul']); ?>
</td>

<td>
<?= htmlspecialchars($a['slug']); ?>
</td>

<td>
<?= $a['tanggal']; ?>
</td>

<td>
<?= $a['status']; ?>
</td>

<td>

<a href="artikel_edit.php?id=<?= $a['id']; ?>">
Edit
</a>

|

<a href="artikel_hapus.php?id=<?= $a['id']; ?>"
onclick="return confirm('Yakin ingin menghapus artikel ini?')">
Hapus
</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>