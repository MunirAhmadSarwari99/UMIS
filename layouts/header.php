<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');

session_start();
if (!isset($_SESSION["loginSuccessID"])) {
    header("Location:../index.php?Login=Failed");
}
include_once('../controller/authController.php');
$flash = new Flash();
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Hewad University</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <link rel="icon" type="image/png" href="../public/images/logo.jpg"/>
        <!-- END META -->

        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/bootstrap.css?1422792965"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/materialadmin.css?1425466319"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/font-awesome.min.css?1422529194"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/material-design-iconic-font.min.css?1421434286"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/libs/rickshaw/rickshaw.css?1422792967"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/libs/morris/morris.core.css?1420463396"/>
        <link type="text/css" rel="stylesheet" href="../public/css/theme-default/libs/toastr/toastr.css?1425466569"/>
        <link type="text/css" rel="stylesheet" href="../public/css/app.css"/>
        <link type="text/css" rel="stylesheet" href="../public/css/animate.min.css"/>
        <!-- END STYLESHEETS -->
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="../public/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="../public/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
        <script type="text/javascript" src="../public/js/sweetalert2.all.min.js"></script>
    </head>
<body class="menubar-hoverable header-fixed ">

    <!-- BEGIN HEADER-->
    <header id="header">
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <?php if ($Auth['level'] == 0) { ?>
                                <a href="../views/Admin-Dashboard.php">
                                    <img src="../public/images/logo.jpg" alt="">
                                    <span class="text-lg text-bold text-primary">Hewad University</span>
                                </a>
                            <?php } elseif ($Auth['level'] == 1) { ?>
                                <a href="../views/Staff-Dashboard.php">
                                    <img src="../public/images/logo.jpg" alt="">
                                    <span class="text-lg text-bold text-primary">Hewad University</span>
                                </a>
                            <?php } elseif ($Auth['level'] == 2) { ?>
                                <a href="../views/Teacher-Dashboard.php">
                                    <img src="../public/images/logo.jpg" alt="">
                                    <span class="text-lg text-bold text-primary">Hewad University</span>
                                </a>
                            <?php } elseif ($Auth['level'] == 3) { ?>
                                <a href="../views/Student-Dashboard.php">
                                    <img src="../public/images/logo.jpg" alt="">
                                    <span class="text-lg text-bold text-primary">Hewad University</span>
                                </a>
                            <?php } ?>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="headerbar-right">
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="<?php if ($Auth['photo'] == 'default.png'){ echo "../public/images/". $Auth['photo']; }else{ echo "../public/Storage/Users/". $Auth['photo']; } ?>" alt=""/>
                            <span class="profile-info">
                              <?php echo $Auth['firstName'] . ' ' . $Auth['lastName']; ?>
									<small>
                                        <?php
                                        if ($Auth['level'] == 0) {
                                            echo 'Administrator';
                                        } elseif ($Auth['level'] == 1) {
                                            echo 'Staff';
                                        } elseif ($Auth['level'] == 2) {
                                            echo 'Teacher';
                                        } elseif ($Auth['level'] == 3) {
                                            echo 'Student';
                                        }
                                        ?>
                                    </small>
								</span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li class="dropdown-header">Config</li>
                            <li><a href="#offcanvas-search" data-toggle="offcanvas">My profile</a></li>
                            <li class="divider"></li>
                            <li><a href="#" data-toggle="modal" data-target="#ChangePasswordModal"><i class="fa fa-fw fa-lock"></i> Change Password</a></li>
                            <li><a href="../controller/logoutController.php"><i class="fa fa-fw fa-power-off text-danger"></i>Logout</a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->
            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT  Password Changed Successfully   Old Password Does Not Match -->
        <!-- BEGIN CONTENT-->
        <div id="content">
            <section>
                <div class="section-body">
                <?php
                if (isset($_SESSION['flash-message']) && isset($_SESSION['flash-level'])) {
                    echo "<script>Swal.fire({icon: '" .$_SESSION['flash-level']. "', title: '" .$_SESSION['flash-message']. "', showConfirmButton: false, timer: 2000,});</script>";
                }
                ?>