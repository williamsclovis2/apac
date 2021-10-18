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
            case '1':
                $_EvPCode_ = 'AFBR001';
                include 'forms/form1.php';
                break;
            case '2':
                $_EvPCode_ = 'NAFBR002';
                include 'forms/form2.php';
                break;
            case '3':
                $_EvPCode_ = 'STYR003';
                include 'forms/form3.php';
                break;
            case '4':
                $_EvPCode_ = 'MDR004';
                include 'forms/form4.php';
                break;
            case '5':
                $_EvPCode_ = 'CPIR005';
                include 'forms/form5.php';
                break;
            case '6':
                $_EvPCode_ = 'CRCR005';
                include 'forms/form6.php';
                break;
            case '7':
                $_EvPCode_ = 'CBOR005';
                include 'forms/form7.php';
                break;
            case 'notification':
                Redirect::to('notification');
                break;
            default:
               include 'forms/form1.php';
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
	    browseLabel: '',
	    removeLabel: '',
	    browseIcon: '<i class="fa fa-folder-open"></i> Upload from computer',
	    removeIcon: '<i class="fa fa-remove"></i> Delete image',
	    removeTitle: 'Cancel or reset changes',
	    elErrorContainer: '#kv-avatar-errors-1',
	    msgErrorClass: 'alert alert-block alert-danger',
	    defaultPreviewContent: '<img src="<?=Config::get('server/name')?>img/photo_default.png" alt="Event banner" style="width:100%;">',
	    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
	});
    </script>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>

    <script src="<?php linkto('js/select2.min.js'); ?>"></script>
    <script src="<?php linkto('js/countries.js'); ?>"></script>
    <script src="<?php linkto('build/js/intlTelInput.js'); ?>"></script>
    <script>
        var input = document.querySelector("#telephone");
        window.intlTelInput(input, {
            autoPlaceholder: "off",
            initialCountry: "rw",
            separateDialCode: true,
            utilsScript: "../build/js/utils.js",
        });
    </script>
    <script>
        var input = document.querySelector("#telephone_2");
        window.intlTelInput(input, {
            autoPlaceholder: "off",
            initialCountry: "rw",
            separateDialCode: true,
            utilsScript: "../build/js/utils.js",
        });
    </script>
    <script>
        var input = document.querySelector("#delegate-phone");
        window.intlTelInput(input, {
            autoPlaceholder: "off",
            initialCountry: "rw",
            separateDialCode: true,
            utilsScript: "../build/js/utils.js",
        });
    </script>
    <script>
        var input = document.querySelector("#line_one");
        window.intlTelInput(input, {
            autoPlaceholder: "off",
            initialCountry: "rw",
            separateDialCode: true,
            utilsScript: "../build/js/utils.js",
        });
    </script>
    <script>
        var input = document.querySelector("#line_two");
        window.intlTelInput(input, {
            autoPlaceholder: "off",
            initialCountry: "rw",
            separateDialCode: true,
            utilsScript: "../build/js/utils.js",
        });
    </script>
    
    
</body>
</html>
