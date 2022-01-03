<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Laundry Yuk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('assets/Flexor/assets/img/favicon.png') ?>" rel="icon">
    <link href="<?= base_url('assets/Flexor/assets/img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/Flexor/assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/Flexor/assets/vendor/icofont/icofont.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/Flexor/assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/Flexor/assets/vendor/venobox/venobox.css') ?> " rel="stylesheet">
    <link href="<?= base_url('assets/Flexor/assets/vendor/owl.carousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/Flexor/assets/vendor/aos/aos.css') ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('assets/Flexor/assets/css/style.css') ?>" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Flexor - v2.4.1
  * Template URL: https://bootstrapmade.com/flexor-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-none d-lg-block">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <ul>
                    <li><i class="icofont-envelope"></i><a>laundryuk@gmail.com</a></li>
                    <li><i class="icofont-phone"></i> +62 1234 55488 55</li>
                    <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Senin-Jumat 09.00 - 17.00</li>
                </ul>

            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header">
        <div class="container d-flex">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="index.html"><span>Laundry Yuk</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="<?= base_url('index.php/auth/dashboard') ?>">Beranda</a></li>
                    <li><a href="<?= base_url('index.php/auth/pesan') ?>">Pesan</a></li>
                    <li><a href="<?= base_url('index.php/auth/hasil_pesanan') ?>">Cek Pesanan</a></li>
                    <li><a href="<?= base_url('index.php/auth/profil') ?>">Profil</a></li>
                    <li><a class="btn btn-warning badge" href=" <?= base_url('index.php/login/logout') ?>">Logout</a></li>

                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->