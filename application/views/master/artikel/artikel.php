<?php if ($this->session->flashdata('data')) {
    if ($this->session->flashdata('data') == "Add") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Ditambahkan", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Update") {
        echo '<script>Swal.fire("Berhasil", "Data Berhasil Diperbarui", "success");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Nonaktif") {
        echo '<script>Swal.fire("Berhasil", "Data Telah Dinonaktifkan", "info");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Gagal") {
        echo '<script>Swal.fire("Gagal", "Isilah Data Dengan Benar", "error");</script>';
        unset($_SESSION['data']);
    } else if ($this->session->flashdata('data') == "Aktif") {
        echo '<script>Swal.fire("Berhasil", "Data Telah Diaktifkan", "info");</script>';
        unset($_SESSION['data']);
    }
}
?>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">

        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Blog</h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <div class="dropdown">
                        <a href="<?= base_url() ?>Pesanan"><button class="btn btn-outline-success" type="button" title="Today"><i class="icon-copy fa fa-calendar mr-2"></i><?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                                            echo date('d F Y'); ?></button></a>

                    </div>
                </div>
            </div>
        </div>

        <div class="card-box pb-10 mb-20">
            <div class="tab">
                <ul class="nav nav-tabs customtab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#blog" role="tab" aria-selected="true">Blog</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tags" role="tab" aria-selected="false">Tags</a>
                    </li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="blog" role="tabpanel">
                        <div class="pd-20">
                            <div class="text-right">
                                <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#add-blog">
                                    <span class="icon-copy ti-agenda mr-2"></span> Buat Artikel
                                </button>
                            </div>
                            <table class="table-striped table nowrap" id="tb_artikel">
                                <thead>
                                    <tr>
                                        <th class="table-plus">ID Blog</th>
                                        <th>Judul</th>
                                        <th>Konten Blog</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($articles as $ar) : ?>
                                        <tr>
                                            <td><?= $ar['id_article']; ?></td>
                                            <td><?= $ar['title']; ?></td>
                                            <td><?= word_limiter($ar['content'], 4); ?></td>
                                            <td>
                                                <div class="btn-group btn-sm mr-2" role="group" aria-label="First group">
                                                    <button type="button" class="btn btn-sm btn-outline-dark">#<?= $ar['tags']; ?></button>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($ar['status'] == 'draft') { ?>
                                                    <button class="btn btn-sm btn-dark">Draft</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-sm btn-success">Published</button>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <span class="icon-copy ti-user mr-2"></span><?= $ar['id_akun']; ?><br>
                                                <small><span class="icon-copy ti-calendar mr-2"></span><?= date('d M Y', strtotime($ar['update_at'])) ?></small>

                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <button type="button" data-target="#edit-blog<?= $ar['id_article']; ?>" data-toggle="modal" class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Edit & Details</button>
                                                        <?php if ($ar['status'] == 'draft') { ?>
                                                            <a class="dropdown-item" href="<?= base_url() ?>Artikel/publish/<?= $ar['id_article']; ?>"><i class="dw dw-upload"></i>Publish</a>
                                                        <?php } else { ?>
                                                            <a class="dropdown-item" href="<?= base_url() ?>Artikel/draft/<?= $ar['id_article']; ?>"><i class="dw dw-download"></i>Take Out</a>
                                                        <?php } ?>
                                                        <a class="dropdown-item" href="<?= base_url() ?>Artikel/del_blogs/<?= $ar['id_article']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="edit-blog<?= $ar['id_article']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="<?= base_url() ?>Artikel/edit_blogs/<?= $ar['id_article']; ?>" method="POST">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Edit Artikel</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Judul Artikel</label>
                                                                <input class="form-control" type="text" name="title" value="<?= $ar['title']; ?>" autocomplete="OFF">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Konten Artikel</label>
                                                                <textarea class="textarea_editor1 form-control border-radius-0" name="content" cols="50" placeholder="Enter text ..."><?= $ar['content']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tags</label><br>
                                                                <input type="text" class="form-control w-100" name="tags" value="<?= $ar['tags']; ?>" data-role="tagsinput">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-dark">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tags" role="tabpanel">
                        <div class="pd-20">
                            <div class="text-right">
                                <button class="btn btn-danger mb-3" type="button" data-toggle="modal" data-target="#add-tags">
                                    <span class="icon-copy ti-agenda mr-2"></span> Tambah Tags
                                </button>
                            </div>
                            <table class="table-striped table nowrap " id="tb_tags">
                                <thead>
                                    <tr>
                                        <th class="table-plus">ID Tags</th>
                                        <th>Nama Tag</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tags as $t) : ?>
                                        <tr>
                                            <td><?= $t['id_tags']; ?></td>
                                            <td><button class="btn btn-sm btn-outline-dark">#<?= $t['name_tag']; ?></button></td>

                                            <td>
                                                <div class="dropdown">
                                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="dw dw-more"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                        <button type="button" data-target="#edit-tags<?= $t['id_tags']; ?>" data-toggle="modal" class="dropdown-item"><i class="dw dw-edit2"></i> Edit</button>
                                                        <a class="dropdown-item tombol-hapus" href="<?= base_url() ?>Artikel/del_tags/<?= $t['id_tags']; ?>"><i class="dw dw-delete-3"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="edit-tags<?= $t['id_tags']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form action="<?= base_url() ?>Artikel/edit_tags/<?= $t['id_tags']; ?>" method="POST">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myLargeModalLabel">Edit Tags</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Nama Tag</label>
                                                                <input class="form-control" type="text" name="name_tag" value="<?= $t['name_tag']; ?>" placeholder="Cth : Otomotif Indonesia" autocomplete="OFF">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-dark">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="footer-wrap pd-20 mb-20 card-box">
            2021 &copy; sewamobilsby &mdash; Developed by <a href="#" style="color: #0984e3;">KaryoDev</a>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="add-blog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url() ?>Artikel/add_blogs" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Buat Artikel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input class="form-control" type="text" name="title" placeholder="Cth : Otomotif Indonesia" autocomplete="OFF">
                    </div>
                    <div class="form-group">
                        <label>Konten Artikel</label>
                        <textarea class="textarea_editor form-control border-radius-0" name="content" cols="50" placeholder="Enter text ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tags</label><br>
                        <input type="text" class="form-control w-100" name="tags" data-role="tagsinput">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="add-tags" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= base_url() ?>Artikel/add_tags" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Tags</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tag</label>
                        <input class="form-control" type="text" name="name_tag" placeholder="Cth : Otomotif Indonesia" autocomplete="OFF">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-dark">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#tb_artikel').DataTable({
            "ordering": false,
        });
    });
    $(document).ready(function() {
        $('#tb_tags').DataTable({
            "ordering": false,
        });
    });
    $(document).ready(function() {
        $('.textarea_editor1').wysihtml5({
            html: true,

        });
    });
    $(document).ready(function() {
        $('.textarea_editor1').val();
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
<!-- switchery js -->
<script src="assets/src/plugins/switchery/switchery.min.js"></script>
<!-- bootstrap-tagsinput js -->
<script src="assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<!-- bootstrap-touchspin js -->
<script src="assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/scripts/advanced-components.js"></script>
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

    $('.tombol-status').on('click', function(e) {
        e.preventDefault();
        const hrefnya = $(this).attr('href');

        Swal.fire({
            title: 'Mengubah Status Artikel',
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