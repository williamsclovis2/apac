
<div class="slider_area">
    <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="slider_text slider_text_register">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?=$_EVENT_PARTICIPATION_TYPE_NAME_ ?> Registration Form </h3>
                        <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        <h5 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"> <?= ucfirst($_EVENT_SUB_TYPE_NAME_) ?> | <?= ucfirst($_EVENT_TYPE_NAME_) ?>  </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<div class="service_area about_event"  id="register_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <form  class="form-contact" id="registerForm" method="post">
                    <div id="register-messages"></div>
                    <label>All <span>*</span> fields are mandatory </label>
                    <h4>CONTACT INFORMATION</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3">First name <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="firstname" oninput="validate(this)"  id="firstname" type="text" placeholder="First name" data-rule="required" data-msg="Please enter first name"/>
                                    <div class="validate" id="firstname_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3">Second name <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="lastname" oninput="validate(this)"  id="lastname" type="text" placeholder="Last name" data-rule="required" data-msg="Please enter last name"/>
                                    <div class="validate" id="lastname_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="email" class="col-sm-3">Email <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="email" oninput="validate(this)"  id="email" type="text" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" onselectstart="return false" onpaste="return false;" onCopy="return false"  onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                    <div class="validate" id="email_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="email" class="col-sm-3">Confirm email <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="confirm_email"  oninput="validate(this)" id="confirm_email" type="text" placeholder="Confirm email" data-rule="email" data-msg="email doesn't match field" onselectstart="return false" onpaste="return false;" onCopy="return false"  onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                    <div class="validate" id="confirm_email_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="telephone" class="col-sm-3">Telephone number 1 <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input type="text" name="telephone" oninput="validate(this)"  id="telephone" class="form-control" data-rule="required" data-msg="Please enter telephone"/>
                                    <div class="validate" id="telephone_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="telephone" class="col-sm-3">Telephone number 2</label>
                                <div class="col-sm-9 field-validate">
                                    <input type="text" name="telephone_2"  oninput="validate(this)" id="telephone_2" class="form-control"/>
                                    <div class="validate" ></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Job title <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="job_title" oninput="validate(this)"  id="job_title" type="text" placeholder="Job title" data-rule="required" data-msg="Please enter job title"/>
                                    <div class="validate" id="job_title_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="job_category" class="col-sm-3">Job category <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" name="job_category" id="job_category" onchange="Other(this,'#job_category1');" data-rule="required" data-msg="Please select job category"/>
                                                <?php $user->jobTitle($form->ERRORS,Input::get('job-category'),$categ);?>
                                            </select>
                                            <div class="validate" id="job_category_error"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" oninput="validate(this)"  name="job_category1" id="job_category1" type="text" placeholder="For other - please specify" 
                                            <?php if(escape(Input::get('job_category')) != 'Other'){?> disabled="disabled" <?php }?>>
                                            <div class="validate" id="job_category1_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="gender" class="col-sm-3">Language <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="language" onchange="validate(this)"  name="language" class="form-control" data-rule="required" data-msg="Please select Language">
                                        <option value="">[--Select--]</option>
                                        <option value="English">English</option>
                                        <option value="French">French</option>
                                        <option value="Portuguese">Portuguese</option>
                                        <option value="Arabic">Arabic</option>
                                    </select>
                                    <div class="validate" id="language_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="gender" class="col-sm-3">Gender <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="gender" name="gender" onchange="validate(this)"  class="form-control" data-rule="required" data-msg="Please select gender">
                                        <option value="">[--Select--]</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Prefer not to disclose</option>
                                    </select>
                                    <div class="validate" id="gender_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="birthday" class="col-sm-3">Date of birth</label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control"  oninput="validate(this)"  data-rule="" name="birthday" id="birthday" type="date"  data-msg="Please enter date of birth"/>
                                    <div class="validate" id="birthday_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h4> EDUCATION INSTITUTE</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3">Name of school   <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control"  oninput="validate(this)"  name="institute_name" id="institute_name" type="text" placeholder="Name of School" data-rule="required" data-msg="Please enter the  name of your school"/>
                                    <div class="validate" id="institute_name_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="gender" class="col-sm-3">Category <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="institute_category"  onchange="validate(this)"  name="institute_category" class="form-control" data-rule="required" data-msg="Please select category">
                                        <option value="">[--Select--]</option>
                                        <option value="High school student">High school student </option>
                                        <option value="Undergraduate">Undergraduate</option>
                                        <option value="Graduate / Postgraduate">Graduate / Postgraduate</option>
                                    </select>
                                    <div class="validate" id="institute_category_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="website" class="col-sm-3">Institutions website</label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control"  oninput="validate(this)"  name="institute_website" id="institute_website" type="text" placeholder="Website">
                                    <div class="validate" id="institute_website_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="" class="col-sm-3"></label>
                                <div class="col-sm-9 field-validate">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select id="organisation_country"  onchange="validate(this)"  name="institute_country" class="form-control" data-rule="required" data-msg="Please select country"/>
                                                <option></option>
                                            </select>
                                            <div class="validate" id="institute_country_error"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control"  oninput="validate(this)"  name="institute_city" id="organization_city" type="text" placeholder="City" data-rule="required" data-msg="Please enter city"/>
                                            <div class="validate" id="institute_city_error"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>WHAT ARE YOUR OBJECTIVES FOR ATTENDING THIS CONGRESS?</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">first objective <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="firt_objective"  oninput="validate(this)"   id="firt_objective" class="form-control" placeholder="Type your objective" data-rule="required" data-msg="Please only 500 characters" style="height: 70px;"></textarea>
                                    <div class="validate" id="firt_objective_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Second objective <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="second_objective" oninput="validate(this)"   id="second_objective" class="form-control" placeholder="Type your objective" data-rule="required" data-msg="Please only 500 characters" style="height: 70px;"></textarea>
                                    <div class="validate"  id="second_objective_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Third objective <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="third_objective" oninput="validate(this)"  id="third_objective" class="form-control" placeholder="Type your objective" data-rule="maxlen:1020" data-msg="Please only 500 characters" style="height: 70px;"></textarea>
                                    <div class="validate"   id="third_objective_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>WHERE DID YOU HEAR ABOUT APAC? </h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Select source<span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select class="form-control" name="info_source"   onchange="validate(this)"  id="info_source" data-rule="required" data-msg="Please select "/> 
                                        <option value="" selected="">[--Select--]</option>
                                        <option value="Radio"> Radio</option>
                                        <option value="TV "> TV</option>
                                        <option value="Online / Social media">Online / Social media </option>
                                        <option value="Word of mouth"> Word of mouth </option>
                                        <option value="Email "> Email </option>
                                        <option value="Embassy / Consulate "> Embassy / Consulate </option>
                                    </select>
                                    <div class="validate" id="info_source_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
