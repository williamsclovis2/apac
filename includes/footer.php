<footer class="site-footer">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <!-- <div class="col-lg-7 col-sm-12 mr-auto">
                    <h2 class="footer-heading mb-4"><img src="img/logo.png" class="img img-responsive" style="width: 60px;" alt=""></h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam iure deserunt ut architecto dolores quo beatae laborum aliquam ipsam rem impedit obcaecati ea consequatur.</p>
                </div>
          
                <div class="col-lg-2 col-sm-6 col-xs-6">
                    <h2 class="footer-heading mb-4">Quick Links</h2>
                    <ul class="list-unstyled">
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Sponsors</a></li>
                      <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-6">
                    <h2 class="footer-heading mb-4">Follow Us</h2>
                    <a href="#" class="pl-0 pr-3"><span class="ti-facebook"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="fa fa-youtube-play"></span></a>
                    <a href="#" class="pl-3 pr-3"><span class="fa fa-linkedin"></span></a>
                </div> -->

                <div class="col-sm-12">
                    <div class="footer-date">
                        <h3><?=$_Dictionary->words('footer-content-event-title')?></h3>
                        <p><?=$_Dictionary->words('content-event-date')?></p>
                        <div class="border-top"></div>
                        <p><a href="mailto:info@thesummit.org">info@thesummit.org</a></p>
                        <p><a href="<?php linkto('privacy'); ?>"><?=$_Dictionary->words('terms-conditions')?></a> | <a href="<?php linkto('privacy'); ?>"><?=$_Dictionary->words('privancy-policy')?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3 mt-1 text-center">
        <div class="col-md-12">
            <div class="">
              <p><?=$_Dictionary->words('powered-by')?> <a href="#">TorusEvents</a></p>
            </div>
        </div>
    </div>
  </div>
</footer>
<a id="backtotop" href="#top"><i class="fa fa-level-up"></i></a>
<!-- </div> --> 

<!-- link that opens popup -->
<!-- JS here -->

<script src="<?php linkto('js/vendor/modernizr-3.5.0.min.js'); ?>"></script>
<script src="<?php linkto('js/vendor/jquery-1.12.4.min.js'); ?>"></script>
<script src="<?php linkto('js/popper.min.js'); ?>"></script>
<script src="<?php linkto('js/bootstrap.min.js'); ?>"></script>
<script src="<?php linkto('js/isotope.pkgd.min.js'); ?>"></script>
<script src="<?php linkto('js/ajax-form.js'); ?>"></script>
<script src="<?php linkto('js/waypoints.min.js'); ?>"></script>
<script src="<?php linkto('js/jquery.counterup.min.js'); ?>"></script>
<script src="<?php linkto('js/imagesloaded.pkgd.min.js'); ?>"></script>
<script src="<?php linkto('js/scrollIt.js'); ?>"></script>
<script src="<?php linkto('js/jquery.scrollUp.min.js'); ?>"></script>
<script src="<?php linkto('js/wow.min.js'); ?>"></script>
<script src="<?php linkto('js/jquery.slicknav.min.js'); ?>"></script>
<script src="<?php linkto('js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php linkto('js/plugins.js'); ?>"></script>
<script src="<?php linkto('js/gijgo.min.js'); ?>"></script>
<script src="<?php linkto('js/slick.min.js'); ?>"></script>


<script src="<?php linkto('js/main.js'); ?>"></script>

<script type="text/javascript" src="<?php //linkto('js/moment.js'); ?>"></script>
<script type="text/javascript" src="<?php //linkto('js/moment-timezone-with-data.js'); ?>"></script>
<script type="text/javascript" src="<?php //linkto('js/timer.js'); ?>"></script>


<script src="<?php linkto('js/owl.carousel.js'); ?>"></script>
<script>
    $(document).ready(function () {
        $("#partners").owlCarousel({
            autoPlay: 3000,
            items: 5,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,2],
            singleItem : false
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#speakers").owlCarousel({
            autoPlay: 3000,
            items: 6,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,2],
            singleItem : false
        });
    });
</script>
<script>
    $(document).ready(function () {
        $("#live_speakers").owlCarousel({
            autoPlay: 3000,
            items: 6,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [980,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [479,2],
            singleItem : false
        });
    });
</script>
<script src="<?php linkto('js/jquery.backtotop.js'); ?>"></script>
<script src="<?php linkto('js/easing.js'); ?>"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
