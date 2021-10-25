
<div class="slider_area">
    <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <div class="slider_text slider_text_register">
                        <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?=$_Dictionary->content($_EVENT_PARTICIPATION_TYPE_NAME_)?> <?=$_Dictionary->words('registration-form')?> </h3>
                        <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        <h5 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?= $_Dictionary->translate(ucfirst($_EVENT_SUB_TYPE_NAME_)) ?>  <?= $_Dictionary->translate(ucfirst($_EVENT_SUB_TYPE_NAME_)) == ''?'':'|' ?> <?= $_Dictionary->translate(ucfirst($_EVENT_TYPE_NAME_)) ?> </h5>
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
                    <label><?=$_Dictionary->words('all-fields-are-mendatory')?> </label>
                    <h4><?=$_Dictionary->translate('CONTACT INFORMATION')?></h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3"><?=$_Dictionary->translate('First name')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="firstname" oninput="validate(this)" id="firstname" type="text" placeholder="<?=$_Dictionary->translate('First name')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your first name')?>"/>
                                    <div class="validate" id="firstname_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3"><?=$_Dictionary->translate('last name')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="lastname" oninput="validate(this)"  id="lastname" type="text" placeholder="<?=$_Dictionary->translate('Last name')?>" data-rule="required"  data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your last name')?>"/>
                                    <div class="validate" id="lastname_error"></div> 
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="email" class="col-sm-3"><?=$_Dictionary->translate('Email')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="email" oninput="validate(this)"  id="email" type="text" placeholder="<?=$_Dictionary->translate('Email')?>" data-rule="email"  data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your email')?>" onselectstart="return false" onpaste="return false;" onCopy="return false"  onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                    <div class="validate" id="email_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="email" class="col-sm-3"><?=$_Dictionary->translate('Confirm email')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="confirm_email" oninput="validate(this)"  id="confirm_email" type="text" placeholder="<?=$_Dictionary->translate('Confirm email')?>" data-rule="email"  data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your confirm email')?>" onselectstart="return false" onpaste="return false;" onCopy="return false"  onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off/>
                                    <div class="validate" id="confirm_email_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="telephone" class="col-sm-3"><?=$_Dictionary->translate('Telephone number 1')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input type="text" name="telephone" id="telephone" oninput="validate(this)"  class="form-control" data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your telephone')?>"/>
                                    <div class="validate" id="telephone_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="telephone" class="col-sm-3"><?=$_Dictionary->translate('Telephone number 2')?></label>
                                <div class="col-sm-9 field-validate">
                                    <input type="text" name="telephone_2" oninput="validate(this)"  data-msg="<?=$_Dictionary->words('Please enter your telephone 2')?>"  id="telephone_2" class="form-control"/>
                                    <div class="validate" id="telephone_2_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Job title')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="job_title" oninput="validate(this)"  id="job_title" type="text" placeholder="<?=$_Dictionary->translate('Job title')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your job title')?>"/>
                                    <div class="validate" id="job_title_error"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="job_category" class="col-sm-3"><?=$_Dictionary->translate('Job category')?> <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" name="job_category" id="job_category" onchange="Other(this,'#job_category1');" data-rule="required" data-msg="<?=$_Dictionary->words('Please select job category')?>" >
                                                <?php $user->jobTitle($form->ERRORS,Input::get('job_category'),$categ);?>
                                            </select>
                                            <div class="validate" id="job_category_error"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" oninput="validate(this)"  name="job_category1" id="job_category1" type="text" placeholder="<?=$_Dictionary->translate('For other - please specify')?>"  data-msg="<?=$_Dictionary->words('Please enter job category')?>" 
                                            <?php if(escape(Input::get('job_category')) != 'Other'){?> disabled="disabled" <?php }?>>
                                            <div class="validate" id="job_category1_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="gender" class="col-sm-3"><?=$_Dictionary->translate('language')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="language" name="language" onchange="validate(this)" class="form-control" data-rule="required" data-msg="<?=$_Dictionary->words('Please select  Language')?>">
                                        <option value="">[--<?=$_Dictionary->translate('Select')?>--]</option>
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
                                <label for="gender" class="col-sm-3"><?=$_Dictionary->translate('Gender')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select id="gender" name="gender" onchange="validate(this)"  class="form-control" data-rule="required" data-msg="<?=$_Dictionary->words('Please select your gender')?>">
                                        <option value="">[--<?=$_Dictionary->translate('Select')?>--]</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Prefer not to disclose</option>
                                    </select>
                                    <div class="validate" id="gender_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12"  id="data_1">
                            <div class="row">
                                <label for="birthday" class="col-sm-3"><?=$_Dictionary->translate('Date of birth')?></label>
                                <div class="col-sm-9 field-validate">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" oninput="validate(this)" value="dd/mm/yyyy" name="birthday" id="birthday" class="form-control" data-rule="" data-msg="<?=$_Dictionary->words('Please enter date of birth')?>"/>
                                        <div class="validate" id="birthday_error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4><?=$_Dictionary->translate('ORGANIZATION')?> </h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Organization name')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" oninput="validate(this)"  name="organisation_name" id="organisation_name" type="text" placeholder="<?=$_Dictionary->translate('Organization name')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please enter your organisation name')?>"/>
                                    <div class="validate" id="organisation_name_error"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Media category')?> <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" onchange="Other(this,'#organisation_type1');" id="organisation_type" name="organisation_type" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter media category')?>" >
                                                <option value="">[--<?=$_Dictionary->translate('Select')?>--]</option>
                                                <option value="Bloggers">Bloggers</option>
                                                <option value="Freelancer">Freelancer</option>
                                                <option value="Private">Private</option>
                                                <option value="State-owned Media">State-owned Media</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div class="validate" id="organisation_type_error"></div>
                                        </div>
                                        <div class="col-sm-6"> 
                                            <input class="form-control" oninput="validate(this)"  name="organisation_type1" id="organisation_type1" type="text" placeholder="<?=$_Dictionary->translate('For other - please specify')?>"   data-msg="<?=$_Dictionary->translate('For other - please specify')?>" 
                                            <?php if(escape(Input::get('organisation_type')) != 'Other'){?> disabled="disabled" <?php }?>>
                                            <div class="validate" id="organisation_type1_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Press card number')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control"  oninput="validate(this)" id="media_card_number" name="media_card_number" placeholder="<?=$_Dictionary->translate('Press card number')?>" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter press card number')?>"/>
                                    <div class="validate" id="media_card_number_error"></div> 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Issuing authority')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" oninput="validate(this)"  id="media_card_authority" name="media_card_authority" placeholder="<?=$_Dictionary->translate('Issuing Authority')?>" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter issuing authority')?>"/>
                                    <div class="validate" id="media_card_authority_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                            <label for="" class="col-sm-3"><?=$_Dictionary->translate('Company Location')?></label>
                                <div class="col-sm-9 field-validate">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select id="organisation_country" onchange="validate(this)"  name="organisation_country" class="form-control" data-rule="required" data-msg="<?=$_Dictionary->translate('Please select country')?>" >
                                                <option></option>
                                            </select>
                                            <div class="validate" id="organisation_country_error"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" oninput="validate(this)"  name="organisation_city" id="organisation_city" type="text" placeholder="<?=$_Dictionary->translate('City')?>" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter city')?>"/>
                                            <div class="validate" id="organisation_city_error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