if($_HIDDEN_STATE['SECTION']['IDENTIFICATION'] != 'hidden'):
?>
                <span class="<?=$_HIDDEN_STATE['SECTION']['IDENTIFICATION']?>">
                <h4>BADGE COLLECTION IDENTIFICATION</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Type of ID document <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" onchange="validate(this)"  name="id_type" id="id_type" data-rule="required" data-msg="Please select document type"/> 
                                                <option value="" selected="">[--Select--]</option>
                                                <option value="Passport">Passport</option>
                                                <option value="ID">ID card</option>
                                            </select>
                                            <div class="validate" id="id_type_error"></div>
                                        </div>
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" id="id_number" oninput="validate(this)"  name="id_number"  placeholder="Document number" data-rule="required" data-msg="Please enter document number"/>
                                            <div class="validate" id="id_number_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
<?php
endif;
?>
                     <h4>CREATE PASSWORD</h4>
                    <hr class="separator-line">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3">Password <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Enter password" data-rule="minlen:6" data-msg="Minimum 6 characters"/>
                                    <div class="validate" id="password_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3">Confirm Password <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="confirm_password" id="confirm_password" type="password" placeholder="Confirm password" data-rule="matches" data-msg="Password doesn't match"/>
                                    <div class="validate" id="confirm_password_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4>ACCOMMODATION</h4>
                    <hr class="separator-line">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-12" >Would you like to receive information on accommodation booking in Kigali? <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                        <label class="form-check-label" for="inlineRadio2">No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 2%;">
                        <div class="form-group col-sm-12">
                            <div>
                                <label class="checkbox-mc"> By clicking this button I choose to opt out of sharing my name, title and affiliation with APAC sponsors.  
                                    <input type="checkbox" name="privacy"  id="privacy"> 
                                    <span class="geekmark" ></span> 
                                </label> 
                            </div>
                        </div>
                    </div>
                    <hr class="separator-line">
                    <div class="row" style="margin-bottom: 2%;">
                        <div class="col-md-4 col-sm-12 col-xm-12" style="margin-top: 3%; ">
                            <img src="<?=linkto('admin/get_captcha.php?rand='.rand())?>" id='captcha' class="img img-responsive">
                            <a href="javascript:void(0)" id="reloadCaptcha" title="Refresh" style="color: #f47821; font-size: 140%; margin-left: 10%;"><i class="fa fa-refresh"></i></a>
                            <div class="validate" id="securityCode_error"></div>
                         </div>
                        
                         <div class="col-md-8 col-sm-12 col-xm-12">
                            <div class="span8 main-row">
                                <div class="input">
                                    <label style="color: #ffffff; font-size: 16px; margin-top: 1%; margin-bottom: -1%;">Type the characters you see</label><br>
                                    <input type="text" id="securityCode" placeholder="Type the captcha characters here" name="securityCode" class="form-control">
                                </div>
                            </div>	
                        </div>
                    </div>

                    <div class="form-group mt-2" style="overflow: auto;">
                        <input type="hidden" name="request"  value="registration">
                        <input type="hidden" name="eventId"  value="<?=Hash::encryptToken($activeEventId)?>">
                        <input type="hidden" name="_EvCode_" id="_EvCode_"  value="<?=$_EvCode_?>">
                        <input type="hidden" name="_EvPCode_"  id="_EvPCode_" value="<?=$_EvPCode_?>">
                        <input type="hidden" name="del_type" value="">
                        <input type="hidden" name="eventParticipation" value="<?=$_EVENT_PARTICIPATION_SUB_TYPE_ID_ENCRYPTED_?>">
                        <button type="button" id="registerButton" class="btn btn-primary px-5 py-2 text-white pull-right registerFormSubmit" data-loading-text="Loading...">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</div>
</div>