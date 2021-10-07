<?php
require_once 'admin/core/init.php';
if(!isset($_SESSION['username'])) {
    Redirect::to('login');
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include'includes/head.php';?>
</head>

<body>
    <?php include'includes/nav.php';?>
    
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">The Future Summit <br>is Now <span class="live">Live</span></h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!isset($_SESSION['username'])) { ?>
    <!-- <div class="countdown">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><a href="login">Login to join the event</a></h2>
                </div>
            </div>
        </div>
    </div> -->
    <?php } ?>

    <div class="service_area about_event">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-30">
                        <div class="row">
                            <div class="col-md-2 wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                                <aside class="live_left_sidebar">
                                    <ul class="live_left_sidebar_nav">
                                        <li class="active"><a href="#">Home</a></li>
                                        <li><a href="live_session">Join Sessions</a></li>
                                        <li><a href="exhibition">Visit Exhibition</a></li>
                                        <li><a href="exhibition">Meet our Sponsors</a></li>
                                        <li><a href="#">Media Hub</a></li>
                                    </ul>
                                </aside>
                            </div>
                            <div class="col-md-10 live_about_border wow fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
                                <h4 style="color: #7A838B;">Welcome 
                                    <?php if(Session::exists('username')){echo $_SESSION['name'];}?>
                                </h4>
                                <h3>About The Summit</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti reprehenderit animi est eaque corporis! Nisi, asperiores nam amet doloribus, soluta ut reiciendis. Consequatur modi rem, vero eos ipsam voluptas.<br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.</p>
                                <p style="margin-top: 10px;">Error minus sint nobis dolor laborum architecto, quaerat. Voluptatum porro expedita labore esse velit veniam laborum quo obcaecati similique iusto delectus quasi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi at consequatur unde molestiae quidem provident voluptatum deleniti quo iste error eos est praesentium distinctio cupiditate tempore suscipit inventore deserunt tenetur.<br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur?</p>

                                <h3 class="mt-3">Featured Speakers</h3> 
                                <div id="live_speakers" class="owl-carousel owl-theme live_speakers">
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/sp1.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/sp2.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/sp3.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/sp4.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/sp5.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Ato-Bentsi-Enchill.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Diana-Ofwona.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Dominique-Uwase-Alonga.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Dorothy-Tembo.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Dr.-Adesina-Akinwumi.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Dr.-Donald-Kaberuka.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                    <div class="client-item speakers">
                                        <img src="<?php linkto('img/speakers/Dr.-Salma-Abbasi.jpg'); ?>" class="img-fluid" alt="speakers">
                                        <h4>Lorem ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet consectetur</p>
                                    </div>
                                </div>

                                <!-- <div class="text-center" style="margin-top: 30px;">
                                    <a href="#" class="btn btn-primary px-5 py-1">Download Our Brochure</a>
                                </div>

                                <h3 class="mt-3">Expected Outcomes</h3>
                                <div class="outcomes">
                                    <div class="about_list">
                                        <ul>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia </li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia </li>
                                            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary px-5 py-1  mt-2" style="width: 100%;">Join Sessions</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary px-5 py-1 mt-2" style="width: 100%;">Visit Exhibition</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary px-5 py-1 mt-2" style="width: 100%;">Media Hub</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-primary px-5 py-1 mt-2" style="width: 100%;">Learn & Explore</a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service_area twitter_area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <i class="fa fa-twitter"></i>
                            <h3>Join the conversation</h3>
                            <h1>#FutureSummit</h1>
                        </div>
                        <div class="col-md-6">
                            <a class="twitter-timeline" href="https://twitter.com/cuberwanda?lang=en" data-height="300" data-chrome="noheader nofooter noborders" style="overflow-y: scroll">Tweets by Cube Rwanda</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include'views/program.php';?>

    <?php include'includes/footer.php';?>
</body>

</html>