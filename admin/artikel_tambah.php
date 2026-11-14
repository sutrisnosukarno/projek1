<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

if (isset($_POST['simpan'])) {

    $judul = $_POST['judul'];
    $slug = $_POST['slug'];
    $isi = $_POST['isi'];
    $tanggal = date('Y-m-d');
    $status = $_POST['status'];

    $query = "INSERT INTO artikel
              (judul, slug, isi, tanggal, status)
              VALUES
              ('$judul', '$slug', '$isi',
               '$tanggal', '$status')";

    if (mysqli_query($conn, $query)) {

        header("Location: artikel.php");
        exit;

    } else {

        echo "Gagal menyimpan artikel: "
             . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Artikel</title>
</head>

<body>

<h1>Tambah Artikel</h1>

<nav>
    <a href="index.php">Dashboard</a> |
    <a href="artikel.php">Kembali ke Artikel</a>
</nav>

<hr>

<form method="POST">

<table>

<tr>

<td>Judul Artikel</td>

<td>
<input
    type="text"
    name="judul"
    size="60"
    required
>
</td>

</tr>

<tr>

<td>Slug</td>

<td>
<input
    type="text"
    name="slug"
    size="60"
    placeholder="contoh-belajar-microsoft-excel"
    required
>
</td>

</tr>

<tr>

<td>Isi Artikel</td>

<td>

<textarea
    name="isi"
    rows="15"
    cols="80"
    required
></textarea>

</td>

</tr>

<tr>

<td>Status</td>

<td>

<select name="status">

<option value="Publish">
Publish
</option>

<option value="Draft">
Draft
</option>

</select>

</td>

</tr>

<tr>

<td></td>

<td>

<button type="submit" name="simpan">
Simpan Artikel
</button>

</td>

</tr>

</table>

</form>

</body>
</html>