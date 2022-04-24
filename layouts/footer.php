</div><!--end .section-body -->
</section>
</div><!--end #content-->
<!-- END CONTENT -->

<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <?php if ($Auth['level'] == 0) { ?>
                <a href="../views/Admin-Dashboard.php">
                    <span class="text-lg text-bold text-primary">Hewad University</span>
                </a>
            <?php } elseif ($Auth['level'] == 1) { ?>
                <a href="../views/Staff-Dashboard.php">
                    <span class="text-lg text-bold text-primary">Hewad University</span>
                </a>
            <?php } elseif ($Auth['level'] == 2) { ?>
                <a href="../views/Teacher-Dashboard.php">
                    <span class="text-lg text-bold text-primary">Hewad University</span>
                </a>
            <?php } elseif ($Auth['level'] == 3) { ?>
                <a href="../views/Student-Dashboard.php">
                    <span class="text-lg text-bold text-primary">Hewad University</span>
                </a>
            <?php } ?>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">
            <?php if ($Auth['level'] == 0) { ?>
                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="../views/Admin-Dashboard.php" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->
                                     <!-- BEGIN User Accounts -->
                <li>
                    <a href="../views/users.php">
                        <div class="gui-icon"><i class="fa fa-users"></i></div>
                        <span class="title">User Accounts</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END User Accounts -->

                     <!-- BEGIN Faculty -->
                <li>
                    <a href="../views/faculty.php">
                        <div class="gui-icon"><i class="md md-account-balance"></i></div>
                        <span class="title">Faculty</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END Faculty -->

                     <!-- BEGIN Classes -->
                <li>
                    <a href="../views/classes.php">
                        <div class="gui-icon"><i class="md md-subtitles"></i></div>
                        <span class="title">Classes</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END Classes -->

                     <!-- BEGIN Subject & Schedule -->
                <li>
                    <a href="../views/subjectandschedule.php">
                        <div class="gui-icon"><i class="md md-assignment"></i></div>
                        <span class="title">Subject & Schedule</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END Subject & Schedule -->

                     <!-- BEGIN Graduation -->
                <li>
                    <a href="../views/graduation.php">
                        <div class="gui-icon"><i class="md md-school"></i></div>
                        <span class="title">Graduation</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END Graduation -->

                     <!-- BEGIN Exam -->                                                                                                                                                                         <!-- BEGIN Graduation -->
                <li>
                    <a href="../views/exam.php">
                        <div class="gui-icon"><i class="md md-timer"></i></div>
                        <span class="title">Exam</span>
                    </a>
                </li><!--end /menu-li -->
                     <!-- END Exam -->

                     <!-- BEGIN Staff -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-account-child"></i></div>
                        <span class="title">StaffS</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="../views/staffs.php"><span class="title">All Staff</span></a></li>
<!--                        <li><a href="../views/staffattendance.php"><span class="title">Attendance</span></a></li>-->
                        <li><a href="../views/staffsalary.php"><span class="title">Salary</span></a></li>
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                     <!-- END Staff -->

                     <!-- BEGIN Teacher -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-people-outline"></i></div>
                        <span class="title">Teachers</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="../views/teachers.php"><span class="title">All Teacher</span></a></li>
                        <li><a href="../views/teacherattendance.php"><span class="title">Attendance</span></a></li>
                        <li><a href="../views/teachersalary.php"><span class="title">Salary</span></a></li>
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                     <!-- END Teacher -->

                     <!-- BEGIN Student -->
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="md md-school"></i></div>
                        <span class="title">Students</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="../views/students.php"><span class="title">All Student</span></a></li>
                        <li><a href="../views/Studentattendance.php"><span class="title">Attendance</span></a></li>
                        <li><a href="../views/StudentFees.php"><span class="title">Fees</span></a></li>
                    </ul><!--end /submenu -->
                </li><!--end /menu-li -->
                <!-- END Student -->
            <?php } elseif ($Auth['level'] == 1) {?>
                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="../views/Staff-Dashboard.php" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->
            <?php } elseif ($Auth['level'] == 2) {?>
                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="../views/Teacher-Dashboard.php" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->
                <!-- BEGIN Attendance -->
                <li>
                    <a href="../views/Teacher-Attendance.php">
                        <div class="gui-icon"><i class="md md-check-box"></i></div>
                        <span class="title">Attendance</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Attendance -->
                <!-- BEGIN  Students Attendance -->
                <li>
                    <a href="../views/Studentattendance.php">
                        <div class="gui-icon"><i class="md md-check-box"></i></div>
                        <span class="title">Students Attendance</span>
                    </a>
                </li><!--end /menu-li -->
                 <!-- END Students Attendance -->
                <!-- BEGIN Question -->
                <li>
                    <a href="../views/TeacherAddQuestion.php">
                        <div class="gui-icon"><i class="md md-list"></i></div>
                        <span class="title">Exam Questions</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Question -->
                <!-- BEGIN Homework -->
                <li>
                    <a href="../views/TeacherHomework.php">
                        <div class="gui-icon"><i class="md md-receipt"></i></div>
                        <span class="title">Homework</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Homework -->
            <?php } elseif ($Auth['level'] == 3) {?>
                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="../views/Student-Dashboard.php" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->
               <!-- BEGIN Attendance -->
                <li>
                    <a href="../views/Student-Attendance.php">
                        <div class="gui-icon"><i class="md md-check-box"></i></div>
                        <span class="title">Attendance</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Attendance -->
                <!-- BEGIN Homework -->
                <li>
                    <a href="../views/Student-Homework.php">
                        <div class="gui-icon"><i class="md md-receipt"></i></div>
                        <span class="title">Homework</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Homework -->
                <!-- BEGIN Exam -->
                <li>
                    <a href="../views/Student-Exam.php">
                        <div class="gui-icon"><i class="md md-timer"></i></div>
                        <span class="title">Exam</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END Exam -->
            <?php } ?>
        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2021</span> <strong>Munir Ahmad Sarwari</strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->

