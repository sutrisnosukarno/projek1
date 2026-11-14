
<?php
include "config/koneksi.php";

$paket = mysqli_query($conn,
    "SELECT * FROM paket_kursus
     WHERE status='Aktif'
     ORDER BY id DESC
     LIMIT 3"
);

$artikel = mysqli_query($conn,
    "SELECT * FROM artikel
     WHERE status='Publish'
     ORDER BY id DESC
     LIMIT 3"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rumah Belajar Komputer | Kursus Komputer</title>

    <meta name="description"
          content="Rumah Belajar Komputer menyediakan kursus komputer, Microsoft Office, pemrograman web, jaringan komputer dan berbagai pelatihan komputer.">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }

        .hero {
            background:
                linear-gradient(135deg, rgba(13,110,253,.95), rgba(13,70,150,.95)),
                url('assets/img/hero.jpg');

            background-size: cover;
            background-position: center;

            color: white;
            padding: 100px 0;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 800;
        }

        .hero p {
            font-size: 18px;
            max-width: 700px;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-subtitle {
            color: #6c757d;
            margin-bottom: 40px;
        }

        .course-card {
            border: none;
            border-radius: 15px;
            transition: .3s;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,.07);
        }

        .course-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 10px 30px rgba(0,0,0,.12);
        }

        .course-icon {
            width: 60px;
            height: 60px;
            background: #e7f1ff;
            color: #0d6efd;
            border-radius: 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;
        }

        .price {
            font-size: 24px;
            font-weight: 700;
            color: #0d6efd;
        }

        .article-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            transition: .3s;
            height: 100%;
        }

        .article-card:hover {
            transform: translateY(-5px);
        }

        .article-image {
            height: 200px;
            background: linear-gradient(135deg,#0d6efd,#6ea8fe);

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;
            font-size: 45px;
        }

        .cta {
            background: #0d6efd;
            color: white;
            border-radius: 20px;
            padding: 50px;
        }

        footer {
            background: #212529;
            color: #adb5bd;
        }

        footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        footer a:hover {
            color: white;
        }

    </style>

</head>

<body>


<!-- ================= NAVBAR ================= -->

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">

<div class="container">

    <a class="navbar-brand" href="index.php">
        <i class="bi bi-laptop"></i>
        Rumah Belajar Komputer
    </a>

    <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMenu">

        <span class="navbar-toggler-icon"></span>

    </button>


    <div class="collapse navbar-collapse" id="navbarMenu">

        <ul class="navbar-nav ms-auto">

            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="paket.php">
                    Paket Kursus
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pendaftaran.php">
                    Pendaftaran
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="artikel.php">
                    Artikel
                </a>
            </li>

            <li class="nav-item ms-lg-2">
                <a class="btn btn-light btn-sm mt-1"
                   href="admin/login.php">

                    <i class="bi bi-person-lock"></i>
                    Admin

                </a>
            </li>

        </ul>

    </div>

</div>

</nav>


<!-- ================= HERO ================= -->

<section class="hero">

<div class="container">

    <div class="row align-items-center">

        <div class="col-lg-7">

            <span class="badge bg-light text-primary mb-3 px-3 py-2">
                KURSUS KOMPUTER PROFESIONAL
            </span>

            <h1>
                Tingkatkan Skill Komputer Anda
            </h1>

            <p class="mt-3">

                Belajar komputer secara praktis dan terarah
                untuk meningkatkan kemampuan kerja, bisnis,
                pendidikan, maupun karier Anda.

            </p>

            <div class="mt-4">

                <a href="pendaftaran.php"
                   class="btn btn-warning btn-lg me-2">

                    <i class="bi bi-pencil-square"></i>
                    Daftar Sekarang

                </a>


                <a href="paket.php"
                   class="btn btn-outline-light btn-lg">

                    Lihat Paket Kursus

                </a>

            </div>

        </div>

        <div class="col-lg-5 text-center mt-5 mt-lg-0">

            <i class="bi bi-laptop"
               style="font-size: 180px; opacity: .9;"></i>

        </div>

    </div>

</div>

</section>


<!-- ================= KEUNGGULAN ================= -->

<section class="py-5">

<div class="container">

    <div class="text-center mb-5">

        <h2 class="section-title">
            Mengapa Belajar di Kami?
        </h2>

        <p class="section-subtitle">
            Pembelajaran praktis yang disesuaikan dengan kebutuhan peserta
        </p>

    </div>


    <div class="row g-4">

        <div class="col-md-4">

            <div class="card course-card p-4">

                <div class="course-icon mb-3">
                    <i class="bi bi-person-check"></i>
                </div>

                <h4>Pengajar Berpengalaman</h4>

                <p class="text-muted">
                    Materi disampaikan secara sistematis,
                    praktis dan mudah dipahami.
                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card course-card p-4">

                <div class="course-icon mb-3">
                    <i class="bi bi-laptop"></i>
                </div>

                <h4>Praktik Langsung</h4>

                <p class="text-muted">
                    Peserta langsung mempraktikkan materi
                    sehingga lebih mudah memahami pembelajaran.
                </p>

            </div>

        </div>


        <div class="col-md-4">

            <div class="card course-card p-4">

                <div class="course-icon mb-3">
                    <i class="bi bi-clock-history"></i>
                </div>

                <h4>Jadwal Fleksibel</h4>

                <p class="text-muted">
                    Pilihan program dan jadwal dapat disesuaikan
                    dengan kebutuhan peserta.
                </p>

            </div>

        </div>

    </div>

</div>

</section>


<!-- ================= PAKET KURSUS ================= -->

<section class="py-5 bg-light">

<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Paket Kursus
        </h2>

        <p class="section-subtitle">
            Pilih program kursus yang sesuai dengan kebutuhan Anda
        </p>

    </div>


    <div class="row g-4">

        <?php while ($p = mysqli_fetch_assoc($paket)) { ?>

        <div class="col-md-4">

            <div class="card course-card p-4">

                <div class="course-icon mb-3">

                    <i class="bi bi-mortarboard"></i>

                </div>


                <h4>
                    <?= htmlspecialchars($p['nama_paket']); ?>
                </h4>


                <p class="text-muted">

                    <?= htmlspecialchars($p['deskripsi']); ?>

                </p>


                <div class="mb-3">

                    <span class="badge bg-primary">

                        <?= $p['jumlah_pertemuan']; ?>
                        Pertemuan

                    </span>

                    <span class="badge bg-secondary">

                        <?= $p['durasi_pertemuan']; ?>
                        Menit

                    </span>

                </div>


                <div class="price mb-3">

                    Rp <?= number_format($p['biaya'],0,',','.'); ?>

                </div>


                <a href="pendaftaran.php?id_paket=<?= $p['id']; ?>"
                   class="btn btn-primary w-100">

                    <i class="bi bi-arrow-right-circle"></i>

                    Daftar Paket Ini

                </a>

            </div>

        </div>

        <?php } ?>

    </div>


    <div class="text-center mt-5">

        <a href="paket.php"
           class="btn btn-outline-primary">

            Lihat Semua Paket Kursus

        </a>

    </div>

</div>

</section>


<!-- ================= CTA ================= -->

<section class="py-5">

<div class="container">

    <div class="cta">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2>
                    Siap Meningkatkan Skill Komputer Anda?
                </h2>

                <p class="mb-0">

                    Pilih paket kursus dan segera daftarkan
                    diri Anda untuk mengikuti pembelajaran.

                </p>

            </div>


            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                <a href="pendaftaran.php"
                   class="btn btn-light btn-lg">

                    Daftar Sekarang

                </a>

            </div>

        </div>

    </div>

</div>

</section>


<!-- ================= ARTIKEL ================= -->

<section class="py-5 bg-light">

<div class="container">

    <div class="text-center">

        <h2 class="section-title">
            Artikel Terbaru
        </h2>

        <p class="section-subtitle">
            Informasi, tutorial dan tips seputar komputer
        </p>

    </div>


    <div class="row g-4">

        <?php while ($a = mysqli_fetch_assoc($artikel)) { ?>

        <div class="col-md-4">

            <div class="card article-card">

                <div class="article-image">

                    <i class="bi bi-journal-text"></i>

                </div>


                <div class="card-body">

                    <small class="text-muted">

                        <i class="bi bi-calendar"></i>

                        <?= date('d-m-Y', strtotime($a['tanggal'])); ?>

                    </small>


                    <h4 class="mt-2">

                        <a href="detail_artikel.php?id=<?= $a['id']; ?>"
                           class="text-decoration-none text-dark">

                            <?= htmlspecialchars($a['judul']); ?>

                        </a>

                    </h4>


                    <a href="detail_artikel.php?id=<?= $a['id']; ?>"
                       class="btn btn-sm btn-outline-primary">

                        Baca Selengkapnya

                    </a>

                </div>

            </div>

        </div>

        <?php } ?>

    </div>


    <div class="text-center mt-5">

        <a href="artikel.php"
           class="btn btn-primary">

            Lihat Semua Artikel

        </a>

    </div>

</div>

</section>


<!-- ================= FOOTER ================= -->

<footer class="py-5">

<div class="container">

    <div class="row">

        <div class="col-lg-5 mb-4">

            <h4 class="text-white">

                <i class="bi bi-laptop"></i>
                Rumah Belajar Komputer

            </h4>

            <p>

                Tempat belajar komputer untuk meningkatkan
                keterampilan digital, pekerjaan, pendidikan
                dan pengembangan karier.

            </p>

        </div>


        <div class="col-lg-3 mb-4">

            <h5 class="text-white">
                Menu
            </h5>

            <ul class="list-unstyled">

                <li>
                    <a href="index.php">Home</a>
                </li>

                <li>
                    <a href="paket.php">Paket Kursus</a>
                </li>

                <li>
                    <a href="pendaftaran.php">Pendaftaran</a>
                </li>

                <li>
                    <a href="artikel.php">Artikel</a>
                </li>

            </ul>

        </div>


        <div class="col-lg-4">

            <h5 class="text-white">
                Hubungi Kami
            </h5>

            <p>

                <i class="bi bi-telephone"></i>
                0821 2038 8854

                <br>

                <i class="bi bi-whatsapp"></i>
                WhatsApp tersedia

            </p>

        </div>

    </div>


    <hr>


    <div class="text-center">

        <small>
            &copy; <?= date('Y'); ?>
            Rumah Belajar Komputer.
            All Rights Reserved.
        </small>

    </div>

</div>

</footer>


<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>
</html>
```