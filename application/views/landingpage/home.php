<!-- END nav -->
<div class="hero-wrap ftco-degree-bg" style="background-image: url('assets/assets-landingpage/images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
            <div class="col-lg-8 ftco-animate">
                <div class="text w-100 text-center mb-md-5 pb-md-5">
                    <h1 class="mb-4">RENTAL MOBIL GA PAKE RIBET
                        CUMA DI SEWAMOBILSBY!
                    </h1>

                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-12 featured-top">

                <div class="carousel-testimony owl-carousel ftco-owl">
                    <?php foreach ($get_promo as $gp) : ?>
                        <div class="item">
                            <a href="<?= $gp['url_link'] ?>" target="_blank">
                                <img src="uploads/banner/<?= $gp['banner_img'] ?>" class="rounded-lg shadow-lg" style="background-size: cover;" width="300" height="350" alt="">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</section>


<section class="ftco-section ftco-no-pt bg-light" id="car">
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-6 heading-section text-left ftco-animate mb-5">
                <span class="subheading">Terlaris</span>
                <h2 class="mb-2">Popular Cars</h2>
            </div>
            <div class="col-md-6 heading-section text-right ftco-animate mb-5">
                <a href="<?= base_url() ?>cars"><span class="subheading">See More</span></a>
                <!-- <h2 class="mb-2">Popular Cars</h2> -->
            </div>
        </div>
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
                            <div class="col-md-12">
                                <div class="carousel-car owl-carousel">
                                    <?php foreach ($list_manual as $lm) : ?>
                                        <div class="item">
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
                                                            <a href="https://www.instagram.com/sewamobilsby/?hl=en" class="btn btn-primary w-100 py-2 mt-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:instagram-fill"></span>Instagram</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="https://wa.link/fgxmcu" class="btn btn-secondary w-100 py-2 mt-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:whatsapp-fill"></span>Whatsapp</a>
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
                <div class="tab-pane fade" id="matic" role="tabpanel">
                    <div class="pd-20">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="carousel-car owl-carousel">
                                    <?php foreach ($list_matic as $lm) : ?>

                                        <div class="item">
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
                                                            <a href="https://www.instagram.com/sewamobilsby/?hl=en" class="btn btn-primary w-100 py-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:instagram-fill"></span>Instagram</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="https://wa.link/fgxmcu" class="btn btn-secondary w-100 py-2 mr-1"><span class="iconify mr-2" data-icon="akar-icons:whatsapp-fill"></span>Whatsapp</a>
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

            </div>
        </div>

    </div>
</section>

<section class="ftco-section ftco-about" id="about">
    <div class="container">
        <div class="row no-gutters ">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(assets/assets-landingpage/images/about.jpg)">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">About us</span>
                    <?php foreach ($about_us as $au) : ?>
                        <h2 class="mb-4">Welcome to <?= $au['nama_lengkap'] ?></h2>
                        <p><?= $au['about_us'] ?></p>
                    <?php endforeach; ?>
                    <p><a href="<?= base_url() ?>contact" class="btn btn-dark py-3 px-4">Pelajari Lebih Lanjut</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="services">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Services</span>
                <h2 class="mb-3">Our Latest Services</h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($get_services as $gs) : ?>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center bg-secondary"><?= $gs['icon'] ?></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2"><?= $gs['title'] ?></h3>
                            <p><?= $gs['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="ftco-section ftco-intro" id="cooperation" style="background-image: url(assets/assets-landingpage/images/bg_3.jpg);">
    <div class="overlay bg-secondary"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section heading-section-white ftco-animate">
                <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                <a href="#" class="btn btn-dark btn-lg">Hubungi Kami</a>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <!-- <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Testimonial</span>
                    <h2 class="mb-3">Happy Customer</h2>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(assets/assets-landingpage/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position text-secondary">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(assets/assets-landingpage/images/person_2.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position text-secondary">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(assets/assets-landingpage/images/person_3.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position text-secondary">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(assets/assets-landingpage/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position text-secondary">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap rounded text-center py-4 pb-5">
                                <div class="user-img mb-2" style="background-image: url(assets/assets-landingpage/images/person_1.jpg)">
                                </div>
                                <div class="text pt-4">
                                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Roger Scott</p>
                                    <span class="position text-secondary">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
        <div class="elfsight-app-7c836aba-3246-48cc-9e89-b91b70be61d4"></div>
    </div>
</section>

<section class="ftco-section" id="blog">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 heading-section text-left ftco-animate">
                <span class="subheading">Blog</span>
                <h2>Recent Blog</h2>
            </div>
            <div class="col-md-6 heading-section text-right ftco-animate">
                <a href="<?= base_url() ?>blog"><span class="subheading">See More</span></a>
            </div>
        </div>
        <div class="row d-flex">
            <?php foreach ($get_articles as $ga) : ?>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">

                        <div class="text pt-4">
                            <div class="meta mb-3">
                                <div><a href="#" class="text-secondary"><span class="iconify mr-2" data-icon="akar-icons:calendar"></span><?= date('d M Y', strtotime($ga['update_at'])) ?></a></div>
                                <div><a href="#" class="text-secondary"><span class="iconify mr-2" data-icon="ant-design:user-outlined"></span><?= $ga['id_akun'] ?></a></div>
                            </div>
                            <h3 class="heading mt-2"><a href="#"></a><?= $ga['title'] ?></h3>
                            <h6 class="text-dark my-2"><?= $ga['content'] ?></h6>
                            <p><a href="#" class="btn btn-dark mt-2">Read more</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>
</section>

<section class="ftco-counter ftco-section img bg-light" id="section-counter">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <?php foreach ($about_us as $au) :
                            $since = $au['tgl_berdiri']; ?>
                            <strong class="number" data-number="3">3</strong>
                        <?php endforeach; ?>
                        <span>Year <br>Experienced</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text text-border d-flex align-items-center">
                        <strong class="number" data-number="<?= $total_cars ?>"><?= $total_cars ?></strong>
                        <span>Total <br>Cars</span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
                <div class="block-18">
                    <div class="text d-flex align-items-center">
                        <?php foreach ($about_us as $au) : ?>
                            <strong class="number" data-number="<?= $au['investor'] ?>"><?= $au['investor'] ?></strong>
                        <?php endforeach; ?>
                        <span>Total <br>Investor</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('.owl-banner').owlCarousel({
        margin: 10,
        loop: true,
        items: 1,
        autoWidth: true
    })
</script>