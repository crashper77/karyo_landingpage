<div class="mobile-menu-overlay"></div>
<?php if ($this->session->flashdata('data')) {
    if ($this->session->flashdata('data') == "Masuk") {
        echo '<script>Swal.fire("Berhasil", "Login Berhasil", "success");</script>';
        unset($_SESSION['data']);
    }
}
?>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="title pb-20">
            <h2 class="h3 mb-0">Dashboard</h2>
        </div>

        <div class="row">
            <div class="col-md-6 mb-20">
                <a href="#" class="card-box d-block mx-auto pd-20 text-secondary text-center">
                    <div class="img pb-30">
                        <img src="assets/src/images/car.png" width="30%" alt="">
                    </div>
                    <div class="content">
                        <h3 class="h4"><?= $count_mobil ?> Mobil</h3>
                        <p class=" text-center">Total Mobil</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-20">
                <a href="#" class="card-box d-block mx-auto pd-20 text-secondary text-center">
                    <!-- <div class="img pb-30">
                        <img src="assets/src/images/visitor.png" width="20%" alt="">

                    </div>
                    <div class="content">
                        <h3 class="h4">10 Visitor</h3>
                        <p class="text-center">Total Visitor Website</p>
                    </div> -->
                    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                    <div class="elfsight-app-0a12597a-e0f8-4f4f-97e3-8a73afb3e704"></div>
                </a>
            </div>
        </div>




        <div class="card-box pb-10 mb-20">
            <div class="table-responsive h5 pd-20 mb-0">Data Mobil &mdash; <?php date_default_timezone_set('Asia/Jakarta');
                                                                            echo date('d F Y'); ?></div>
            <table class="table-striped table nowrap" id="tb_penjualan">
                <thead>
                    <tr>
                        <th class="table-plus">No.</th>
                        <th>Foto Mobil</th>
                        <th>Tipe Mobil</th>
                        <th>Merk</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mobil as $t) : ?>
                        <tr>
                            <td><?= $t['id_mobil'] ?></td>
                            <td><img src="uploads/profile/<?= $user['ava_profil_dark'] ?>" width="200" class="img-thumbnail rounded-lg" alt=""></td>
                            <td><?php if ($t['tipe_mobil'] == 'manual') { ?>
                                    <button class="btn btn-sm btn-outline-primary">Manual</button>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-outline-info">Matic</button>
                                <?php } ?>
                            </td>
                            <td><?= $t['merk'] ?></td>
                            <td>Rp <?= number_format($t['harga'], 0, ',', '.'); ?></td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            2021 &copy; sewamobilsby &mdash; Developed by <a href="#" style="color: #0984e3; text-decoration: none;">KaryoDev</a>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#tb_mobil_dash').DataTable();
    });
</script>
<!-- js -->
<script src="assets/vendors/scripts/core.js"></script>
<script src="assets/vendors/scripts/script.min.js"></script>
<script src="assets/vendors/scripts/process.js"></script>
<script src="assets/vendors/scripts/layout-settings.js"></script>
<script src="assets/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/vendors/scripts/dashboard3.js"></script>
</body>

</html>