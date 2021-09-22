<?php require_once 'admin/core/init.php';?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php linkto('css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php linkto('build/css/intlTelInput.css'); ?>">
    <?php include'includes/head.php';?>
</head>
<body>
    <?php include'includes/nav.php';?>
    <?php 
        switch (Input::get('form')) {
            case 'delegate':
                include 'forms/delegate.php';
                break;
            case 'media':
                include 'forms/media.php';
                break;
            case 'notification':
                Redirect::to('notification');
                break;
            default:
               include 'forms/delegate.php';
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
