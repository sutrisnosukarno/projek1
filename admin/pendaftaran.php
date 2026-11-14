<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$data = mysqli_query($conn,
    "SELECT p.*, k.nama_paket
     FROM pendaftaran p
     JOIN paket_kursus k
     ON p.id_paket = k.id
     ORDER BY p.id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Pendaftaran</title>
</head>

<body>

<h1>Data Pendaftaran Kursus</h1>

<a href="index.php">Dashboard</a> |
<a href="paket.php">Paket Kursus</a> |
<a href="artikel.php">Artikel</a> |
<a href="logout.php">Logout</a>

<hr>

<table border="1" cellpadding="8">

<tr>

<th>No</th>
<th>Nama</th>
<th>No HP</th>
<th>Paket</th>
<th>Jadwal</th>
<th>Tanggal</th>
<th>Status</th>
<th>Aksi</th>

</tr>

<?php

$no = 1;

while ($p = mysqli_fetch_assoc($data)) {

?>

<tr>

<td><?= $no++; ?></td>

<td><?= htmlspecialchars($p['nama']); ?></td>

<td><?= htmlspecialchars($p['no_hp']); ?></td>

<td><?= htmlspecialchars($p['nama_paket']); ?></td>

<td><?= htmlspecialchars($p['jadwal']); ?></td>

<td><?= $p['tanggal_daftar']; ?></td>

<td><?= $p['status']; ?></td>

<td>

<form action="pendaftaran_status.php"
      method="POST">

<input type="hidden"
       name="id"
       value="<?= $p['id']; ?>">

<select name="status">

<option <?= $p['status']=='Baru'?'selected':''; ?>>
Baru
</option>

<option <?= $p['status']=='Dihubungi'?'selected':''; ?>>
Dihubungi
</option>

<option <?= $p['status']=='Terdaftar'?'selected':''; ?>>
Terdaftar
</option>

<option <?= $p['status']=='Selesai'?'selected':''; ?>>
Selesai
</option>

<option <?= $p['status']=='Batal'?'selected':''; ?>>
Batal
</option>

</select>

<button type="submit">
Update
</button>

</form>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>