if($_HIDDEN_STATE['SECTION']['MEDIA_TOOLS'] != 'hidden'):
?>
                <span class="<?=$_HIDDEN_STATE['SECTION']['MEDIA_TOOLS']?>">
                    <h4><?=$_Dictionary->translate('TOOLS')?></h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="media-equipment" class="col-sm-3"><?=$_Dictionary->translate('List of equipment to be brought')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea class="form-control w-100" oninput="validate(this)"  name="media_equipment" id="media_equipment" cols="30" rows="9" placeholder="<?=$_Dictionary->translate('Eg: Camera, Microphone')?> ..." data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter equipment')?>"></textarea>
                                    <div class="validate" id="media_equipment_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="special-request" class="col-sm-3">Special request (Up to 1000 characters)</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control w-100" oninput="validate(this)"  name="special_request" id="special_request" cols="30" rows="9" placeholder="<?=$_Dictionary->translate('eg. Sessions cover,')?>..."></textarea>
                                    <div class="validate" id="special_request_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </span>
<?php
endif;
?>
              
              <h4><?=$_Dictionary->translate('WHAT ARE YOUR OBJECTIVES FOR ATTENDING THIS CONGRESS?')?></h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Type objectives')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="objectives" id="objectives" class="form-control" oninput="validate(this)"  placeholder="<?=$_Dictionary->translate('enter your objective')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please only 500 characters')?>" style="height: 70px;"></textarea>
                                    <div class="validate" id="objectives_error"></div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Second objective')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="second_objective" id="second_objective" oninput="validate(this)"  class="form-control" placeholder="<?=$_Dictionary->translate('enter your objective')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please only 500 characters')?>" style="height: 70px;"></textarea>
                                    <div class="validate" id="second_objective_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Third objective')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <textarea name="third_objective" id="third_objective" oninput="validate(this)"  class="form-control" placeholder="<?=$_Dictionary->translate('enter your objective')?>" data-rule="maxlen:1020" data-msg="<?=$_Dictionary->words('Please only 500 characters')?>" style="height: 70px;"></textarea>
                                    <div class="validate" id="third_objective_error"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <h4><?=$_Dictionary->translate('WHERE DID YOU HEAR ABOUT APAC?')?> </h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Select source')?><span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <select class="form-control" name="info_source"  onchange="validate(this)" id="info_source" data-rule="required" data-msg="<?=$_Dictionary->words('Please select')?>" > 
                                        <option value="">[--<?=$_Dictionary->translate('Select')?>--]</option> 
                                        <option value="Radio"> Radio</option>
                                        <option value="TV"> TV</option>
                                        <option value="Online / Social media">Online / Social media </option>
                                        <option value="Word of mouth"> Word of mouth </option>
                                        <option value="Email"> Email </option>
                                        <option value="Embassy / Consulate"> Embassy / Consulate </option>
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
                    <h4><?=$_Dictionary->translate('BADGE COLLECTION IDENTIFICATION')?></h4>
                    <hr class="separator-line"> 
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="organisation-name" class="col-sm-3"><?=$_Dictionary->translate('Type of ID document')?> <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 field-validate">
                                            <select class="form-control" onchange="validate(this)"  name="id_type" id="id_type" data-rule="required" data-msg="<?=$_Dictionary->words('Please select document type')?>" > 
                                                <option value="">[--<?=$_Dictionary->translate('Select')?>--]</option> 
                                                <option value="Passport">Passport</option>
                                                <option value="ID">ID card</option>
                                            </select>
                                            <div class="validate" id="id_type_error"></div>
                                        </div>
                                        <div class="col-sm-6 field-validate">
                                            <input class="form-control" id="id_number" oninput="validate(this)"  name="id_number"  placeholder="<?=$_Dictionary->translate('Document number')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Please enter document number')?>"/>
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
                     <h4><?=$_Dictionary->translate('ACCOMMODATION')?></h4>
                    <hr class="separator-line">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-12" ><?=$_Dictionary->translate('Would you like to receive information on accommodation booking in Kigali?')?> <span>*</span></label>
                                <div class="col-sm-9">
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="needAccommodation" checked id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1"><?=$_Dictionary->translate('Yes')?></label>
                                    </div>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="needAccommodation" id="inlineRadio2" value="0">
                                        <label class="form-check-label" for="inlineRadio2"><?=$_Dictionary->translate('No')?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h4><?=$_Dictionary->translate('CREATE PASSWORD')?></h4>
                    <hr class="separator-line">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="firstname" class="col-sm-3"><?=$_Dictionary->translate('Password')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                    <input class="form-control" name="password" id="password" oninput="validate(this)"  type="password" placeholder="<?=$_Dictionary->words('Enter password')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Minimum 6 characters')?>"/>
                                    <div class="validate" id="password_error"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <div class="row">
                                <label for="lastname" class="col-sm-3"><?=$_Dictionary->translate('Confirm Password')?> <span>*</span></label>
                                <div class="col-sm-9 field-validate">
                                  <input class="form-control" name="confirm_password" oninput="validate(this)"  id="confirm_password" type="password" placeholder="<?=$_Dictionary->translate('Confirm password')?>" data-rule="required" data-msg="<?=$_Dictionary->words('Password does not match')?>"/>
                                    <div class="validate" id="confirm_password_error"></div>
                                    <p class="pw"><?=$_Dictionary->translate('Password message')?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="row" style="margin-bottom: 2%;">
                        <div class="form-group col-sm-12">
                            <div>
                                <label class="checkbox-mc"> <?=$_Dictionary->string('form-by-clicking-you-agree-terms-conditions')?>  
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
                                    <label style="color: #ffffff; font-size: 16px; margin-top: 1%; margin-bottom: -1%;"><?=$_Dictionary->translate('Type the characters you see')?></label><br>
                                    <input type="text" id="securityCode" placeholder="<?=$_Dictionary->translate('Type the captcha characters here')?>" name="securityCode" class="form-control">
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
                        <button type="button" id="registerButton" class="btn btn-primary px-5 py-2 text-white pull-right registerFormSubmit" data-loading-text="Loading..."><?=$_Dictionary->translate('Submit')?></button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>
</div>
</div>