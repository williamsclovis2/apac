<div class="service_area about_event" style="background: #000; display: none;" id="account_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form action="<?php linkto("forms/register_action.php"); ?>" class="form-contact" id="accountForm" method="post">
                    <div id="account-messages"></div>
                    <label>Thank you submitting your registration information. Please create a password below so you may log back in to the site once your registration is approved. Your username is your email address.</label>
                    <h4>CREATE PASSWORD</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3">Password <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" data-rule="minlen:6" data-msg="Minimum 6 characters"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3">Confirm Password <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="confirm_password" id="confirm_password" type="password" placeholder="Confirm password" data-rule="matches" data-msg="Password doesn't match"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group mt-2" style="overflow: auto;">
                        <input type="hidden" name="request" value="account">
                        <input type="hidden" name="eventId" value="7">
                        <input type="hidden" name="username" id="username">
                        <button type="submit" id="accountButton" class="btn btn-primary px-5 py-2 text-white pull-right">Save</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>