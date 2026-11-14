<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_paket'];
    $deskripsi = $_POST['deskripsi'];
    $pertemuan = $_POST['jumlah_pertemuan'];
    $durasi = $_POST['durasi_pertemuan'];
    $biaya = $_POST['biaya'];
    $status = $_POST['status'];

    mysqli_query($conn,
        "INSERT INTO paket_kursus
        (nama_paket, deskripsi, jumlah_pertemuan,
         durasi_pertemuan, biaya, status)

        VALUES
        ('$nama','$deskripsi','$pertemuan',
         '$durasi','$biaya','$status')"
    );

    header("Location: paket.php");
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Paket</title>
</head>

<body>

<h1>Tambah Paket Kursus</h1>

<form method="POST">

<p>Nama Paket</p>

<input type="text"
       name="nama_paket"
       required>

<p>Deskripsi</p>

<textarea name="deskripsi"></textarea>

<p>Jumlah Pertemuan</p>

<input type="number"
       name="jumlah_pertemuan"
       required>

<p>Durasi Pertemuan (menit)</p>

<input type="number"
       name="durasi_pertemuan"
       value="120"
       required>

<p>Biaya</p>

<input type="number"
       name="biaya"
       required>

<p>Status</p>

<select name="status">

<option value="Aktif">Aktif</option>
<option value="Tidak Aktif">Tidak Aktif</option>

</select>

<p>

<button type="submit" name="simpan">
Simpan
</button>

</p>

</form>

<a href="paket.php">Kembali</a>

</body>
</html>