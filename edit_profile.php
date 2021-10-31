<?php 
require_once 'admin/core/init.php';

/** Get Session User Data By Token */
if(!Session::exists('userToken'))
  Redirect::to('login'); 

$_session_user_token_ = Session::get('userToken');
$_session_user_ID_    = Hash::decryptAuthToken($_session_user_token_);

if(!is_integer($_session_user_ID_))
  Redirect::to('login');

/** Get the Participation Type ID  and Event Type */
if(!Input::checkInput('form', 'get', 1))
  Redirect::to('login');

$_PARTICIPANT_TOKEN_               = Input::get('form', 'get');

if(!is_integer(($_PARTICIPANT_ID_  = Hash::decryptAuthToken($_PARTICIPANT_TOKEN_))))
    Redirect::to('');

if($_session_user_ID_ != $_PARTICIPANT_ID_)
  Redirect::to('login');

if(!($_PARTICIPANT_DATA_ = FutureEventController::getParticipantByID($_PARTICIPANT_ID_)))
Redirect::to('login');

$_event_id          = $_PARTICIPANT_DATA_->event_id;
$_participant_id_   = $_PARTICIPANT_DATA_->id;

$_EVENT_TYPE_       = $_PARTICIPANT_DATA_->participation_subtype_category;

/** Get the Participation Type ID  and Event Type */
if($_EVENT_TYPE_  != 'INPERSON' AND $_EVENT_TYPE_  != 'VIRTUAL'  )
  Redirect::to('login');

$_EVENT_TYPE_NAME_ = ucfirst($_EVENT_TYPE_);
if($_EVENT_TYPE_  == 'INPERSON')
    $_EVENT_TYPE_NAME_ = 'In-person';
if($_EVENT_TYPE_  == 'VIRTUAL')
    $_EVENT_TYPE_NAME_ = 'Virtual';

$_EVENT_PARTICIPATION_SUB_TYPE_ID_           = $_PARTICIPANT_DATA_->participation_sub_type_id;
$_EVENT_PARTICIPATION_SUB_TYPE_ID_ENCRYPTED_ = Hash::encryptToken($_EVENT_PARTICIPATION_SUB_TYPE_ID_);

$_EVENT_PARTICIPATION_TYPE_DATA_    = FutureEventController::getPacipationSubCategoryByID($_EVENT_PARTICIPATION_SUB_TYPE_ID_);
$_EVENT_PARTICIPATION_TYPE_FORM_ID_ = $_EVENT_PARTICIPATION_TYPE_DATA_->form_order;

$_EVENT_PARTICIPATION_TYPE_NAME_ = $_EVENT_PARTICIPATION_TYPE_DATA_->name;
$_EVENT_SUB_TYPE_NAME_           = $_EVENT_PARTICIPATION_TYPE_DATA_->sub_type_name;

$_EVENT_SUB_TYPE_PRICE_          = $_PARTICIPANT_DATA_->participation_subtype_price;
$_EVENT_SUB_TYPE_CURRENCY_       = $_PARTICIPANT_DATA_->participation_subtype_currency;

$_HIDDEN_STATE['SECTION'] = array(
    'IDENTIFICATION' => '',
    'MEDIA_TOOLS'    => '',
);

$_DCOLOR_  = '#37af47';
$_EvCode_  = 'INP001';
$_EvPCode_ = 'AFBR001';
/** Condition When True - Hidden */
if($_EVENT_TYPE_ == 'VIRTUAL'):
    $_HIDDEN_STATE['SECTION']['IDENTIFICATION'] = 'hidden';
    $_HIDDEN_STATE['SECTION']['MEDIA_TOOLS']    = 'hidden';

    $_DCOLOR_ = '#a42f1d';
    $_EvCode_ = 'VRT002';
endif;
$_DCOLOR_ = '#dedede!important';


# CODES
$_CODE_AFRICA_BASED_     = 'C001';
$_CODE_NON_AFRICA_BASED_ = 'C002';

$_CODE_STUDENT_YOUTH_    = 'C003';
$_CODE_CREW_             = 'C006';
$_CODE_COMPLEMENTARY_    = 'C005';

$_CODE_CBO_   = 'C0015';
$_CODE_MEDIA_ = 'C004';

/** Arrya of Obejives */
$_OBJECTIVES_ARRAY_ = explode(', ', trim($_PARTICIPANT_DATA_->attending_objective_1));

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php linkto('css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('build/css/intlTelInput.css'); ?>">
    <link rel="stylesheet" class="host" link="<?=Config::get('server/name')?>"></link>
    
    <?php include'includes/head.php';?>
    <link href="<?php linkto('fileinput/css/fileinput.min.css'); ?>" rel="stylesheet">
</head>
<style>
    .file-default-preview img{
        width:40% !important;
    }
    .file-thumbnail-footer{
        display: none !important;
    }
    .hidden{
        display: none;
    }

    .slider_area .single_slider .slider_text_register h5, .slider_area .single_slider .slider_text_register_btn h5 {
    font-size: 18px;
    margin-bottom: 10px;
    color: <?=$_DCOLOR_?>;
    font-weight: 600;
}
</style>
<body>
<?php 

        include 'includes/nav-session.php';
    
        
        include 'forms/form_edit_profile.php';
    ?>

    <?php include 'forms/register-account.php';?>


    <?php //include'views/partners.php';?>
    
    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('fileinput/js/fileinput.min.js'); ?>"></script>
    <script>
        $("#image").fileinput({
        overwriteInitial: true,
	    maxFileSize: 2500,
	    showClose: false,
	    showCaption: false,
	    browseLabel: '',
	    removeLabel: '',
	    browseIcon: '<i class="fa fa-folder-open"></i> Upload from computer',
	    removeIcon: '<i class="fa fa-remove"></i> Delete image',
	    removeTitle: 'Cancel or reset changes',
	    elErrorContainer: '#kv-avatar-errors-1',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="<?=$_PARTICIPANT_DATA_->profile != null? VIEW_PROFILE.$_PARTICIPANT_DATA_->profile: DN."/img/photo_default.png"?>"  alt="Profile Picture" style="width:100%;">',
	    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
	});
    </script>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>

    <script src="<?php linkto('js/select2.min.js'); ?>"></script>
    <script src="<?php linkto('js/countries.js'); ?>"></script>
    <script src="<?php linkto('build/js/intlTelInput.js'); ?>"></script>

     <script>
        var phone_number = window.intlTelInput(document.querySelector("#telephone"), {
        autoPlaceholder: "off",
        separateDialCode: true,
        initialCountry: "rw",
        hiddenInput: "full", 
      utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
    </script>

    <script>
        var phone_number_2 = window.intlTelInput(document.querySelector("#telephone_2"), {
        autoPlaceholder: "off",
        separateDialCode: true,
        initialCountry: "rw",
        hiddenInput: "full", 
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
    </script>

    <script>
        var phone_number_emergency = window.intlTelInput(document.querySelector("#emergency_telephone"), {
        autoPlaceholder: "off",
        separateDialCode: true,
        initialCountry: "rw",
        hiddenInput: "full", 
      utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });
    </script>

   
<script>
  $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
  })
  </script>
  
<script>
  $(document).ready(function() {
      $('.js-example-basic').select2();
  })
  </script>
  
    
    
</body>
</html>
