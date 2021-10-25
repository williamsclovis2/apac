<?php
require_once 'admin/core/init.php';
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include'includes/head.php';?>
</head>

<body>
    <?php include'includes/nav-session.php';?>

    <div class="service_area about_event exhibitors_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title privacy-content mb-30">
                        <h3>Privacy Policy</h3>
                        <p>Cube Communications is committed to protecting your personal information and your right to privacy. If you have any questions or concerns about our policy, or our practices with regards to your personal information, please contact us.</p>
                        <p>Please read our Privacy Policy carefully as it will help you make informed decisions about sharing your personal information with us.</p>

                        <h4>Information We Collect</h4>
                        <p>As a Visitor, you can browse our Website to find out more about our Website. You are not required to provide us with any personal information as a Visitor.</p>

                        <h4>Information You Provide to Us</h4>
                        <p>We collect your personal information when you when you express an interest in obtaining information about us or our products and services, when you participate in activities on our Website Site or otherwise contacting us.</p>
                        <p>Generally, you control the amount and type of information you provide to us when using our Website. The personal information that we collect depends on the context of your interaction with us and the Website, the choices you make and the products and features you use. The personal information we collect can include the following:</p>
                        <div class="push-20">
                            <p>• Name, Organisation details and Contact Data<br>
                            • Your interests in our services</p>
                        </div>

                        <h4>Automatically Collected Information</h4>
                        <p> When you use our Website, we automatically collect certain computer information by the interaction of your mobile phone or web browser with our Website. Such information is typically considered non-personal information. We also collect the following:</p>

                        <h4>Cookies</h4>
                        <p>Our Website uses "Cookies" to identify the areas of our Website that you have visited. A Cookie is a small piece of data stored on your computer or mobile device by your web browser. We use Cookies to personalize the Content that you see on our Website. Most web browsers can be set to disable the use of Cookies. However, if you disable Cookies, you may not be able to access functionality on our Website correctly or at all. We never place Personally Identifiable Information in Cookies.</p>

                        <h4>Log Information</h4>
                        <p>We automatically receive information from your web browser or mobile device. This information includes the name of the website from which you entered our Website, if any, as well as the name of the website to which you're headed when you leave our website. This information also includes the IP address of your computer/proxy server that you use to access the Internet, your Internet Website provider name, web browser type, type of mobile device, and computer operating system. We use all of this information to analyze trends among our Users to help improve our Website.</p>

                        <h4>Information Regarding Your Data Protection Rights Under General Data Protection Regulation (GDPR)</h4>
                        <p>For the purpose of this Privacy Policy, we are a Data Controller of your personal information.</p>
                        <p>If you are from the European Economic Area (EEA), our legal basis for collecting and using your personal information, as described in this Privacy Policy, depends on the information we collect and the specific context in which we collect it. We may process your personal information because:</p>
                        <div class="push-20">
                            <p>• We need to perform a contract with you, such as when you use our services<br>
                            • You have given us permission to do so<br>
                            • The processing is in our legitimate interests and it's not overridden by your rights<br>
                            • For payment processing purposes<br>
                            • To comply with the law</p>
                        </div>
                        <p>If you are a resident of the European Economic Area (EEA), you have certain data protection rights. In certain circumstances, you have the following data protection rights:</p>
                        <div class="push-20">
                            <p>• The right to access, update or to delete the personal information we have on you<br>
                            • The right of rectification<br>
                            • The right to object<br>
                            • The right of restriction<br>
                            • The right to data portability<br>
                            • The right to withdraw consent</p>
                        </div>
                        <p>Please note that we may ask you to verify your identity before responding to such requests.
                        You have the right to complain to a Data Protection Authority about our collection and use of your personal information. For more information, please contact your local data protection authority in the European Economic Area (EEA).</p>

                        <h4>Service Providers</h4>
                        <p>We employ third party companies and individuals to facilitate our Website ("Service Providers"), to provide our Website on our behalf, to perform Website-related services or to assist us in analyzing how our Website is used. These third-parties have access to your personal information only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

                        <h4>Analytics</h4>
                        <p>Google Analytics is a web analytics service offered by Google that tracks and reports website traffic. Google uses the data collected to track and monitor the use of our Service. This data is shared with other Google services. Google may use the collected data to contextualize and personalize the ads of its own advertising network.
                        You can opt-out of having made your activity on the Service available to Google Analytics by installing the Google Analytics opt-out browser add-on. The add-on prevents the Google Analytics JavaScript (ga.js, analytics.js, and dc.js) from sharing information with Google Analytics about visits activity.
                        For more information on the privacy practices of Google, please visit the Google Privacy & Terms web page: <a href="http://www.google.com/intl/en/policies/privacy/" target="_blank">http://www.google.com/intl/en/policies/privacy/</a></p>

                        <h4>Payments processors</h4>
                        <p>We may provide paid products and/or services on our Website. In that case, we use third-party services for payment processing (e.g. payment processors).
                        We will not store or collect your payment card details. That information is provided directly to our third-party payment processors whose use of your personal information is governed by their Privacy Policy. These payment processors adhere to the standards set by PCI-DSS as managed by the PCI Security Standards Council.</p>

                        <h4>Contacting Us</h4>
                        <p>If there are any questions regarding this privacy policy you may contact us at <a href="mailto:info@cube.rw">info@cube.rw</a></p>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if(!$user->isLoggedIn()) { ?>
    <div class="register_for_event">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="registration" class="btn btn-primary px-5 py-2 text-white">Register for the event</a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php include'includes/footer.php';?>
</body>

</html>