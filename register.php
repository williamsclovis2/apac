<?php 
require_once 'admin/core/init.php';

/** Get the Participation Type ID  and Event Type */
if(!Input::checkInput('form', 'get', 1) OR !Input::checkInput('event_type', 'get', 1))
  Redirect::to('');

$_EVENT_TYPE_     = strtoupper( Input::get('event_type', 'get') );

/** Get the Participation Type ID  and Event Type */
if($_EVENT_TYPE_  != 'INPERSON' AND $_EVENT_TYPE_  != 'VIRTUAL'  )
  Redirect::to('');

$_EVENT_TYPE_NAME_ = ucfirst($_EVENT_TYPE_);
if($_EVENT_TYPE_ == 'INPERSON')
    $_EVENT_TYPE_NAME_ = 'In-person';

$_EVENT_PARTICIPATION_TYPE_ID_ = Input::get('form', 'get');
$_EVENT_PARTICIPATION_TYPE_ID_ = Hash::decryptToken($_EVENT_PARTICIPATION_TYPE_ID_);

$_EVENT_PARTICIPATION_TYPE_DATA_ = FutureEventController::getPacipationCategoryByID($_EVENT_PARTICIPATION_TYPE_ID_);
$_EVENT_PARTICIPATION_TYPE_FORM_ID_ = $_EVENT_PARTICIPATION_TYPE_DATA_->form_order;

$_EVENT_PARTICIPATION_TYPE_NAME_ =  $_EVENT_PARTICIPATION_TYPE_DATA_->name;
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php linkto('css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('build/css/intlTelInput.css'); ?>">
    <?php include'includes/head.php';?>
</head>
<body>
    <?php include'includes/nav.php'; ?>
    <?php 
        switch ($_EVENT_PARTICIPATION_TYPE_FORM_ID_ ) {
            case '1':
                include 'forms/form1.php';
                break;
            case '2':
                include 'forms/form2.php';
                break;
            case '3':
                include 'forms/form3.php';
                break;
            case '4':
                include 'forms/form4.php';
                break;
            case '5':
                include 'forms/form5.php';
                break;
            case '6':
                include 'forms/form6.php';
                break;
            case 'notification':
                Redirect::to('notification');
                break;
            default:
               include 'forms/form1.php';
                break;
        }
    ?>

    <?php include'forms/register-account.php';?>

    <?php //include'views/partners.php';?>

    <?php include'includes/footer.php';?>

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
