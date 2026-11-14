<?php

include "config/koneksi.php";

$nama       = $_POST['nama'];
$no_hp      = $_POST['no_hp'];
$email      = $_POST['email'];
$alamat     = $_POST['alamat'];
$id_paket   = $_POST['id_paket'];
$jadwal     = $_POST['jadwal'];
$keterangan = $_POST['keterangan'];

$tanggal = date('Y-m-d');

$query = "INSERT INTO pendaftaran
          (nama, no_hp, email, alamat, id_paket,
           jadwal, keterangan, tanggal_daftar)
          VALUES
          ('$nama', '$no_hp', '$email', '$alamat',
           '$id_paket', '$jadwal', '$keterangan', '$tanggal')";

if (mysqli_query($conn, $query)) {

    echo "<h2>Pendaftaran Berhasil</h2>";

    echo "<p>
    Terima kasih. Data pendaftaran Anda telah berhasil dikirim.
    </p>";

    echo "<p>
    Admin akan segera menghubungi Anda.
    </p>";

    echo '<a href="index.php">Kembali ke Home</a>';

} else {

    echo "Pendaftaran gagal: " . mysqli_error($conn);

}

?>