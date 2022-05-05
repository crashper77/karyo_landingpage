<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('assets/assets-landingpage/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p> -->
                <h1 class="mb-3 bread">Detail Blog</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 ftco-animate">
                <h2 class="mb-3"><?= $detail['title']; ?></h2>
                <p><?= $detail['content']; ?></p>

                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link"><?= $detail['tags']; ?></a>
                        <a href="#"><span class="icon-calendar mr-2"></span><?= $detail['id_akun']; ?></a>
                        <a href="#"><span class="icon-person"></span> <?= date('d M Y', strtotime($detail['update_at'])) ?></a>
                    </div>

                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-md-4 sidebar ftco-animate">


                <div class="sidebar-box ftco-animate">
                    <h2>Recent Blog</h2>
                    <?php foreach ($get_articles as $ga) : ?>

                        <div class="block-21 mb-4 d-flex mt-3">
                            <span class="iconify mr-2" data-icon="ooui:articles-ltr" data-width="50" data-height="50"></span>
                            <div class="text">
                                <h3 class="heading"><a href="<?= base_url() ?>Blog_detail/getarticle/<?= $ga['id_article'] ?>"><?= $ga['title'] ?></a></h3>
                                <!-- <small class="text-dark"><a href="#"><?= word_limiter($ga['content'], 10) ?></a></small> -->
                                <div class="meta">
                                    <div><a href="#"><span class="icon-calendar mr-2"></span><?= date('d M Y', strtotime($ga['update_at'])) ?></a></div>
                                    <div><a href="#"><span class="icon-person"></span><?= $ga['id_akun'] ?></a></div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>




            </div>

        </div>
    </div>
</section> <!-- .section -->

<!-- loader -->
<!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div> -->