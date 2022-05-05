<!DOCTYPE html>
<html lang="en">

<head>
    <title>sewamobilsby - <?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/animate.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/aos.css">

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/assets-landingpage/css/style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SKGHXM5GYW"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-SKGHXM5GYW');
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <?php foreach ($about_us as $au) : ?>
                <a class="navbar-brand" href="<?= base_url() ?>"><img src="uploads/profile/dark/<?= $au['ava_profil_dark']; ?>" width="100" height="100" alt=""></a>
            <?php endforeach; ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= $title == 'Home' ? 'active' : '' ?>"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
                    <!-- <li class="nav-item <?= $title == 'Contact' ? 'active' : '' ?>"><a href="<?= base_url() ?>contact" class="nav-link scroll-to">About</a></li> -->
                    <li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
                    <li class="nav-item <?= $title == 'Cars' ? 'active' : '' ?>"><a href="<?= base_url() ?>cars" class="nav-link">Cars</a></li>
                    <li class="nav-item <?= $title == 'Blog' ? 'active' : '' ?>"><a href="<?= base_url() ?>blog" class="nav-link">Blog</a></li>
                    <li class="nav-item <?= $title == 'Contact' ? 'active' : '' ?>"><a href="<?= base_url() ?>contact" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->