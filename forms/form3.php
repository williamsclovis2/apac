
<div class="slider_area">
    <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="slider_text slider_text_register">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?=$_EVENT_PARTICIPATION_TYPE_NAME_ ?> Registration Form </h3>
                        <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        <h5 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?= ucfirst($_EVENT_TYPE_NAME_) ?> Event </h5>
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
                <form action="<?php linkto("forms/register_action.php"); ?>" class="form-contact" id="registerForm" method="post">
                    <div id="register-messages"></div>
                    <label>All <span>*</span> fields are mandatory </label>
                    <h4>CONTACT INFORMATION</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3">First name <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="firstname" id="firstname" type="text" placeholder="First name" data-rule="required" data-msg="Please enter first name"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3">Last name <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="lastname" id="lastname" type="text" placeholder="Last name" data-rule="required" data-msg="Please enter last name"/>
                                    <div class="validate"></div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="email" class="col-sm-3">Email <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="email" id="email" type="text" placeholder="Email" data-rule="email" data-msg="Please enter a valid email"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="telephone" class="col-sm-3">Telephone <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input type="text" name="telephone" id="telephone" class="form-control" data-rule="required" data-msg="Please enter telephone"/>
                                    <div class="validate" id="telephone_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="gender" class="col-sm-3">Gender <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="gender" name="gender" class="form-control" data-rule="required" data-msg="Please select gender">
                                        <option value="">[--Select--]</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">I'd rather not say</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="birthday" class="col-sm-3">Date of birth</label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="birthday" id="birthday" type="date" data-rule="required" data-msg="Please enter date of birth"/>
                                    <div class="validate"></div> 
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
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="organisation_name" id="organisation_name" type="text" placeholder="Organization name" data-rule="required" data-msg="Please enter organisation name"/>
                                    <div class="validate"></div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Organization type <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" onchange="Other(this,'#organisation_type1');" id="organisation_type" name="organisation_type" data-rule="required" data-msg="Please enter organisation type"/>
                                                <option value="" selected="">[--Select--]</option>
                                                <option value="Academia">Academia</option>
                                                <option value="Civil Society">Civil Society </option>
                                                <option value="International Organization">International Organization</option>
                                                <option value="Non-Governmental Organization">Non-Governmental Organization</option>
                                                <option value="Non-Profit Organization">Non-Profit Organization</option>
                                                <option value="Private/Corporation">Private/Corporation</option>
                                                <option value="Regional Organization">Regional Organization </option>
                                                <option value="Other">Other </option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="organisation_type1" id="organisation_type1" type="text" placeholder="For other - please specify" 
                                            <?php if(escape(Input::get('organisation_type')) != 'Other'){?> disabled="disabled" <?php }?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="industry" class="col-sm-3">Industry <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" name="industry" id="industry" onchange="Other(this,'#industry1');" data-rule="required" data-msg="Please enter industry"/>
                                                <option value="" selected="">[--Select--]</option>     
                                                <option value="Academics/ Education">Academics/ Education</option>
                                                <option value="Advertising/Public Relations">Advertising/Public Relations</option>
                                                <option value="Agricultural Services &amp; Products">Agricultural Services &amp; Products</option>
                                                <option value="Attorneys and law">Attorneys and law</option>
                                                <option value="Clergy &amp; Religious Organizations" >Clergy &amp; Religious Organizations </option>
                                                <option value="Clothing and Textiles">Clothing and Textiles</option>
                                                <option value="Defence and security">Defence and security</option>
                                                <option value="Energy and Natural Resources and Environment">Energy and Natural Resources and Environment</option>
                                                <option value="Entertainment Industry">Entertainment Industry</option>
                                                <option value="Financial and Commercial Services">Financial and Commercial Services</option>
                                                <option value="Hospitality and Tourism">Hospitality and Tourism</option>
                                                <option value="Healthcare services">Healthcare services</option>
                                                <option value="ICT">ICT</option>
                                                <option value="Infrastructure">Infrastructure</option>
                                                <option value="Logistics and Transportation">Logistics and Transportation</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="Mining">Mining</option>
                                                <option value="Media">Media </option>
                                                <option value="Non-profits, Foundations &amp; Philanthropists">Non-profits, Foundations &amp; Philanthropists</option>
                                                <option value="Printing &amp; Publishing">Printing &amp; Publishing</option>
                                                <option value="Private Equity &amp; Investment Firms">Private Equity &amp; Investment Firms</option>
                                                <option value="Real Estate">Real Estate</option>
                                                <option value="Religious Organizations/Clergy">Religious Organizations/Clergy</option>
                                                <option value="Sports, Professional">Sports, Professional</option>
                                                <option value="Telecommunications">Telecommunications </option>
                                                <option value="Other">Other </option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="industry1" id="industry1" type="text" placeholder="For other - please specify" 
                                            <?php if(escape(Input::get('industry')) != 'Other'){?> disabled="disabled" <?php }?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Job title <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="job_title" id="job_title" type="text" placeholder="Job title" data-rule="required" data-msg="Please enter job title"/>
                                    <div class="validate"></div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="job_category" class="col-sm-3">Job category <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" name="job_category" onchange="Other(this,'#job_category1');" data-rule="required" data-msg="Please select job category"/>
                                                <?php $user->jobTitle($form->ERRORS,Input::get('job-category'),$categ);?>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="job_category1" id="job_category1" type="text" placeholder="For other - please specify" 
                                            <?php if(escape(Input::get('job_category')) != 'Other'){?> disabled="disabled" <?php }?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation_address" class="col-sm-3">Physical address <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="organisation_address" id="organisation_address" type="text" placeholder="Organization physical address" placeholder="Job title" data-rule="required" data-msg="Please enter physical address"/>
                                    <div class="validate"></div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" name="line_one" id="line_one" type="text" placeholder="Line one" data-rule="required" />
                                        </div>
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" name="line_two" id="line_two" type="text" placeholder="Line two"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="" class="col-sm-3"></label>
                                <div class="col-sm-9 field-validate">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select id="organisation_country" name="organisation_country" class="form-control" data-rule="required" data-msg="Please select country"/>
                                                <option></option>
                                            </select>
                                            <div class="validate" id="organisation_country_error"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="organisation_city" id="organisation_city" type="text" placeholder="City" data-rule="required" data-msg="Please enter city"/>
                                            <div class="validate"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="website" class="col-sm-3">Postal Code/ZIP</label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="postal_code" id="postal_code" type="text" placeholder="Postal Code/ZIP">
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="website" class="col-sm-3">Website</label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4>IDENTIFICATION</h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Country of residence <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select id="residence_country" name="residence_country" class="form-control" data-rule="required" data-msg="Please select country"/>
                                                <option></option>
                                            </select>
                                            <div class="validate" id="residence_country_error"></div>
                                        </div>
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" name="residence_city" id="residence_city" type="text" placeholder="City of residence" data-rule="required" data-msg="Please enter city"/>
                                            <div class="validate"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Citizenship <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="citizenship" name="citizenship" class="form-control" data-rule="required" data-msg="Please select country"/>
                                        <option></option>
                                    </select>
                                    <div class="validate" id="citizenship_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3">Type of ID document <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" name="id_type" id="id_type" data-rule="required" data-msg="Please select document type"/> 
                                                <option value="" selected="">[--Select--]</option>
                                                <option value="Passport">Passport</option>
                                                <option value="ID">ID card</option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" id="id_number" name="id_number"  placeholder="Document number" data-rule="required" data-msg="Please enter document number"/>
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div>
                                <label class="checkbox-mc">Click here to confirm that you have read & understood our <a href="<?php linkto('privacy'); ?>">terms & conditions & privacy policy.</a> 
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
                        <input type="hidden" name="request" value="register">
                        <input type="hidden" name="eventId" value="<?=$activeEventId?>">
                        <input type="hidden" name="del_type" value="Delegate">
                        <button type="submit" id="registerButton" class="btn btn-primary px-5 py-2 text-white pull-right">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>