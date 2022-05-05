<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title><?= $title?></title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/styles/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>
    <div class="error-page d-flex align-items-center flex-wrap justify-content-center pd-20">
        <div class="pd-10">
            <div class="error-page-wrap text-center">
                <lottie-player class="col-lg-12 text-center"
                    src="https://assets4.lottiefiles.com/packages/lf20_j3gumpgp.json"
                    style="width: 100%; height: 100%; margin: auto; display: block;" background="transparent" speed="1"
                    loop autoplay>
                </lottie-player>
                <h5>Maaf, ada kesalahan saat menampilkan halaman</h5>
                <div class="pt-20 mx-auto ">
                    <?php 
                        $this->db->select('url');
                        $this->db->from('role_list_menu');
                        $this->db->join('list_menu', 'list_menu.id_list=role_list_menu.id_list');
                        $this->db->where('id_department', $role);
                        $url = $this->db->get()->row_array()['url'];
                    ?>
                    <a href="<?= base_url(); ?><?= $url?>" class="btn btn-primary btn-block btn-lg">Kembali Ke Halaman
                        Utama</a>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="assets/vendors/scripts/core.js"></script>
    <script src="assets/vendors/scripts/script.min.js"></script>
    <script src="assets/vendors/scripts/process.js"></script>
    <script src="assets/vendors/scripts/layout-settings.js"></script>
</body>

</html>