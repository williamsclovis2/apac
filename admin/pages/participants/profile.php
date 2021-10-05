<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = "profile";
    $link = "profile";
    $eventId = base64_decode(Input::get('eventId'));

?>

<!DOCTYPE html>
<html>

<head>
    <?php include $INC_DIR . "head.php"; ?>
    <script src="<?php linkto('admin/js/jquery-2.1.1.js'); ?>"></script>
</head>

<body>
    <div id="wrapper">

        <?php include $INC_DIR . "nav.php"; ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Participant Profile</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php linkto('admin/'); ?>">Home</a>
                    </li>
                    <li>
                        <a>Participants</a>
                    </li>
                    <li class="active">
                        <strong>Profile</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <!-- <div class="col-lg-2"></div> -->
                <div class="col-lg-12">
                    <div class="ibox float-e-margins" id="card-profile">
                        <div class="ibox-title" style="height: auto;">
                          
                        </div>
                        <div class="ibox-content">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex flex-column align-items-center text-center">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                                <div class="mt-3">
                                                    <h4>Clovis mul</h4>
                                                    <p class="text-secondary mb-1" style="color:#5cb85c;">Activated <i class="fa fa-check-circle"></i></p>
                                                    <button class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Activate</button>
                                                    <button class="btn btn-xs btn-outline-danger"><i class="fa fa-times-circle"></i> Desactivate</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="card-sect-title">Payment </h3>
                                    <div class="card mt-3">
                                        <div class="card-body side-card">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0">Payment method</h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <h6>Visa Card</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="card-sect-title">CONTACT INFORMATION </h3>
                                    <div class="card mb-3" >
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Kamable Mulwahali clovis</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6><a href="mailto:email">clovismul@gmail.com</a></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Telephone number 1</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6><a href="tel:phone">+250 784 017 93</a></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Telephone number 2</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6><a href="tel:phone">+250 784 017 93</a></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Job title</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>CTO</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Job category</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>ICT specialist</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Language</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>French</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Gender</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>M</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Date of birth</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>1/1/1999</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="card-sect-title">ORGANIZATION</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Organization name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Cube communication Ltd</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Organization type</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Cube communication Ltd</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Industry</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Media</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Organization Website</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                <h6><a href="wwww.website.com">www.cube.rw</a></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">City / Country</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Kigali Rwanda</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="card-sect-title">WHAT ARE YOUR OBJECTIVES FOR ATTENDING THIS CONGRESS?</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">first objective</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6 style="text-align:left;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Second objective </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6 style="text-align:left;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Third objective </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6 style="text-align:left;">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0">Where did you hear about us ? </h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    <h6>TV</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="card-sect-title">IDENTIFICATION</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Type of ID document </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>Passport</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Document number </h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>C7845214</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Country of residence</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <h6>DRC</h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Document</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary" style="padding:10px 0;">
                                                    <img src="<?php linkto("img/photo_default.png");?>" width="250px" text-right>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-2"></div> -->
            </div>
        </div>

        <script type="text/javascript">
            var eventId = '<?php echo $eventId; ?>';
            var linkto  = '<?php linkto("admin/pages/participants/participants_action.php"); ?>';
        </script>
        
        <?php include $INC_DIR . "footer.php"; ?>

        </div>
        </div>
</body>

</html>