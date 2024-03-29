<?php 
require_once 'admin/core/init.php';

/** Get the Participation Type ID  and Event Type */
if(!Input::checkInput('form', 'get', 1))
  Redirect::to('');

$_INVITATION_ACCESS_TOKEN_           = Input::get('form', 'get');

if(!is_integer(($_PRIVATE_LINK_ID_   = Hash::decryptAuthToken($_INVITATION_ACCESS_TOKEN_))))
    Redirect::to('');

if(!($_PRIVATE_LINK_DATA_ = FutureEventController::getEventPrivateInvitationLinkDataByID($_PRIVATE_LINK_ID_)))
    Redirect::to('');

$_EVENT_TYPE_             = $_PRIVATE_LINK_DATA_->event_type_name;

/** Get the Participation Type ID  and Event Type */
if($_EVENT_TYPE_  != 'INPERSON' AND $_EVENT_TYPE_  != 'VIRTUAL'  )
  Redirect::to('');

$_EVENT_TYPE_NAME_ = ucfirst($_EVENT_TYPE_);
if($_EVENT_TYPE_  == 'INPERSON')
    $_EVENT_TYPE_NAME_ = 'In-person';
if($_EVENT_TYPE_  == 'VIRTUAL')
    $_EVENT_TYPE_NAME_ = 'Virtual';

$_EVENT_PARTICIPATION_SUB_TYPE_ID_           = $_PRIVATE_LINK_DATA_->participation_sub_type_ID;
$_EVENT_PARTICIPATION_SUB_TYPE_ID_ENCRYPTED_ = Hash::encryptToken($_EVENT_PARTICIPATION_SUB_TYPE_ID_);

$_EVENT_PARTICIPATION_TYPE_DATA_    = FutureEventController::getPacipationSubCategoryByID($_EVENT_PARTICIPATION_SUB_TYPE_ID_);
$_EVENT_PARTICIPATION_TYPE_FORM_ID_ = $_EVENT_PARTICIPATION_TYPE_DATA_->form_order;

$_EVENT_PARTICIPATION_TYPE_NAME_ = $_EVENT_PARTICIPATION_TYPE_DATA_->name;
$_EVENT_SUB_TYPE_NAME_           = $_EVENT_PARTICIPATION_TYPE_DATA_->sub_type_name;

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
    
        switch ($_EVENT_PARTICIPATION_TYPE_FORM_ID_ ) {
            
            case '5':
                $_EvPCode_ = 'CPIR005';
                include 'forms/form5.php';
                break;
            case '6':
                $_EvPCode_ = 'CRCR005';
                include 'forms/form6.php';
                break;
            case 'notification':
                Redirect::to('notification');
                break;
            default:
               include 'forms/form5.php';
                break;
        }
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
 <?php include 'forms/register-account.php';?>


    <?php //include'views/partners.php';?>
    
    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('fileinput/js/fileinput.min.js'); ?>"></script>
    <script>
        $("#image").fileinput({
        overwriteInitial: true,
	    maxFileSize: 500,
	    showClose: false,
	    showCaption: false,
	    browseLabel: '',
	    removeLabel: '',
	    browseIcon: '<i class="fa fa-folder-open"></i> Upload from computer',
	    removeIcon: '<i class="fa fa-remove"></i> Delete image',
	    removeTitle: 'Cancel or reset changes',
	    elErrorContainer: '#kv-avatar-errors-1',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="<?=DN?>/img/photo_default.png" alt="Event banner" style="width:100%;">',
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
  
  <!-- loader  -->
   <script >
	 	$(".loader-btn").on("click" , function(){
	 		$("#load").removeAttr("hidden");
	 	});
    	

		/* ######### Loader ########## */
        window.setTimeout(function(){
            $("#load").attr("hidden", "");
        }, 1000);
	 </script>
</body>
</html>
