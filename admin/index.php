<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include "../config/koneksi.php";

$jml_paket = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM paket_kursus")
)['total'];

$jml_daftar = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM pendaftaran")
)['total'];

$jml_artikel = mysqli_fetch_assoc(
    mysqli_query($conn,
    "SELECT COUNT(*) AS total FROM artikel")
)['total'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
</head>

<body>

<h1>ADMIN PANEL KURSUS KOMPUTER</h1>

<nav>

<a href="index.php">Dashboard</a> |

<a href="paket.php">Paket Kursus</a> |

<a href="pendaftaran.php">Pendaftaran</a> |

<a href="artikel.php">Artikel</a> |

<a href="logout.php">Logout</a>

</nav>

<hr>

<h2>Dashboard</h2>

<table border="1" cellpadding="10">

<tr>
<th>Data</th>
<th>Jumlah</th>
</tr>

<tr>
<td>Paket Kursus</td>
<td><?= $jml_paket; ?></td>
</tr>

<tr>
<td>Pendaftaran</td>
<td><?= $jml_daftar; ?></td>
</tr>

<tr>
<td>Artikel</td>
<td><?= $jml_artikel; ?></td>
</tr>

</table>

</body>
</html>