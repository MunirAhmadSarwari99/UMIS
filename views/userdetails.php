<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/userDetailsController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">User Details</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal"
                                data-target="#edit-user"><i class="md md-edit"></i></button>
                        <a href="users.php" class="btn btn-floating-action btn-primary" ><i
                                    class="md md-reply-all"></i></a>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <section>
                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-printable style-default-light">
                                    <div class="card-body style-default-bright">
                                        <!-- BEGIN INVOICE HEADER -->
                                        <div class="row">
                                            <div class="col-xs-8">
                                                <img class="width-6 height-4 img-thumbnail"
                                                     src="<?php if ($result['photo'] == 'default.png') {
                                                         echo "../public/images/" . $result['photo'];
                                                     } else {
                                                         echo "../public/Storage/Users/" . $result['photo'];
                                                     } ?>"><br>
                                            </div>
                                        </div><!--end .row -->
                                        <!-- END INVOICE HEADER -->

                                        <br>

                                        <!-- BEGIN INVOICE DESCRIPTION -->
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <address>
                                                    <strong>Full Name</strong><br>
                                                    <?php echo $result['firstName'] . " " . $result['lastName']; ?><br>
                                                    <strong>Email</strong><br>
                                                    <?php echo $result['email']; ?><br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-4 pull-right">
                                                <div class="well">
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Level :</div>
                                                        <div class="pull-right">
                                                            <?php
                                                            if ($result['level'] == 0) {
                                                                echo 'Admin';
                                                            } elseif ($result['level'] == 1) {
                                                                echo 'Staff';
                                                            } elseif ($result['level'] == 2) {
                                                                echo 'Teacher';
                                                            } elseif ($result['level'] == 3) {
                                                                echo 'Student';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Status :</div>
                                                        <div class="pull-right">
                                                            <?php if ($result['statue'] == 1) {
                                                                echo 'Active';
                                                            } else {
                                                                echo 'Deactivated';
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <?php if ($result['level'] == 0 || $result['level'] == 1){ ?>
                                        <div class="row">
                                            <h4>Page Access Permission</h4>
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Admin</strong><br>
                                                    <?php
                                                    if ($result['admin'] == 8) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Finance</strong><br>
                                                    <?php
                                                    if ($result['finance'] == 3) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>HR</strong><br>
                                                    <?php
                                                    if ($result['hr'] == 4) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>logistic</strong><br>
                                                    <?php
                                                    if ($result['logistic'] == 1) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <?php } ?>
                                        <div class="row">
                                            <h4>Page Management Permission</h4>
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Visit</strong><br>
                                                    <?php
                                                    if ($result['reed1'] == 1) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Create</strong><br>
                                                    <?php
                                                    if ($result['create1'] == 3) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Edit</strong><br>
                                                    <?php
                                                    if ($result['edit1'] == 4) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Delete</strong><br>
                                                    <?php
                                                    if ($result['delete1'] == 8) {
                                                        echo '<small class="md md-verified-user"></small>';
                                                    } else {
                                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                                    }
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <!-- END INVOICE DESCRIPTION -->
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                        </div><!--end .row -->
                    </div><!--end .section-body -->
                </section>
            </div><!--end .row -->
        </div>
    </div>
</div>

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="edit-user" tabindex="-1" role="dialog" aria-labelledby="edit-profile" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit User and Permissions</h4>
            </div>
            <div class="modal-body">
                <img id="imgPhoto" class="width-3 img-circle" src="<?php if ($result['photo'] == 'default.png') {
                    echo "../public/images/" . $result['photo'];
                } else {
                    echo "../public/Storage/Users/" . $result['photo'];
                } ?>" alt=""/><br><br>
                <div class="row"><button id="btnUserImage" class="btn btn-primary">Choose Photo</button></div><br>
                <form class="form" method="POST" action="../controller/editUserController.php"
                      enctype="multipart/form-data">

                    <div class="card">
                        <div class="card-head style-primary">
                            <header>User Details</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="firstName" class="form-control" name="firstName" value="<?php echo $result['firstName']; ?>" required>
                                            <label for="firstName">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="lastName" class="form-control" name="lastName" value="<?php echo $result['lastName']; ?>" required>
                                            <label for="lastName">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input class="hidden" type="file" name="photo" id="selectPhoto">
                                            <input type="email" id="email" class="form-control" name="email" value="<?php echo $result['email']; ?>" required>
                                            <label for="email">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <select id="level" class="form-control" name="statue">
                                                <?php if ($result['statue'] == 1){ ?>
                                                    <option value="<?php echo $result['statue']?>">Active</option>
                                                    <option value="0">Deactivated</option>
                                                <?php }elseif ($result['statue'] == 0){ ?>
                                                    <option value="<?php echo $result['statue']?>">Deactivated</option>
                                                    <option value="1">Active</option>
                                                <?php } ?>
                                            </select>
                                            <label for="level">Status</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12"><label>User Level</label></div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Administrator</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="radio" name="level"
                                                       value="0" <?php echo ($result['level'] == 0) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Staff</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="radio" name="level"
                                                       value="1" <?php echo ($result['level'] == 1) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Teacher</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="radio" name="level"
                                                       value="2" <?php echo ($result['level'] == 2) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Student</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="radio" name="level"
                                                       value="3" <?php echo ($result['level'] == 3) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                    </div>
                    <?php if ($result['level'] == 0 || $result['level'] == 1){ ?>
                        <div class="card">
                            <div class="card-head style-primary">
                                <header>Page Access Permission</header>
                            </div>
                            <div class="card-body floating-label">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span>Admin</span>
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="checkbox" name="admin"
                                                           value="8" <?php echo ($result['admin'] == 8) ? "checked" : ""; ?>>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span>Finance</span>
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="checkbox" name="finance"
                                                           value="3" <?php echo ($result['finance'] == 3) ? "checked" : ""; ?>>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span>HR</span>
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="checkbox" name="hr"
                                                           value="4" <?php echo ($result['hr'] == 4) ? "checked" : ""; ?>>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <span>logistic</span>
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="checkbox" name="logistic"
                                                           value="1" <?php echo ($result['logistic'] == 1) ? "checked" : ""; ?>>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-head style-primary">
                            <header>Page Management Permission</header>
                        </div>
                        <div class="card-body floating-label">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Visit</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="checkbox" name="visit"
                                                       value="1" <?php echo ($result['reed1'] == 1) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Create</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="checkbox" name="create"
                                                       value="3" <?php echo ($result['create1'] == 3) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Edit</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="checkbox" name="edit"
                                                       value="4" <?php echo ($result['edit1'] == 4) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <span>Delete</span>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input type="checkbox" name="delete"
                                                       value="8" <?php echo ($result['delete1'] == 8) ? "checked" : ""; ?>>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                    <input type="hidden" id="userid" name="userid" value="<?php echo $result['id']; ?>">
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT PROFILE MODAL MARKUP -->
<?php include_once('../layouts/footer.php'); ?>
