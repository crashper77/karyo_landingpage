<?php if ($this->session->flashdata('data')) {

    if ($this->session->flashdata('data') == "Update") {
        echo '<script>Swal.fire("Berhasil", "Data Profile Berhasil Diperbarui", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Create") {
        echo '<script>Swal.fire("Berhasil", "Foto Profile Berhasil Diperbarui", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Gagal") {
        echo '<script>Swal.fire("Gagal", "Upload Foto Dengan Benar", "error");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Eror") {
        echo '<script>Swal.fire("Gagal", "Ukuran Gambar Melebihi Kapasitas 2MB", "error");</script>';
        unset($_SESSION['data']);
    }
}
?>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="title">
                            <h4>Profile Company</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                    <div class="pd-20 card-box height-100-p text-center">
                        <img src="uploads/profile/dark/<?= $user['ava_profil_dark'] ?>" width="250" height="250" class="img-thumbnail rounded-circle" alt="">
                        <h5 class="text-center h5 mb-0 mt-5"><?= $user['nama_lengkap'] ?></h5>
                        <p class="text-center text-muted font-14"><?= $user['id_akun'] ?></p>

                        <div class="profile-info text-center mt-5">
                            <h5 class="mb-20 h5 text-blue">Informasi Kontak</h5>
                            <ul>
                                <li>
                                    <span>Email</span>
                                    <?= $user['email_akun'] ?>
                                </li>
                                <li>
                                    <span>No. Telpon</span>
                                    <?= $user['no_telp_akun'] ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#general" role="tab">General</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#logo" role="tab">Logo</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                                        <div class="pd-20">
                                            <div class="profile-timeline">
                                                <form action="<?= base_url() ?>Profile/editprofile/<?= $user['id_akun'] ?>" method="POST">
                                                    <ul class="profile-edit-list row">
                                                        <li class="weight-500 col-md-12">
                                                            <div class="form-group">
                                                                <label>Nama Perusahaan</label>
                                                                <input class="form-control" type="text" placeholder="Cth : sewamobilsby" value="<?= $user['nama_lengkap'] ?>" autocomplete='off' name="nama_karyawan">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" type="email" placeholder="Cth : example@gmail.com" value="<?= $user['email_akun'] ?>" autocomplete='off' name="email_karyawan">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No. Telpon</label>
                                                                <input class="form-control" type="text" placeholder="Cth : 089745644433" value="<?= $user['no_telp_akun'] ?>" autocomplete='off' name="no_telp">
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-md-6">
                                                                    <label>Tanggal Berdiri</label>
                                                                    <input class="form-control date-picker" value="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                    echo date('d F Y', strtotime($user['tgl_berdiri'])); ?>" type="text" placeholder="<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                                        echo date('d F Y'); ?>" autocomplete='off' name="tgl_berdiri">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label>Total Investor</label>
                                                                    <input class="form-control" type="text" value="<?= $user['investor'] ?>" placeholder="Cth : 10" autocomplete='off' name="investor">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-md-4">
                                                                    <label>Whatsapp Link</label>
                                                                    <input class="form-control" type="text" value="<?= $user['url_wa'] ?>" placeholder="Cth : wa.link/08974879215" autocomplete='off' name="url_wa">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Facebook</label>
                                                                    <input class="form-control" type="text" value="<?= $user['facebook']; ?>" placeholder="Cth : https://www.facebook.com/alfin.sugestian.3/" autocomplete='off' name="facebook">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Instagram</label>
                                                                    <input class="form-control" type="text" value="<?= $user['instagram'] ?>" placeholder="Cth : https://www.instagram.com/sewamobilsby/?hl=en" autocomplete='off' name="instagram">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tentang Perusahaan</label>
                                                                <textarea class="form-control" placeholder="Cth : Lorem ipsum sit dolor amet" autocomplete='off' name="about_us"><?= $user['about_us'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat Perusahaan</label>
                                                                <textarea class="form-control" placeholder="Cth : Jl. Sulawesi No. 48, Surabaya" autocomplete='off' name="alamat"><?= $user['alamat'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Password Baru</label><br>
                                                                <small>Isilah Password jika ingin mengganti password sebelumnya</small>
                                                                <div class="input-group custom">
                                                                    <input class="form-control" type="password" placeholder="Password" autocomplete='off' id="password" name="password">
                                                                    <div class="input-group-append custom">
                                                                        <span class="input-group-text"><i class="icon-copy dw dw-hide" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group mb-0 text-right">
                                                                <input type="submit" class="btn btn-secondary tambah px-5" value="Simpan">
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="logo" role="tabpanel">
                                        <div class="pd-20">
                                            <div class="profile-timeline">
                                                <form action="<?= base_url() ?>Profile/updateAva" method="POST" enctype="multipart/form-data">
                                                    <input type="text" value="<?= $user['id_akun'] ?>" name="id_akun" hidden>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="">Logo Company Dark</label>
                                                            <input name="ava_profil_dark" type="file" class="dropify rounded-circle" data-height="250" data-default-file="uploads/profile/dark/<?= $user['ava_profil_dark'] ?>" />
                                                        </div>
                                                        <div class="form-group mb-0 mt-5 text-center">
                                                            <input type="submit" class="btn btn-secondary tambah px-5" value="Simpan">
                                                        </div>
                                                    </div>

                                                </form>

                                                <form action="<?= base_url() ?>Profile/updateAva_light" method="POST" enctype="multipart/form-data">
                                                    <input type="text" value="<?= $user['id_akun'] ?>" name="id_akun" hidden>

                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="">Logo Company Light</label>

                                                            <input name="ava_profil_light" type="file" class="dropify rounded-circle" data-height="250" data-default-file="uploads/profile/light/<?= $user['ava_profil_light'] ?>" />

                                                        </div>
                                                        <div class="form-group mb-0 mt-5 text-center">
                                                            <input type="submit" class="btn btn-secondary tambah px-5" value="Simpan">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Timeline Tab End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="footer-wrap pd-20 mb-20 card-box ">
                    2021 &copy; Holiyey &mdash; Developed by <a href="#" style="color: #0984e3; text-decoration: none;">Freetual</a>
                </div>
            </div>
        </div>
        <!-- js -->
        <script>
            $(document).ready(function() {
                $('.dropify').dropify({
                    messages: {
                        default: 'Drag atau drop untuk memilih gambar',
                        replace: 'Ganti',
                        remove: 'Hapus',
                        error: 'error'
                    }
                });
            });
        </script>
        <script src="assets/vendors/scripts/core.js"></script>
        <script src="assets/vendors/scripts/script.min.js"></script>
        <script src="assets/vendors/scripts/process.js"></script>
        <script src="assets/vendors/scripts/layout-settings.js"></script>
        <script src="assets/src/plugins/cropperjs/dist/cropper.js"></script>
        <script src="assets/src/plugins/jQuery-Knob-master/jquery.knob.min.js"></script>
        <script src="assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
        <script src="assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
        <script src="assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
        <script src="assets/src/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/src/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="assets/src/plugins/dropzone/src/dropzone.js"></script>
        <script src="assets/vendors/scripts/bootstrap-show-password.js"></script>
        <script src="assets/vendros/scripts/bootstrap-show-password.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/dropify/dropify.min.js"></script>
        </body>

        </html>