
    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;">VIP Registration Form</h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event" style="background: #000;" id="vip-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" id="vip_form_data" method="POST">
                        <label>All <span>*</span> fields are mandatory </label>
                        <h4>CONTACT INFORMATION</h4>
                        <hr class="separator-line"> 
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="firstname" class="col-sm-3">First name <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="firstname" id="firstname" type="text" value="<?php echo escape(Input::get('firstname')); ?>" placeholder="First name">
                                      <small><span id="firstname_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="lastname" class="col-sm-3">Last name <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="lastname" id="lastname" value="<?php echo escape(Input::get('lastname')); ?>" type="text" placeholder="Last name">
                                      <small><span id="lastname_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="email" class="col-sm-3">Email <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="email" id="email" type="email" value="<?php echo escape(Input::get('email')); ?>" placeholder="Email">
                                      <small><span id="email_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="telephone" class="col-sm-3">Telephone <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" name="phoneNumber" id="phoneNumber" class="form-control">
                                      <small><span id="telephone_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="gender" class="col-sm-3">Gender <span>*</span></label>
                                    <div class="col-sm-9">
                                        <select id="gender" name="gender" class="form-control">
                                            <option value="" <?php if(escape(Input::get('gender')) == ''){ echo 'selected="selected"';}?>> [--Select--]</option>
                                            <option value="Male" <?php if(escape(Input::get('gender')) == 'Male'){ echo 'selected="selected"';}?>>Male</option>
                                            <option value="Female" <?php if(escape(Input::get('gender')) == 'Female'){ echo 'selected="selected"';}?>>Female</option>
                                            <option value="Other" <?php if(escape(Input::get('gender')) == 'Other'){ echo 'selected="selected"';}?>>I'd rather not say</option>
                                        </select>
                                        <small><span id="gender_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="dateofbirth" class="col-sm-3">Date of birth</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="dateofbirth" id="dateofbirth" type="date">
                                      <small><span id="dob_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4>ORGANIZATION </h4>
                        <hr class="separator-line"> 
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Organization name <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="organisation_name" id="organisation-name" type="text" value="<?php echo escape(Input::get('organisation-name')); ?>" placeholder="Organization name">
                                      <small><span id="organisation_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Organization type <span>*</span></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" onchange="Other(this,'#organisation-category1', '#organisation-category1_error');" id="organisation_type" name="organisation_type" >
                                                    <option value="" <?php if(escape(Input::get('organisation-category')) == ''){ echo 'selected="selected"';}?>> [--Select--]</option>
                                                    <option value="Academia" <?php if(escape(Input::get('organisation-category')) == 'Academia'){ echo 'selected="selected"';}?>>Academia</option>
                                                    <option value="Civil Society" <?php if(escape(Input::get('organisation-category')) == 'Civil Society'){ echo 'selected="selected"';}?>>Civil Society </option>
                                                    <option value="International Organization" <?php if(escape(Input::get('organisation-category')) == 'International Organization'){ echo 'selected="selected"';}?>>International Organization</option>
                                                    <option value="Non-Governmental Organization" <?php if(escape(Input::get('organisation-category')) == 'Non-Governmental Organization'){ echo 'selected="selected"';}?>>Non-Governmental Organization</option>
                                                    <option value="Non-Profit Organization" <?php if(escape(Input::get('organisation-category')) == 'Non-Profit Organization'){ echo 'selected="selected"';}?>>Non-Profit Organization</option>
                                                    <option value="Private/Corporation" <?php if(escape(Input::get('organisation-category')) == 'Private/Corporation'){ echo 'selected="selected"';}?>>Private/Corporation</option>
                                                    <option value="Regional Organization" <?php if(escape(Input::get('organisation-category')) == 'Regional Organization'){ echo 'selected="selected"';}?>>Regional Organization </option>
                                                    <option value="other" <?php if(escape(Input::get('organisation-category')) == 'Regional Organization'){ echo 'selected="selected"';}?>>Other </option>
                                                </select>
                                                <small><span id="organisation_type_error" style="color: red;"></span></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="org_type_specification" id="organisation-category1" type="text" placeholder="For other - please specify" 
                                                <?php if(escape(Input::get('organisation-category')) == 'other'){?> 
                                                value="<?php echo Input::get('othercategory');?>" <?php }?>
                                                <?php if(escape(Input::get('organisation-category')) != 'other'){?> disabled="disabled" <?php }?>>
                                                <small><span id="organisation-category1_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Industry <span>*</span></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="industry" onchange="Other(this,'#industry1', '#industry1_error');" id="industry">
                                                    <option value="" <?php if(escape(Input::get('industry')) == ''){ echo 'selected="selected"';}?>> [--Select--] </option>
                                                              
                                                    <option value="Academics/ Education" <?php if(escape(Input::get('industry')) == 'Academics/ Education'){ echo 'selected="selected"';}?>>Academics/ Education</option>
                                                  
                                                    <option value="Advertising/Public Relations" <?php if(escape(Input::get('industry')) == 'Advertising/Public Relations'){ echo 'selected="selected"';}?>>Advertising/Public Relations</option>
                                                  
                                                    <option value="Agricultural Services &amp; Products" <?php if(escape(Input::get('industry')) == 'Agricultural Services &amp; Products'){ echo 'selected="selected"';}?>>Agricultural Services &amp; Products</option>
                                                  
                                                    <option value="Attorneys and law" <?php if(escape(Input::get('industry')) == 'Attorneys and law'){ echo 'selected="selected"';}?>>Attorneys and law</option>
                                                  
                                                    <option value="Clergy &amp; Religious Organizations" <?php if(escape(Input::get('industry')) == 'Clergy &amp; Religious Organizations'){ echo 'selected="selected"';}?>>Clergy &amp; Religious Organizations </option>
                                                  
                                                    <option value="Clothing and Textiles" <?php if(escape(Input::get('industry')) == 'Clothing and Textiles'){ echo 'selected="selected"';}?>>Clothing and Textiles</option>
                                                  
                                                    <option value="Defence and security" <?php if(escape(Input::get('industry')) == 'Defence and security'){ echo 'selected="selected"';}?>>Defence and security</option>
                                                  
                                                    <option value="Energy and Natural Resources and Environment" <?php if(escape(Input::get('industry')) == 'Energy and Natural Resources and Environment'){ echo 'selected="selected"';}?>>Energy and Natural Resources and Environment</option>
                                                  
                                                    <option value="Entertainment Industry" <?php if(escape(Input::get('industry')) == 'Entertainment Industry'){ echo 'selected="selected"';}?>>Entertainment Industry</option>
                                                  
                                                    <option value="Financial and Commercial Services" <?php if(escape(Input::get('industry')) == 'Financial and Commercial Services'){ echo 'selected="selected"';}?>>Financial and Commercial Services</option>
                                                  
                                                    <option value="Hospitality and Tourism" <?php if(escape(Input::get('industry')) == 'Hospitality and Tourism'){ echo 'selected="selected"';}?>>Hospitality and Tourism</option>
                                                  
                                                    <option value="Healthcare services" <?php if(escape(Input::get('industry')) == 'Healthcare services'){ echo 'selected="selected"';}?>>Healthcare services</option>
                                                  
                                                    <option value="ICT" <?php if(escape(Input::get('industry')) == 'ICT'){ echo 'selected="selected"';}?>>ICT</option>
                                                  
                                                    <option value="Infrastructure" <?php if(escape(Input::get('industry')) == 'Infrastructure'){ echo 'selected="selected"';}?>>Infrastructure</option>
                                                  
                                                    <option value="Logistics and Transportation" <?php if(escape(Input::get('industry')) == 'Logistics and Transportation'){ echo 'selected="selected"';}?>>Logistics and Transportation</option>
                                                  
                                                    <option value="Manufacturing" <?php if(escape(Input::get('industry')) == 'Manufacturing'){ echo 'selected="selected"';}?>>Manufacturing</option>
                                                  
                                                    <option value="Mining" <?php if(escape(Input::get('industry')) == 'Mining'){ echo 'selected="selected"';}?>>Mining</option>
                                                  
                                                    <option value="Media" <?php if(escape(Input::get('industry')) == 'Media'){ echo 'selected="selected"';}?>>Media </option>
                                                  
                                                    <option value="Non-profits, Foundations &amp; Philanthropists" <?php if(escape(Input::get('industry')) == 'Non-profits, Foundations &amp; Philanthropists'){ echo 'selected="selected"';}?>>Non-profits, Foundations &amp; Philanthropists</option>
                                                  
                                                    <option value="Printing &amp; Publishing" <?php if(escape(Input::get('industry')) == 'Printing &amp; Publishing'){ echo 'selected="selected"';}?>>Printing &amp; Publishing</option>
                                                  
                                                    <option value="Private Equity &amp; Investment Firms" <?php if(escape(Input::get('industry')) == 'Private Equity &amp; Investment Firms'){ echo 'selected="selected"';}?>>Private Equity &amp; Investment Firms</option>
                                                  
                                                    <option value="Real Estate" <?php if(escape(Input::get('industry')) == 'Real Estate'){ echo 'selected="selected"';}?>>Real Estate</option>
                                                  
                                                    <option value="Religious Organizations/Clergy" <?php if(escape(Input::get('industry')) == 'Religious Organizations/Clergy'){ echo 'selected="selected"';}?>>Religious Organizations/Clergy</option>
                                                  
                                                    <option value="Sports, Professional" <?php if(escape(Input::get('industry')) == 'Sports, Professional'){ echo 'selected="selected"';}?>>Sports, Professional</option>
                                                    
                                                  <option value="Telecommunications" <?php if(escape(Input::get('industry')) == 'Telecommunications'){ echo 'selected="selected"';}?>>Telecommunications </option>

                                                    <option value="other" <?php if(escape(Input::get('organisation-category')) == 'Regional Organization'){ echo 'selected="selected"';}?>>Other </option>
                                                </select>
                                                <small><span id="industry_error" style="color: red;"></span></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="industry1" id="industry1" type="text" placeholder="For other - please specify" 
                                                <?php if(escape(Input::get('industry')) == 'other'){?> 
                                                value="<?php echo Input::get('industry1');?>" <?php }?>
                                                <?php if(escape(Input::get('industry')) != 'other'){?> disabled="disabled" <?php }?>>
                                                <small><span id="industry1_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Job Title <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="jobtitle" id="job-title" type="text" value="<?php echo escape(Input::get('job-title')); ?>" placeholder="Job Title">
                                      <small><span id="job-title_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Job Category <span>*</span></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="jobcategory" onchange="Other(this,'#job-category1', '#job-category1_error');" id="job-category">
                                                    <?php $user->jobTitle($form->ERRORS,Input::get('job-category'),$categ);?>
                                                </select>
                                                <small><span id="category_error" style="color: red;"></span></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="jobcategory_specification" id="job-category1" type="text" placeholder="For other - please specify" 
                                                <?php if(escape(Input::get('job-category')) == 'other'){?> 
                                                value="<?php echo Input::get('job-category1');?>" <?php }?>
                                                <?php if(escape(Input::get('job-category')) != 'other'){?> disabled="disabled" <?php }?>>
                                                <small><span id="job-category1_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-address" class="col-sm-3">Physical address <span>*</span></label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="physical_address" id="organisation-address" type="text" placeholder="Organization physical address">
                                      <small><span id="organisation-address_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input class="form-control" name="line_one" id="line-one" type="text" value="<?php echo escape(Input::get('line-one')); ?>" placeholder="Line One" >
                                                <small><span id="line-one_error" style="color: red;"></span></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="line_two" id="line-two" type="text" value="<?php echo escape(Input::get('line-two')); ?>" placeholder="Line Two" >
                                                <small><span id="line-two_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3"></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select id="companyCountry" name="companyCountry" class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="company_city" id="organisation-city" type="text" value="<?php echo escape(Input::get('organisation-city')); ?>" placeholder="City" >
                                                <small><span id="organisation-city_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="website" class="col-sm-3">Postal Code/ZIP</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="postal_code" id="postal-code" type="text" value="<?php echo escape(Input::get('postal-code')); ?>" placeholder="Postal Code/ZIP">
                                      <small><span id="postal-code_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="website" class="col-sm-3">Website</label>
                                    <div class="col-sm-9">
                                      <input class="form-control" name="website" id="website" type="text" value="<?php echo escape(Input::get('website')); ?>" placeholder="Website address">
                                      <small><span id="website_error" style="color: red;"></span></small>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h4>IDENTIFICATION</h4>
                        <hr class="separator-line"> 
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Country of Residence <span>*</span></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select id="residenceCountry" name="residenceCountry" class="form-control">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" name="residence_city" id="residence-city" type="text" placeholder="City of residence">
                                                <small><span id="residence-city_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Citizenship <span>*</span></label>
                                    <div class="col-sm-9">
                                        <?php

                                            include 'citizenship.php';
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <label for="organisation-name" class="col-sm-3">Type of ID document <span>*</span></label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select class="form-control" name="id-type" id="document-type">
                                                    <option value="" selected="" disabled="" <?php if(escape(Input::get('document-type')) == ''){ echo 'selected="selected"';}?>> [--Select--] </option>
                                                    <option value="passport" <?php if(escape(Input::get('document-type')) == 'passport'){ echo 'selected="selected"';}?>>Passport</option>
                                                    <option value="idcard" <?php if(escape(Input::get('document-type')) == 'idcard'){ echo 'selected="selected"';}?>>ID card</option>
                                                </select>
                                                <small><span id="document-type_error" style="color: red;"></span></small>
                                            </div>
                                            <div class="col-sm-6">
                                                <input class="form-control" id="document-number" maxlength="20" name="id-number" value="<?php echo escape(Input::get('document-number')); ?>" placeholder="Document number" >
                                                <small><span id="document-number_error" style="color: red;"></span></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-sm-12">
                                <div>
                                    <label class="checkbox-mc">Click here to confirm that you have read & understood our <a href="<?php linkto('privacy'); ?>">terms & conditions & privacy policy.</a> 
                                        <input type="checkbox" name="privacy"  id="privacy" value="privacy-checked" > 
                                        <span class="geekmark" ></span> 
                                    </label> 
                                    <small><span id="privacy_error" style="color: red;"></span></small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- <h4>VALIDATION</h4> -->
                        <hr class="separator-line">
                        <div class="row" style="margin-bottom: 2%;">
                            <div class="col-md-4 col-sm-12 col-xm-12" style="margin-top: 3%; ">
                                
                                <img src="<?=linkto('admin/getcaptcha/'.rand())?>" id='captcha' class="img img-responsive">
                                <a href="javascript:void(0)" id="reloadCaptcha" title="Refresh" style="color: #f47821; font-size: 140%; margin-left: 10%;"><i class="fa fa-refresh"></i></a>
                            
                             </div>
                            
                             <div class="col-md-8 col-sm-12 col-xm-12">
                                <div class="span8 main-row">
                                    <div class="input">
                                        <label style="color: #ffffff; font-size: 16px; margin-top: 1%; margin-bottom: -1%;">    Type the characters you see</label><br>
                                        <input type="text" id="securityCode" placeholder="Type the captcha characters here" name="securityCode" class="form-control">
                                        <small><span id="security_error" style="color: red;"></span></small>
                                        <small><span id="securityCode_error" style="color: red;"></span></small>
                                    </div>
                                </div>  
                            </div>
                                

                        </div>

                        <div class="form-group mt-2" style="overflow: auto;">
                            <input type="hidden" name="action" value="vip-new">
                          <a href="#" onclick="addVIP()"><button type="button" class="btn btn-primary px-5 py-2 text-white pull-right" >Submit</button></a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
    
    <?php 

include 'forms/vip-account.php';
    
    include "includes/validate-delagate.php" ?>
    <script>
        
        
    </script>