<!-- BEGIN OFFCANVAS RIGHT -->
<div class="offcanvas">
    <!-- BEGIN OFFCANVAS SEARCH -->
    <div id="offcanvas-search" class="offcanvas-pane width-12">
        <div class="offcanvas-head">
            <header class="text-primary">Profile</header>
            <div class="offcanvas-tools">
                <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                    <i class="md md-close"></i>
                </a>
            </div>
        </div>
        <div class="offcanvas-body no-padding">
            <ul class="list ">
                <li class="tile divider-full-bleed">
                    <div class="tile-content">
                        <div class="tile-text"><strong>User Details</strong></div>
                    </div>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon">
                            <img src="<?php if ($Auth['photo'] == 'default.png') {
                                echo "../public/images/" . $Auth['photo'];
                            } else {
                                echo "../public/Storage/Users/" . $Auth['photo'];
                            } ?>" alt=""/>
                        </div>
                        <div class="tile-text">
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
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tile-text">
                                    User
                                    <small>
                                        <?php if ($Auth['statue'] == 1) {
                                            echo 'Active';
                                        } else {
                                            echo 'Deactivate';
                                        } ?>
                                    </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tile-text">
                                    Identity
                                    <small><?php echo $Auth['nic'] ?></small>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <?php if ($Auth['level'] == 0) { ?>
                <li class="tile divider-full-bleed">
                    <div class="tile-content">
                        <div class="tile-text"><strong>Access to Page</strong></div>
                    </div>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Admin
                                    <?php
                                    if ($Auth['admin'] == 8) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Finance
                                    <?php
                                    if ($Auth['finance'] == 3) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    HR
                                    <?php
                                    if ($Auth['hr'] == 4) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    logistic
                                    <?php
                                    if ($Auth['logistic'] == 1) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="tile divider-full-bleed">
                    <div class="tile-content">
                        <div class="tile-text"><strong>User Roles</strong></div>
                    </div>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Visit
                                    <?php
                                    if ($Auth['reed1'] == 1) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Create
                                    <?php
                                    if ($Auth['create1'] == 3) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Edit
                                    <?php
                                    if ($Auth['edit1'] == 4) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="tile-text">
                                    Delete
                                    <?php
                                    if ($Auth['delete1'] == 8) {
                                        echo '<small class="md md-verified-user"></small>';
                                    } else {
                                        echo '<small class="md md-cancel" style="color: red;"></small>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="tile divider-full-bleed">
                    <div class="tile-content">
                        <div class="tile-text"><strong>Personal Details</strong></div>
                    </div>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Birthday
                            <small>
                                <?php
                                $mounth = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',];
                                $date = Date('Y');
                                $age = $date - $Auth['year'];
                                echo $Auth['year'] . ' / ' . $Auth['day'] . ' / ' . $mounth[$Auth['mounth']] . ' , ' . $age . ' Years old';
                                ?>
                            </small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            E-mail
                            <small>
                                <?php echo $Auth['email']; ?>
                            </small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Gender
                            <small>
                                <?php
                                if ($Auth['gender'] == 0) {
                                    echo 'Male';
                                } else {
                                    echo 'Female';
                                }
                                ?>
                            </small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Hometown
                            <small><?php echo $Auth['pcity']; ?></small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Lives in
                            <small><?php echo $Auth['ccity']; ?></small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Phone
                            <small><?php echo $Auth['phone']; ?></small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Position
                            <small><?php echo $Auth['position']; ?></small>
                        </div>
                    </a>
                </li>
                <li class="tile">
                    <a class="tile-content ink-reaction" data-toggle="offcanvas"
                       data-backdrop="false">
                        <div class="tile-icon"></div>
                        <div class="tile-text">
                            Registration Date
                            <small><?php echo date('d F, Y', strtotime($Auth['regdate'])) ?></small>
                        </div>
                    </a>
                </li>
                <?php } elseif ($Auth['level'] == 1) {?>

                <?php } elseif ($Auth['level'] == 2) {?>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>Personal Details</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Faculty
                                <small>
                                    <?php
                                    echo  $Auth['facultyName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Department
                                <small>
                                    <?php
                                    echo  $Auth['departmentName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Father Name
                                <small>
                                    <?php
                                    echo  $Auth['fatherName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Birthday
                                <small>
                                    <?php
                                    $mounth = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',];
                                    $date = Date('Y');
                                    $age = $date - $Auth['year'];
                                    echo $Auth['year'] . ' / ' . $Auth['day'] . ' / ' . $mounth[$Auth['mounth']] . ' , ' . $age . ' Years old';
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Gender
                                <small>
                                    <?php
                                    if ($Auth['gender'] == 0) {
                                        echo 'Male';
                                    } else {
                                        echo 'Female';
                                    }
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Hometown
                                <small><?php echo $Auth['pcity']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Lives in
                                <small><?php echo $Auth['ccity']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Phone
                                <small><?php echo $Auth['phone']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Degree
                                <small><?php echo $Auth['degree']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Registration Date
                                <small><?php echo date('d F, Y', strtotime($Auth['regdate'])) ?></small>
                            </div>
                        </a>
                    </li>
                <?php } elseif ($Auth['level'] == 3) {?>
                    <li class="tile divider-full-bleed">
                        <div class="tile-content">
                            <div class="tile-text"><strong>Personal Details</strong></div>
                        </div>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Faculty
                                <small>
                                    <?php
                                    echo  $Auth['facultyName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Department
                                <small>
                                    <?php
                                    echo  $Auth['departmentName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Class
                                <small>
                                    <?php
                                    echo  $Auth['className'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Semester
                                <small>
                                    <?php
                                    echo  $Auth['semester'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Father Name
                                <small>
                                    <?php
                                    echo  $Auth['SfatherName'];
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Birthday
                                <small>
                                    <?php
                                    $mounth = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',];
                                    $date = Date('Y');
                                    $age = $date - $Auth['year'];
                                    echo $Auth['year'] . ' / ' . $Auth['day'] . ' / ' . $mounth[$Auth['mounth']] . ' , ' . $age . ' Years old';
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Gender
                                <small>
                                    <?php
                                    if ($Auth['gender'] == 0) {
                                        echo 'Male';
                                    } else {
                                        echo 'Female';
                                    }
                                    ?>
                                </small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Hometown
                                <small><?php echo $Auth['pcity']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Lives in
                                <small><?php echo $Auth['ccity']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Phone
                                <small><?php echo $Auth['phone']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                School
                                <small><?php echo $Auth['school']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Graduation Year
                                <small><?php echo $Auth['graduationYear']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Kankor No
                                <small><?php echo $Auth['KankorNo']; ?></small>
                            </div>
                        </a>
                    </li>
                    <li class="tile">
                        <a class="tile-content ink-reaction" data-toggle="offcanvas"
                           data-backdrop="false">
                            <div class="tile-icon"></div>
                            <div class="tile-text">
                                Registration Date
                                <small><?php echo date('d F, Y', strtotime($Auth['regdate'])) ?></small>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div><!--end .offcanvas-body -->
    </div><!--end .offcanvas-pane -->
    <!-- END OFFCANVAS SEARCH -->
</div><!--end .offcanvas-->
<!-- END OFFCANVAS RIGHT -->

</div><!--end #base-->
<!-- END BASE -->
<!-- BEGIN FORM MODAL MARKUP -->
<div class="modal fade" id="ChangePasswordModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="formModalLabel">Change Password</h4>
            </div>
            <form class="form" method="POST" action="../controller/cchangePasswordController.php">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" required>
                                    <label for="oldPassword">Old Password</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="password" name="newPassword" class="form-control" id="newPassword" required>
                                    <label for="newPassword">New Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="confirmPassword" required>
                            <label id="confirmation" for="confirmPassword">Confirm Password</label>
                        </div>
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Change</button>
                        </div>
                    </div>
                </div><!--end .card -->
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END FORM MODAL MARKUP -->

<!-- BEGIN JAVASCRIPT -->
<script src="../public/js/libs/jquery/jquery-1.11.2.min.js"></script>
<script src="../public/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="../public/js/libs/bootstrap/bootstrap.min.js"></script>
<script src="../public/js/libs/spin.js/spin.min.js"></script>
<script src="../public/js/libs/autosize/jquery.autosize.min.js"></script>
<script src="../public/js/libs/moment/moment.min.js"></script>
<script src="../public/js/libs/flot/jquery.flot.min.js"></script>
<script src="../public/js/libs/flot/jquery.flot.time.min.js"></script>
<script src="../public/js/libs/flot/jquery.flot.resize.min.js"></script>
<script src="../public/js/libs/flot/jquery.flot.orderBars.js"></script>
<script src="../public/js/libs/flot/jquery.flot.pie.js"></script>
<script src="../public/js/libs/flot/curvedLines.js"></script>
<script src="../public/js/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="../public/js/libs/sparkline/jquery.sparkline.min.js"></script>
<script src="../public/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
<script src="../public/js/libs/d3/d3.min.js"></script>
<script src="../public/js/libs/d3/d3.v3.js"></script>
<script src="../public/js/libs/rickshaw/rickshaw.min.js"></script>
<script src="../public/js/core/source/App.js"></script>
<script src="../public/js/core/source/AppNavigation.js"></script>
<script src="../public/js/core/source/AppOffcanvas.js"></script>
<script src="../public/js/core/source/AppCard.js"></script>
<script src="../public/js/core/source/AppForm.js"></script>
<script src="../public/js/core/source/AppNavSearch.js"></script>
<script src="../public/js/core/source/AppVendor.js"></script>
<script src="../public/js/core/demo/Demo.js"></script>
<script src="../public/js/libs/toastr/toastr.js"></script>
<!--<script src="../public/js/core/demo/DemoDashboard.js"></script>-->
<script src="../public/js/app.js"></script>
<script src="../public/js/Ajax.js"></script>
<!-- END JAVASCRIPT -->

</body>
</html>