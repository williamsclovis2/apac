<?php require_once 'admin/core/init.php';?>
<!DOCTYPE html>
<html>
<head>
    <?php include 'includes/head.php';?>
</head>
<body>
<?php 
include 'includes/nav-session.php';

$_NOTIFICATION_TITLE_   = $_Dictionary->translate('successful Registration');
$_NOTIFICATION_CONTENT_ = $_Dictionary->translate('content-notification-success');

/** Content  Notification - Bank Transfer Successfully Generated  - */
if(Input::checkInput('code', 'get', 1)):
    switch(Input::get('code', 'get')):
        case 'BANK_TRANSFER_SUCCESSFULLY_GENERATED':
            $_NOTIFICATION_TITLE_   = $_Dictionary->translate('bank-transfer'); 
            $_NOTIFICATION_CONTENT_ = $_Dictionary->translate('bank-transfer-details');
            break;

        case 'PAYMENT_CALLBACK_ERROR':
            $_NOTIFICATION_TITLE_   = $_Dictionary->translate('payment-interrupted');
            $_NOTIFICATION_CONTENT_ = $_Dictionary->translate('interrupted-details');
            break;

        case 'PAYMENT_CALLBACK_SUCCESS':
            $_NOTIFICATION_TITLE_   =$_Dictionary->translate('p-successfully-c');
            $_NOTIFICATION_CONTENT_ = $_Dictionary->translate('p-successfully-details');
            break;

        case 'PAYMENT_RECEIPT_NOT_FOUND_ERROR':
            $_NOTIFICATION_TITLE_   = $_Dictionary->translate('p-receipt-nf');
            $_NOTIFICATION_CONTENT_ =$_Dictionary->translate('p-receipt-nf-details');
            break;
        
        case 'INVITATION_LETTER_NOT_FOUND_ERROR':
            $_NOTIFICATION_TITLE_   = $_Dictionary->translate('invitation-l-nf');
            $_NOTIFICATION_CONTENT_ = $_Dictionary->translate('p-receipt-nf-details');
            break;
    endswitch;
endif;


?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1" style="height: 250px;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"> <?=$_NOTIFICATION_TITLE_?> </h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="form-contact contact_form text-center">
                        <p><?=$_NOTIFICATION_CONTENT_?></p>
                        <div class="socail_links">
                            <ul>
                                <li><a href="https://twitter.com/APA_Congress" target="_bank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/APACongress" target="_bank"><i class="ti-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/africaprotectedareascongress/" target="_bank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="note_section">
                        <h3>Note</h3>
                        <p><?=$_Dictionary->translate('jung_message')?></p>

                    </div>
                </div>
                <div class="col-lg-2"></div>
                </div>
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>
 
</body>
</html>
