<?php if ($this->session->flashdata('data')) {
    if ($this->session->flashdata('data') == "Add") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Ditambahkan", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Edit") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Diperbarui", "info");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Delete") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Dihapus", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Gagal") {
        echo '<script>Swal.fire("Gagal", "Isilah Data Dengan Benar", "error");</script>';
        unset($_SESSION['data']);
    }
}

// var_dump($paket);die;
?>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <a href="<?= base_url() ?>Pesanan"><i class="icon-copy dw dw-left-arrow1 mr-2"></i>Kembali</a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown" aria-disabled="true">
                        <a href="<?= base_url() ?>Detail_pesanan"><button class="btn btn-outline-success" type="button" title="Today"><i class="icon-copy fa fa-calendar mr-2"></i><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                    echo date('d F Y'); ?></button></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="card-box pb-10 mb-20">
            <div class="row pd-20">
                <div class="col-lg-12 mb-20">
                    <div class="card-box height-100-p pd-20 min-height-200px">
                        <div class="d-flex justify-content-between pb-10">
                            <div class="h5 mb-0">Detail Pesanan</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="font-14 weight-600"><i class="icon-copy dw dw-user1 mr-2"></i><?= $pesanan['nama_lengkap'] ?></div>
                                <div class="font-12 weight-500 text-secondary"><i class="icon-copy dw dw-email mr-2"></i><?= $pesanan['email_pemesan'] ?></div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="font-14 weight-600">No. Telepon</div>
                                <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy ion-social-whatsapp-outline mr-2"></i><?= $pesanan['no_telp_pemesan'] ?></div>
                            </div>
                        </div>
                        <div class="user-list table-responsive mt-3">
                            <div class="card card-box ">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12 my-auto">
                                            <div class="font-14 weight-600">Status : <button class="btn btn-sm btn-outline-success"><?= $pesanan['status_pembayaran'] ?></button></div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 my-auto">
                                            <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-user-11 mr-2"></i><?= $pesanan['jumlah_orang'] ?> Orang</div>
                                        </div>
                                        <div class="col-md-4 col-sm-12 my-auto">
                                            <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-credit-card mr-2"></i>Rp <?= number_format($pesanan['total_harga'], 0, ",", ".") ?>,-</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php
                                        $tanggal = $this->db->get_where('keberangkatan', ['id_paket' => $pesanan['id_paket']])->row_array();
                                        ?>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="font-14 weight-600"><i class="icon-copy dw dw-calendar-8 mr-2"></i>Tanggal Keberangkatan</div>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= date('d M Y', strtotime($tanggal['tanggal_berangkat'])) ?> - <?= date('d M Y', strtotime($tanggal['tanggal_berangkat_end'])) ?></div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <?php
                                            $tikum = $this->db->get_where('titik_kumpul', ['id_paket' => $pesanan['id_paket']])->row_array();
                                            ?>
                                            <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-route mr-2"></i>Titik Kumpul</div>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= $tikum['nama_tikum'] ?></div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-ticket-1 mr-2"></i>Kode Tiket</div>
                                            <div class="font-12 weight-400" style="text-indent: 22px;"><?= $pesanan['id_pemesanan'] ?></div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="font-14 weight-600"><i class="icon-copy dw dw-image-11 mr-2"></i>Bukti Pembayaran</div>
                                            <img src="https://www.user.holiyey.online/uploads/pembayaran/<?= $pesanan['pembayaran'] ?>" class="mt-3 rounded-lg shadow-lg" width="80%" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-20">
                <?php 
                if ($paket != null) {
                ?>
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0"><?= $paket['nama_paket'] ?></div>
                    </div>
                    <div class="row">
                        <?php
                        // var_dump($paket);die;
                        $agent = $this->db->get_where('agent', ['id_agent' => $paket['id_agent']])->row_array();
                        ?>
                        <div class="col-md-6 col-sm-12">
                            <div class="font-14 weight-600"><i class="icon-copy dw dw-building mr-2"></i><?= $agent['nama_agent'] ?></div>
                            <div class="font-12 weight-500" data-color="#b3b1b6"><i class="icon-copy dw dw-user1 mr-2"></i><?= $agent['owner'] ?></div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="font-14 weight-600">Kontak</div>
                            <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy ion-social-whatsapp-outline mr-2"></i><?= $agent['kontak'] ?></div>
                        </div>
                    </div>
                    <div class="user-list table-responsive mt-3">
                        <div class="card card-box ">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-600"><i class="icon-copy dw dw-flight mr-2"></i><?= $paket['nama_paket'] ?></div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy ion-cash mr-2"></i>Rp <?= number_format($paket['harga_paket'], 0, ",", ".") ?>,-/Orang</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-600"><i class="icon-copy dw dw-map-2 mr-2"></i>Tujuan Wisata</div>
                                        <?php
                                        $wisata = $this->db->get_where('tujuan_wisata', ['id_paket' => $paket['id_paket']])->result_array();
                                        foreach ($wisata as $w) :
                                        ?>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= $w['tujuan_wisata'] ?></div>
                                        <?php endforeach; ?>

                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-dinner mr-2"></i>Fasilitas Wisata</div>
                                        <?php
                                        $fasilitas = $this->db->get_where('fasilitas', ['id_paket' => $paket['id_paket']])->result_array();
                                        foreach ($fasilitas as $f) :
                                        ?>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= $f['fasilitas_wisata'] ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-600"><i class="icon-copy dw dw-calendar-8 mr-2"></i>Tanggal Keberangkatan</div>
                                        <?php
                                        $tanggal = $this->db->get_where('keberangkatan', ['id_paket' => $paket['id_paket']])->result_array();
                                        foreach ($tanggal as $t) :
                                        ?>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= date('d M Y', strtotime($t['tanggal_berangkat'])) ?> - <?= date('d M Y', strtotime($t['tanggal_berangkat_end'])) ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="font-14 weight-500" data-color="#00000"><i class="icon-copy dw dw-route mr-2"></i>Titik Kumpul</div>
                                        <?php
                                        $kumpul = $this->db->get_where('titik_kumpul', ['id_paket' => $paket['id_paket']])->result_array();
                                        foreach ($kumpul as $k) :
                                        ?>
                                            <div class="font-12 weight-400" style="text-indent: 10px;"><i class="icon-copy ion-ios-checkmark-empty mr-1"></i><?= $k['nama_tikum'] ?></div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else { ?> 
                <div class="card-box height-100-p pd-20 min-height-200px">
                    <div class="d-flex justify-content-between pb-10">
                        <div class="h5 mb-0 text-danger"><span class="icon-copy ti-info-alt mr-2 "></span>Paket Sudah Tidak Tersedia</div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </div>

    </div>
    <div class="footer-wrap pd-20 mb-20 card-box">
        2021 &copy; sewamobilsby &mdash; Developed by <a href="#" style="color: #0984e3;">KaryoDev</a>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {
        $('#tb_dt_penjualan').DataTable();
    });
</script>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
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
<!-- bootstrap-touchspin js -->
<script src="assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/scripts/advanced-components.js"></script>

</body>

</html>