<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/assets-landingpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> -->
                <h1 class="mb-3 bread">Cars</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="container">

        <div class="tab text-center">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active text-dark" data-toggle="tab" href="#manual" role="tab" aria-selected="true">Manual</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" data-toggle="tab" href="#matic" role="tab" aria-selected="false">Matic</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="manual" role="tabpanel">
                    <div class="pd-20">
                        <div class="row">
                            <?php foreach ($list_manual as $lm) : ?>

                                <div class="col-md-4">
                                    <div class="car-wrap rounded ftco-animate">
                                        <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/mobil/<?= $lm['mobil_img'] ?>);">
                                        </div>
                                        <div class="text text-left">
                                            <h2 class="mb-0"><a href="#"><?= $lm['merk']; ?></a></h2>
                                            <div class="d-flex mb-3">
                                                <span class="cat"><?= $lm['tipe_mobil'] == 'manual' ? 'Manual' : 'Matic' ?></span>
                                                <p class="price ml-auto">Rp <?= number_format($lm['harga'], 0, ',', '.'); ?><span>/hari</span></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-primary w-100 py-2 mt-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:instagram-fill"></span>Instagram</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-secondary w-100 py-2 mt-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:whatsapp-fill"></span>Whatsapp</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="matic" role="tabpanel">
                    <div class="pd-20">
                        <div class="row">
                            <?php foreach ($list_matic as $lm) : ?>

                                <div class="col-md-4">
                                    <div class="car-wrap rounded ftco-animate">
                                        <div class="img rounded d-flex align-items-end" style="background-image: url(uploads/mobil/<?= $lm['mobil_img'] ?>);">
                                        </div>
                                        <div class="text text-left">
                                            <h2 class="mb-0"><a href="#"><?= $lm['merk']; ?></a></h2>
                                            <div class="d-flex mb-3">
                                                <span class="cat"><?= $lm['tipe_mobil'] == 'manual' ? 'Manual' : 'Matic' ?></span>
                                                <p class="price ml-auto">Rp <?= number_format($lm['harga'], 0, ',', '.'); ?><span>/hari</span></p>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-primary w-100 py-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:instagram-fill"></span>Instagram</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="#" class="btn btn-secondary w-100 py-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:whatsapp-fill"></span>Whatsapp</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</section>

<!-- loader -->
<!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div> -->