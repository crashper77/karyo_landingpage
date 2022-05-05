<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title ?> - sewamobilsby</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/assets-landingpage/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>assets/assets-landingpage/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>assets/assets-landingpage/images/logo.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>

    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/sweetalert2/dist/sweetalert2.min.css">
    <script src="<?= base_url() ?>assets/src/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>


</head>

<body class="login-page">
    <?php if ($this->session->flashdata('data')) {
        if ($this->session->flashdata('data') == "Department") {
            echo '<script>Swal.fire("Login Gagal", "Maaf Anda Bukan Admin", "error");</script>';
            unset($_SESSION['data']);
        } else if ($this->session->flashdata('data') == "Gagal") {
            echo '<script>Swal.fire("Login Gagal", "Masukkan Password Dengan Benar", "error");</script>';
            unset($_SESSION['data']);
        } else if ($this->session->flashdata('data') == "Akun") {
            echo '<script>Swal.fire("Login Gagal", "Aktifkan Akun Terlebih Dahulu", "error");</script>';
            unset($_SESSION['data']);
        } else if ($this->session->flashdata('data') == "Kosong") {
            echo '<script>Swal.fire("Login Gagal", "Akun Anda Tidak Tersedia Dalam Sistem", "error");</script>';
            unset($_SESSION['data']);
        } else if ($this->session->flashdata('data') == "Keluar") {
            echo '<script>Swal.fire("Berhasil", "Anda Berhasil Logout", "info");</script>';
            unset($_SESSION['data']);
        }
    }
    ?>
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo row">
                <a href="#">
                    <img src="<?= base_url() ?>assets/assets-landingpage/images/logo.png" width="30%" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7 mx-auto">
                    <img src="<?= base_url() ?>assets/assets-landingpage/images/logo.png" class="ml-5" width="80%" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-secondary">Admin</h2>
                        </div>
                        <form action="<?= base_url() ?>Login/autentikasi" method="post">
                            <div class="input-group custom">
                                <input class="form-control form-control-lg" id="email" name="email" placeholder="Email" type="text" autocomplete="off">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-smartphone1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" autocomplete="off">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-hide"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-secondary btn-lg btn-block" id="konfirmasi" disabled type="submit">Masuk</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="assets/vendors/scripts/core.js"></script>
    <script src="assets/vendors/scripts/script.min.js"></script>
    <script src="assets/vendors/scripts/process.js"></script>
    <script src="assets/vendors/scripts/layout-settings.js"></script>
    <script src="assets/vendors/scripts/bootstrap-show-password.js"></script>
    <script src="assets/vendors/scripts/bootstrap-show-password.min.js"></script>
</body>

<script>
    $('#email, #password').keyup(function() {
        var username = $('#email').val();
        var pass = $('#password').val();

        if (username != "" && pass != "") {
            $('#konfirmasi').removeAttr('disabled');
        } else {
            $('#konfirmasi').attr('disabled', 'disabled');
        }
    });
</script>

</html>