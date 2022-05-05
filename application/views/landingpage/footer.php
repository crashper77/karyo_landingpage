<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <?php foreach ($about_us as $au) : ?>
                        <h2 class="ftco-heading-2"><a href="#" class="logo"><img src="uploads/profile/light/<?= $au['ava_profil_light']; ?>" class="rounded-lg shadow-lg" width="100" height="100" alt=""></a></h2>
                        <p><?= $au['about_us'] ?></p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="<?= $au['url_wa'] ?>" target="_blank"><span class="icon-whatsapp"></span></a></li>
                            <li class="ftco-animate"><a href="<?= $au['facebook'] ?>" target="_blank"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="<?= $au['instagram'] ?>" target="_blank"><span class="icon-instagram"></span></a></li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Information</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url() ?>contact" class="py-2 d-block">About</a></li>
                        <li><a href="#services" class="py-2 d-block">Services</a></li>
                        <li><a href="#cooperation" class="py-2 d-block scroll-to">Cooperation</a></li>
                        <li><a href="<?= base_url() ?>contact" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQ</a></li>
                            <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                            <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                            <li><a href="#" class="py-2 d-block">How it works</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div> -->
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><a href="https://goo.gl/maps/bRumzsK72i3dSZUH6" target="_blank"><span class="icon icon-map-marker"></span><span class="text">Jl. Petemon Bar. No.217, Kupang Krajan, Kec. Sawahan, Kota SBY, Jawa Timur 60253</span></a></li>
                            <li><a href="#" target="_blank"><span class="icon icon-phone"></span><span class="text">+62 857-0411-5051</span></a></li>
                            <li><a href="mailto:info.sewamobilsby@gmail.com"><span class="icon icon-envelope"></span><span class="text">info.sewamobilsby@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear() - 3);
                    </script> sewamobilsby. All rights reserved | Developed by <a href="https://colorlib.com" target="_blank" class="font-weight-bold">KaryoDev</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
    </svg></div>

<script>
    $('.selectpicker').selectpicker();
</script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>


<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/popper.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.easing.1.3.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.waypoints.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.stellar.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/aos.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/bootstrap-datepicker.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/jquery.timepicker.min.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/google-map.js"></script>
<script src="<?= base_url() ?>assets/assets-landingpage/js/main.js"></script>

</body>

</html>