<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,
    "SELECT * FROM artikel
     WHERE id='$id'"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Artikel tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $judul = $_POST['judul'];
    $slug = $_POST['slug'];
    $isi = $_POST['isi'];
    $status = $_POST['status'];

    $update = mysqli_query($conn,
        "UPDATE artikel SET
        judul='$judul',
        slug='$slug',
        isi='$isi',
        status='$status'
        WHERE id='$id'"
    );

    if ($update) {

        header("Location: artikel.php");
        exit;

    } else {

        echo "Gagal mengupdate artikel: "
             . mysqli_error($conn);

    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Artikel</title>
</head>

<body>

<h1>Edit Artikel</h1>

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
    value="<?= htmlspecialchars($data['judul']); ?>"
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
    value="<?= htmlspecialchars($data['slug']); ?>"
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
><?= htmlspecialchars($data['isi']); ?></textarea>

</td>

</tr>

<tr>

<td>Status</td>

<td>

<select name="status">

<option value="Publish"
<?= $data['status'] == 'Publish' ? 'selected' : ''; ?>>
Publish
</option>

<option value="Draft"
<?= $data['status'] == 'Draft' ? 'selected' : ''; ?>>
Draft
</option>

</select>

</td>

</tr>

<tr>

<td></td>

<td>

<button type="submit" name="update">
Update Artikel
</button>

</td>

</tr>

</table>

</form>

</body>
</html>