<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/assets-landingpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> -->
                <h1 class="mb-3 bread">Our Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
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
                            <h6 class="text-dark my-2"><?= word_limiter($ga['content'], 20)  ?></h6>
                            <p><a href="<?= base_url() ?>Blog_detail/getarticle/<?= $ga['id_article'] ?>" class="btn btn-dark mt-2">Read more</a></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

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