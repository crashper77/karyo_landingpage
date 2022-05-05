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
    <!-- <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/vendors/styles/style.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/dropzone/src/dropzone.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/cropperjs/dist/cropper.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/jvectormap/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/jquery-steps/jquery.steps.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/sweetalert2/dist/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/fancybox/dist/jquery.fancybox.css">

    <!-- bootstrap table -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-table/bootstrap-table.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap-table/extensions/filter-control/bootstrap-table-filter-control.min.css">
    <!-- bootstrap-touchspin css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
    <!-- dropify -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dropify/dropify.min.css">
    <!-- SRC JQUERY CDN-->
    <script src="<?= base_url() ?>assets/src/scripts/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/src/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

    <script src="<?= base_url() ?>assets/src/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
    <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <!-- bootstrap-tagsinput css -->
    <link rel="stylesheet" type="text/css" href="assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
</head>

<body>
    <!-- <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo"><img src="assets/vendors/images/loader.svg" alt=""></div>
            <div class='loader-progress ' id="progress_div">
				<div class='bar bg-success' id='bar1'></div>
			</div>
            <div class='percent' id='percent1'>0%</div>
            <div class="loading-text">
				Loading...
			</div>
        </div>
    </div> -->

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">
                <form>
                    <div class="form-group mb-0">
                        <i class="dw dw-search2 search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Cari..">
                        <div class="dropdown">
                            <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                                <i class="ion-arrow-down-c"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input class="form-control form-control-sm form-control-line" type="text">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>


            <div class="user-info-dropdown mt-1 mr-2">
                <div class="dropdown">
                    <a class="dropdown-toggle mt-2" href="#" role="button" data-toggle="dropdown">
                        <span class="user-name"><?= $user['nama_lengkap']; ?></span>
                        <!-- <span class="user-name">Admin</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list mt-3">
                        <a class="dropdown-item" href="<?= base_url() ?>Profile"><i class="icon-copy dw dw-building"></i>
                            Profile</a>
                        <a class="dropdown-item" href="<?= base_url() ?>login/logout"><i class="dw dw-logout"></i>
                            Keluar</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
                <div class="sidebar-radio-group pb-10 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
                        <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
                        <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
                        <label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
                    </div>
                </div>

                <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
                <div class="sidebar-radio-group pb-30 mb-10">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
                        <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
                        <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
                        <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
                        <label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
                        <label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
                        <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
                    </div>
                </div>

                <div class="reset-options pt-30 text-center">
                    <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo mt-3">
            <a href="<?= base_url() ?>dashboard">
                <img src="uploads/profile/dark/<?= $user['ava_profil_dark'] ?>" alt="" width="30%" class="dark-logo rounded-lg">
                <img src="uploads/profile/light/<?= $user['ava_profil_light'] ?>" alt="" width="30%" class="light-logo rounded-lg">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll mt-3">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <?php foreach ($main as $m) : ?>
                        <li>
                            <div class="<?= $m['class_header'] ?>"><?= $m['nama_menu'] ?></div>
                        </li>
                        <?php
                        $header = $m['menu_id'];
                        $this->db->select('nama_sub_menu, sub_menu.sub_menu_id, class_sm');
                        $this->db->from('role_list_menu');
                        $this->db->join('list_menu', 'role_list_menu.id_list=list_menu.id_list');
                        $this->db->join('sub_menu', 'sub_menu.sub_menu_id=list_menu.sub_menu_id');
                        $this->db->join('header_menu', 'header_menu.menu_id=sub_menu.menu_id');
                        $this->db->where('header_menu.menu_id', $header);
                        $this->db->where('id_department', $role);
                        $this->db->group_by('sub_menu_id', 'ASC');
                        $hasil = $this->db->get()->result_array();
                        foreach ($hasil as $h) : ?>
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle">
                                    <span class="<?= $h['class_sm'] ?>"></span><span class="mtext"><?= $h['nama_sub_menu'] ?></span>
                                </a>
                                <?php
                                $list = $h['sub_menu_id'];
                                $this->db->select('nama_list_menu, list_menu.id_list, url');
                                $this->db->from('role_list_menu');
                                $this->db->join('list_menu', 'role_list_menu.id_list=list_menu.id_list');
                                $this->db->join('sub_menu', 'sub_menu.sub_menu_id=list_menu.sub_menu_id');
                                $this->db->join('header_menu', 'header_menu.menu_id=sub_menu.menu_id');
                                $this->db->where('sub_menu.sub_menu_id', $list);
                                $this->db->where('id_department', $role);
                                $listnya = $this->db->get()->result_array();
                                foreach ($listnya as $l) : ?>
                                    <ul class="submenu">
                                        <li><a href="<?= base_url() ?><?= $l['url'] ?>"><?= $l['nama_list_menu'] ?></a></li>
                                    </ul>
                                <?php endforeach; ?>
                            </li>
                        <?php endforeach; ?>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                    <?php endforeach; ?>
                    <li>
                        <div class="sidebar-small-cap">Add On</div>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>login/logout" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-logout-2"></span>
                            <span class="mtext">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <div class="sidebar-small-cap">Main</div>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-layout2"></span><span class="mtext">Overview</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="sidebar-small-cap mt-3">Master</div>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-car"></span><span class="mtext">Mobil</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Data Mobil</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon dw dw-file"></span><span class="mtext">Content</span>
                        </a>
                        <ul class="submenu">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Site Company</a></li>
                        </ul>
                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>
                        <div class="sidebar-small-cap">Extra</div>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>login/logout" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-paper-plane1"></span>
                            <span class="mtext">Keluar</span>
                        </a>
                    </li>
                </ul>
            </div> -->

        </div>
    </div>