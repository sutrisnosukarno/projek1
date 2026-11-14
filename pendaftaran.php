<?php

include "config/koneksi.php";

$id_paket = isset($_GET['id_paket']) ? $_GET['id_paket'] : '';

$paket = mysqli_query($conn,
    "SELECT * FROM paket_kursus
     WHERE status='Aktif'
     ORDER BY nama_paket"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Pendaftaran Kursus</title>
</head>

<body>

<h1>Form Pendaftaran Kursus</h1>

<nav>
    <a href="index.php">Home</a> |
    <a href="paket.php">Paket Kursus</a> |
    <a href="pendaftaran.php">Pendaftaran</a> |
    <a href="artikel.php">Artikel</a>
</nav>

<hr>

<form action="proses_pendaftaran.php" method="POST">

<table>

<tr>
<td>Nama Lengkap</td>
<td>
<input type="text" name="nama" required>
</td>
</tr>

<tr>
<td>No. HP / WhatsApp</td>
<td>
<input type="text" name="no_hp" required>
</td>
</tr>

<tr>
<td>Email</td>
<td>
<input type="email" name="email">
</td>
</tr>

<tr>
<td>Alamat</td>
<td>
<textarea name="alamat"></textarea>
</td>
</tr>

<tr>
<td>Paket Kursus</td>
<td>

<select name="id_paket" required>

<option value="">-- Pilih Paket --</option>

<?php while ($p = mysqli_fetch_assoc($paket)) { ?>

<option value="<?= $p['id']; ?>"
<?php
if ($id_paket == $p['id']) {
    echo "selected";
}
?>
>
<?= htmlspecialchars($p['nama_paket']); ?>
-
Rp <?= number_format($p['biaya'],0,',','.'); ?>
</option>

<?php } ?>

</select>

</td>
</tr>

<tr>
<td>Pilihan Jadwal</td>
<td>

<select name="jadwal">

<option value="Senin - Jumat Pagi">
Senin - Jumat Pagi
</option>

<option value="Senin - Jumat Siang">
Senin - Jumat Siang
</option>

<option value="Senin - Jumat Sore">
Senin - Jumat Sore
</option>

<option value="Sabtu">
Sabtu
</option>

</select>

</td>
</tr>

<tr>
<td>Keterangan</td>
<td>
<textarea name="keterangan"></textarea>
</td>
</tr>

<tr>
<td></td>
<td>
<button type="submit">DAFTAR</button>
</td>
</tr>

</table>

</form>

</body>
</html>