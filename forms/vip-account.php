
    <div class="service_area about_event" style="background: #000;" id="password_form" hidden>
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" id="password_form_data" method="POST">
                        <label>Thank you submitting your registration information. Please create a password below so you may log back in to the site once your registration is approved. Your username is your email address.</label>
                        <h4>CREATE PASSWORD</h4>
                        <hr class="separator-line"> 
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="firstname" class="col-sm-3">Password <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="password" id="password" type="password" value="<?php echo escape(Input::get('firstname')); ?>" placeholder="Enter Password">
                                      <small><span style="color: rgba(244, 126, 32, 0.87); font-size: 90%;" id="password-message">Minimum 8 Characters, must combine Upper and Lower cases & numbers</span></small>
                                      
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="lastname" class="col-sm-3">Confirm Password <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="confirm_password" id="confirm-password" value="<?php echo escape(Input::get('lastname')); ?>" type="password" placeholder="Confirm Password">
                                      <small><span id="confirm-password_message" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group mt-2" style="overflow: auto;">
                            <input type="hidden" name="action" value="vip-password" />

                          <a href="#" onclick="sendPassword()"><button type="button" class="btn btn-primary px-5 py-2 text-white pull-right" >Save</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
    <?php include "includes/validate-password.php" ?>
    <script>
        
        
    </script>