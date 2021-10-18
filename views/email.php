
                   
                    <form class="login-form bg-gray mt-5" action="" method="post" role="form">
                       
                        <h4>Login to join the event</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input class="form-control" id="username" name="username" value="" type="text" placeholder="Enter email" required>
                                </div>
                            </div>
                            
                        </div>
                       
                        <div class="form-group mt-3">
                            <input type="hidden" name="token" value="<?=Token::generate()?>"> 
                            <button type="button" class="btn btn-primary py-1 text-white" onclick="">Reset now</button>
                        </div>
                       
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>

    <div class="service_area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title">
                        <h3>Parners / Sponsors</h3> 
                    </div>

                    <div id="partners" class="owl-carousel owl-theme">
                        <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <img src="img/brand/1.png" alt="">
                        </div>
                        <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <img src="img/brand/2.png" alt="">
                        </div>
                        <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                            <img src="img/brand/3.png" alt="">
                        </div>
                        <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                            <img src="img/brand/4.png" alt="">
                        </div>
                        <div class="client-item wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">
                            <img src="img/brand/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include'includes/footer.php';?>


<











</body>

</html>