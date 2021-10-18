<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }
    if (!$user->hasPermission('admin')) {
        Redirect::to('admin/index');
    }

    $page = "accounts";
    $link = "admin";

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
                <h2>Accounts</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php linkto('admin/'); ?>">Home</a>
                    </li>
                    <li>
                        <a>Accounts</a>
                    </li>
                    <li class="active">
                        <strong>Administrators</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#addUserModal" id="addUser"><i class="fa fa-plus-circle"></i> Add admin</button>
                            <div class="modal inmodal fade" id="addUserModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <i class="fa fa-user modal-icon"></i>
                                            <h4 class="modal-title">Add new admin</h4>
                                        </div>
                                        <form class="form-horizontal" id="addUserForm">
                                            <div class="modal-body">
                                                <div id="add-user-messages"></div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Email</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="username" id="username" placeholder="Email" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">First Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="firstname" id="firstname" placeholder="First Name" placeholder="firstname" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Last Name</label>
                                                    <div class="col-lg-10">
                                                        <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Password</label>
                                                    <div class="col-lg-10">
                                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-2 control-label">Password Again</label>
                                                    <div class="col-lg-10">
                                                        <input type="password" name="password_again" id="password_again" placeholder="Confirm Password" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="hidden" name="request" value="addNewUser" /> 
                                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                                <button type="submit" id="addUserButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa-check-circle"></i> Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <h5>Users</h5>
                        </div>

                        <div class="ibox-content" id="user-table"></div>

                        <div class="modal inmodal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <i class="fa fa-user modal-icon"></i>
                                        <h4 class="modal-title">Edit user</h4>
                                    </div>
                                    <form class="form-horizontal" id="editUserForm">
                                        <div class="modal-body">
                                            <div id="edit-user-messages"></div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="eusername" id="eusername" placeholder="Email" class="form-control" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">First Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="efirstname" id="efirstname" placeholder="First Name" placeholder="firstname" class="form-control" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Last Name</label>
                                                <div class="col-lg-10">
                                                    <input type="text" name="elastname" id="elastname" placeholder="Last Name" class="form-control" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer editUserFooter">
                                            <input type="hidden" name="request" value="editUser" /> 
                                            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                            <button type="submit" id="editUserButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa-pencil"></i> Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

        <script src="admin.js"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>

        </div>
        </div>
</body>

</html>
