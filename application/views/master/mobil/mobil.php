<?php if ($this->session->flashdata('data')) {
    if ($this->session->flashdata('data') == "Add") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Ditambahkan", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Update") {
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
?>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6">
                    <div class="title">
                        <h4>Mobil</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a href="<?= base_url() ?>Travel_agent"><button class="btn btn-outline-success" type="button" title="Today"><i class="icon-copy fa fa-calendar mr-2"></i><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                                    echo date('d F Y'); ?></button></a>

                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#add-periode-pricelist">
                            <span class="icon-copy ti-agenda mr-2"></span> Tambah Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-box pb-10 mb-20">
            <div class="pd-20 card-box">
                <div class="row pd-10 col-md-12">
                    <div class="table-responsive h5 pd-10 mb-0 col-md-8">Data Mobil</div>

                </div>
                <div class="table-responsive">
                    <table class="table-striped table nowrap" id="tb_penjualan">
                        <thead>
                            <tr>
                                <th class="table-plus">No.</th>
                                <th>Foto Mobil</th>
                                <th>Tipe Mobil</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th class="datatable-nosort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mobil as $t) : ?>
                                <tr>
                                    <td><?= $t['id_mobil'] ?></td>
                                    <td><img src="uploads/mobil/<?= $t['mobil_img'] ?>" width="200" class="img-thumbnail rounded-lg" alt=""></td>
                                    <td><?php if ($t['tipe_mobil'] == 'manual') { ?>
                                            <button class="btn btn-sm btn-outline-primary">Manual</button>
                                        <?php } else { ?>
                                            <button class="btn btn-sm btn-outline-info">Matic</button>
                                        <?php } ?>
                                    </td>
                                    <td><?= $t['merk'] ?></td>
                                    <td>Rp <?= number_format($t['harga'], 0, ',', '.'); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown"><i class="dw dw-more"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <button class="dropdown-item" data-target="#edit-modal<?= $t['id_mobil'] ?>" id="tombol-ubah" data-id="" data-toggle="modal" data-dismiss="modal"><i class="dw dw-edit2"></i> Edit</button>
                                                <a href="<?= base_url() ?>Mobil/hapusmobil/<?= $t['id_mobil'] ?>" class="dropdown-item tombol-hapus"><i class="dw dw-delete-3"></i> Delete</a>

                                            </div>
                                        </div>
                                    </td>
                                    <div class="modal fade" id="edit-modal<?= $t['id_mobil'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myLargeModalLabel">Edit Data</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url() ?>Mobil/editmobil/<?= $t['id_mobil'] ?>" method="POST">
                                                        <div class="form-group row">
                                                            <!-- <div class="form-group">
                                                                <label for="">Foto Mobil</label>
                                                                <input name="mobil_img" type="file" class="dropify rounded-circle" data-height="250" data-default-file="uploads/mobil/<?= $t['mobil_img'] ?>" />
                                                            </div> -->
                                                            <div class="col-md-6">
                                                                <label>Tipe Mobil</label>
                                                                <select name="tipe_mobil" class="form-control">
                                                                    <option value="manual">Manual</option>
                                                                    <option value="matic">Matic</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Merk</label>
                                                                <input class="form-control" type="text" placeholder="Cth : Agya 2018" name="merk" value="<?= $t['merk'] ?>" autocomplete='off'>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga</label>
                                                            <input class="form-control" type="number" placeholder="Cth : 100000" name="harga" value="<?= $t['harga'] ?>" autocomplete='off'>
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
    </div>
</div>
</div>
</div>


<div class="modal fade" id="add-periode-pricelist" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Mobil/tambahmobil" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Foto Mobil</label>
                        <input name="mobil_img" type="file" class="dropify rounded-circle" data-height="250" />

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Tipe Mobil</label>
                            <select name="tipe_mobil" class="form-control" id="">
                                <option value="manual">Manual</option>
                                <option value="matic">Matic</option>
                            </select>
                            <!-- <input class="form-control" type="text" placeholder="Cth : Rea Reo Travel" name="nama" autocomplete='off'> -->
                        </div>
                        <div class="col-md-6">
                            <label>Merk</label>
                            <input class="form-control" type="text" placeholder="Cth : Agya 2018" name="merk" autocomplete='off'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control" type="number" placeholder="Cth : 100000" name="harga" autocomplete='off'>
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

<!-- Modal Filter Pricelist Berdasarkan Bulan-->
<div class="modal fade" id="filter-month" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Filter Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url() ?>Penjualan" method="POST">
                    <div class="form-group ">
                        <label>Data Penjualan (Bulan)</label>
                        <input class="form-control text-center month-picker" placeholder="Agustus 2021" type="text" name="bulanfilter" autocomplete="off">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger"><span class="icon-copy ti-search mr-2"></span>Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="footer-wrap pd-20 mb-20 card-box">
    2021 &copy; PT. Banjaran Global Biz &mdash; Developed by <a href="#" style="color: #0984e3;">Karyo <span style="color: #00b894;">Dev</span></a>
</div>
<!-- </div> -->

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

<!-- JS DESC -->
<script>
    $(document).ready(function() {
        $('#tb_penjualan').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>
<!-- END JS DESC -->

<!-- js -->
<script src="assets/vendors/scripts/core.js"></script>
<script src="assets/vendors/scripts/script.min.js"></script>
<script src="assets/vendors/scripts/process.js"></script>
<script src="assets/vendors/scripts/layout-settings.js"></script>
<script src="assets/src/plugins/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendors/scripts/dashboard3.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap4.min.js"></script>
<!-- bootstrap-touchspin js -->
<script src="assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/scripts/advanced-components.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/dropify/dropify.min.js"></script>
<!-- fancybox Popup Js -->
<script src="<?= base_url() ?>assets/src/plugins/fancybox/dist/jquery.fancybox.js"></script>
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