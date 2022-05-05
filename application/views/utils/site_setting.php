<?php if ($this->session->flashdata('data')) {
    if ($this->session->flashdata('data') == "Add") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Ditambahkan", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Update") {
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
                            <h4>Site Setting</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
                    <div class="card-box height-100-p overflow-hidden">
                        <div class="profile-tab height-100-p">
                            <div class="tab height-100-p">
                                <ul class="nav nav-tabs customtab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#promotion" role="tab">Promotion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#services" role="tab">Services</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- Timeline Tab start -->
                                    <div class="tab-pane fade show active" id="promotion" role="tabpanel">
                                        <div class="pd-20">
                                            <!-- <div class="profile-timeline"> -->
                                            <div class="text-right">

                                                <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#add-promo">
                                                    <span class="icon-copy ti-agenda mr-2"></span> Tambah Data
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table-striped table nowrap" id="tb_promo">
                                                    <thead>
                                                        <tr>
                                                            <th class="table-plus">No.</th>
                                                            <th>Banner Slider</th>
                                                            <th>Banner Url</th>
                                                            <th class="datatable-nosort">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($promo as $p) : ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><button type="button" data-toggle="modal" data-target="#edit-banner<?= $p['id_promo']; ?>"><img src="uploads/banner/<?= $p['banner_img'] ?>" class="rounded-lg img-thumbnail" width="100" height="100" alt=""></button></td>
                                                                <td><a href="<?= $p['url_link'] ?>" target="_blank" class="btn btn-sm btn-primary"><i class="icon-copy dw dw-link3 mr-2"></i><?= $p['url_link'] ?></a></td>

                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                                            <button class="dropdown-item" data-target="#edit-promo<?= $p['id_promo']; ?>" id="tombol-ubah" data-id="" data-toggle="modal" data-dismiss="modal"><i class="dw dw-edit2"></i> Edit</button>
                                                                            <a href="<?= base_url() ?>Site_setting/del_promo/<?= $p['id_promo']; ?>" class="dropdown-item tombol-hapus"><i class="dw dw-delete-3"></i> Delete</a>

                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <!-- Modal Edit URL -->
                                                                <div class="modal fade" id="edit-promo<?= $p['id_promo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Promosi</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?= base_url() ?>Site_setting/edit_url/<?= $p['id_promo']; ?>" method="POST">

                                                                                    <div class="form-group">
                                                                                        <label>Banner Url</label>
                                                                                        <input class="form-control" type="url" placeholder="Cth : https://google.com" name="url_link" value="<?= $p['url_link']; ?>" autocomplete='off'>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- <div class="modal fade" id="edit-banner<?= $p['id_promo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Banner</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php echo form_open_multipart('Site_setting/updateBanner'); ?>

                                                                                <input type="text" value="<?= $p['id_promo'] ?>" name="id_promo" hidden>
                                                                                <div class="form-group">
                                                                                    <label for="">Banner Slider</label>
                                                                                    <input name="banner_img" type="file" class="dropify" data-height="250" />
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <button type="submit" class="btn btn-danger">Simpan</button>
                                                                                </div>
                                                                                <?php echo form_close(); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- </div> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show" id="services" role="tabpanel">
                                        <div class="pd-20">
                                            <div class="text-right">

                                                <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#add-services">
                                                    <span class="icon-copy ti-agenda mr-2"></span> Tambah Data
                                                </button>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table-striped table nowrap" id="tb_services">
                                                    <thead>
                                                        <tr>
                                                            <th class="table-plus">No.</th>
                                                            <th>Icon</th>
                                                            <th>Judul</th>
                                                            <th>Deskripsi</th>
                                                            <th class="datatable-nosort">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($serve as $s) :
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $s['icon'] ?></td>
                                                                <td><?= $s['title'] ?></td>
                                                                <td><?= $s['description'] ?></td>
                                                                <td>
                                                                    <div class="dropdown">
                                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                                            <button class="dropdown-item" data-target="#edit-services<?= $s['id_serve'] ?>" id="tombol-ubah" data-id="" data-toggle="modal" data-dismiss="modal"><i class="dw dw-edit2"></i> Edit</button>
                                                                            <a href="<?= base_url() ?>Site_setting/del_services/<?= $s['id_serve'] ?>" class="dropdown-item tombol-hapus"><i class="dw dw-delete-3"></i> Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <div class="modal fade" id="edit-services<?= $s['id_serve'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title" id="myLargeModalLabel">Edit Layanan</h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="<?= base_url() ?>Site_setting/edit_services/<?= $s['id_serve'] ?>" method="POST">

                                                                                    <div class="form-group row">
                                                                                        <div class="col-md-8">
                                                                                            <label>Icon</label>
                                                                                            <input class="form-control" type="text" placeholder="Cth : <span class='iconify' data-icon='wpf:wedding-cake'></span>" name="icon" autocomplete='off' value='<?= $s['icon'] ?>'>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <br>
                                                                                            <a href="https://icon-sets.iconify.design" target="_blank" class="btn btn-lg btn-primary px-5 my-2" data-toggle="tooltip" title="Klik untuk cari icon yang kamu inginkan!"><i class="icon-copy dw dw-search mr-2"></i>Cari Icon</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Judul Layanan</label>
                                                                                        <input class="form-control" type="text" placeholder="Cth : Wedding" name="title" autocomplete='off' value="<?= $s['title'] ?>">
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label>Deskripsi Layanan</label>
                                                                                        <textarea class="form-control" placeholder="Cth : Lorem ipsum sit dolor amet" name="desc" autocomplete='off'><?= $s['description'] ?></textarea>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
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


        <div class="modal fade" id="add-promo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Promosi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>Site_setting/add_promo" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="">Banner Slider</label>
                                <input name="banner_img" type="file" class="dropify rounded-lg" data-height="250" />
                            </div>
                            <div class="form-group">
                                <label>Banner Url</label>
                                <input class="form-control" type="url" placeholder="Cth : https://google.com" name="url_link" autocomplete='off'>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="add-services" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Layanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url() ?>Site_setting/add_services" method="POST">

                            <div class="form-group row">
                                <div class="col-md-8">
                                    <label>Icon</label>
                                    <input class="form-control" type="text" placeholder="Cth : <span class='iconify' data-icon='wpf:wedding-cake'></span>" name="icon" autocomplete='off'>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <a href="https://icon-sets.iconify.design" target="_blank" class="btn btn-lg btn-primary px-5 my-2" data-toggle="tooltip" title="Klik untuk cari icon yang kamu inginkan!"><i class="icon-copy dw dw-search mr-2"></i>Cari Icon</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Judul Layanan</label>
                                <input class="form-control" type="text" placeholder="Cth : Wedding" name="title" autocomplete='off'>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Layanan</label>
                                <textarea class="form-control" placeholder="Cth : Lorem ipsum sit dolor amet" name="desc" autocomplete='off'></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-danger">Tambahkan</button>
                            </div>
                        </form>
                    </div>
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
        <script>
            $(document).ready(function() {
                $('#tb_promo').DataTable({
                    "order": [
                        [0, "desc"]
                    ]
                });
            });
            $(document).ready(function() {
                $('#tb_services').DataTable({
                    "order": [
                        [0, "desc"]
                    ]
                });
            });
        </script>
        <script src="assets/vendors/scripts/core.js"></script>
        <script src="assets/vendors/scripts/script.min.js"></script>
        <script src="assets/vendors/scripts/process.js"></script>
        <script src="assets/vendors/scripts/layout-settings.js"></script>
        <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
        <script src="assets/vendors/scripts/bootstrap-show-password.js"></script>
        <script src="assets/vendros/scripts/bootstrap-show-password.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>assets/dropify/dropify.min.js"></script>
        <script>
            $('.tombol-hapus').on('click', function(e) {
                e.preventDefault();
                const hrefnya = $(this).attr('href');

                Swal.fire({
                    title: 'Menghapus Data Ini',
                    text: "Apakah anda yakin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {
                        document.location.href = hrefnya;
                    }
                })
            });
        </script>
        </body>

        </html>