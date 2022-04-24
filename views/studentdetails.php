<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/facultyController.php');
include_once('../controller/studentDetailsController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Student Details</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal"
                                data-target="#edit-user"><i class="md md-edit"></i></button>
                        <a href="students.php" class="btn btn-floating-action btn-primary" ><i
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
                                                <img class="img-thumbnail"
                                                     src="<?php if ($result['image'] == 'default.png') {
                                                         echo "../public/images/" . $result['image'];
                                                     } else {
                                                         echo "../public/Storage/Student/" . $result['image'];
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
                                                    <?php echo $result['SfirstName'] . " " . $result['SlastName']; ?><br>
                                                    <strong>Father Name</strong><br>
                                                    <?php echo $result['SfatherName'] ?><br>
                                                    <strong>Email</strong><br>
                                                    <?php echo $result['email']; ?><br>
                                                    <strong>Phone</strong><br>
                                                    <?php echo $result['phone']; ?><br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-4 pull-right">
                                                <div class="well">
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Faculty :</div>
                                                        <div class="pull-right">
                                                            <?php echo $result['facultyName']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Department :</div>
                                                        <div class="pull-right">
                                                            <?php echo $result['departmentName']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Gender :</div>
                                                        <div class="pull-right">
                                                            <?php
                                                            if ($result['gender'] == 0) {
                                                                echo 'Male';
                                                            } else{
                                                                echo 'Female';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Identity :</div>
                                                        <div class="pull-right">
                                                            <?php echo $result['nic'];?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Birthday</strong><br>
                                                    <?php
                                                    $mounth = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',];
                                                    $date = Date('Y');
                                                    $age = $date - $result['year'];
                                                    echo $result['year'] . ' / ' . $result['day'] . ' / ' . $mounth[$result['mounth']] . ' , ' . $age . ' Years old';
                                                    ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Hometown</strong><br>
                                                    <?php echo $result['pcity'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Lives in</strong><br>
                                                    <?php echo $result['ccity'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Registration Date</strong><br>
                                                    <?php echo $result['regdate'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>School</strong><br>
                                                    <?php echo $result['school']; ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Class Name</strong><br>
                                                    <?php echo $result['className'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Graduation Year</strong><br>
                                                    <?php echo $result['graduationYear'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Kankor No</strong><br>
                                                    <?php echo $result['KankorNo'] ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <!-- END INVOICE DESCRIPTION -->
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="5" class="text-left"><strong class="text-lg text-accent">Attendance</strong></th>
                                                </tr>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Month</th>
                                                    <th>Day</th>
                                                    <th>Attendance</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($query1)){ ?>

                                                <tr id="<?php echo $row["id"];?>">
                                                    <td data-target="attYear"><?php echo $row["attYear"]; ?></td>
                                                    <td data-target="attMonth"><?php echo $row["attMonth"]; ?></td>
                                                    <td data-target="attday"><?php echo $row["attday"]; ?></td>
                                                    <td class="hidden" data-target="attr"><?php echo $row["attr"]; ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row["attr"] == 1){
                                                            echo "<small class='md md-verified-user text-success'> Present</small>";
                                                        }elseif ($row["attr"] == 2){
                                                            echo "<small class='md md-local-hotel text-warning'> Sick</small>";
                                                        }elseif ($row["attr"] == 3){
                                                            echo "<small class='md md-star-half text-primary'> Necessary</small>";
                                                        }else{
                                                            echo "<small class='md md-cancel text-danger'> Absences</small>";
                                                        }
                                                        ?>
                                                    </td>
                                                        <?php

                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div><!--end .col -->
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th colspan="8" class="text-left"><strong class="text-lg text-accent">Schedule</strong></th>
                                                </tr>
                                                <tr>
                                                    <th>Faculty</th>
                                                    <th>Department</th>
                                                    <th>Class</th>
                                                    <th>Subject</th>
                                                    <th>Day</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                                    <tr>
                                                        <td><?php echo $row["facultyName"];?></td>
                                                        <td><?php echo $row["departmentName"];?></td>
                                                        <td><?php echo $row["className"];?></td>
                                                        <td><?php echo $row["subname"];?></td>
                                                        <td><?php echo $row["day"];?></td>
                                                        <td><?php echo $row["starttime"];?></td>
                                                        <td><?php echo $row["endtime"];?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div><!--end .col -->
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
                <h4 class="modal-title" id="textModalLabel">Edit Teacher Details</h4>
            </div>
            <div class="modal-body">
                <img id="imgStaffPhoto" class="width-3 img-circle" src="<?php if ($result['image'] == 'default.png') {
                    echo "../public/images/" . $result['image'];
                } else {
                    echo "../public/Storage/Student/" . $result['image'];
                } ?>" alt=""/><br/><br/>
                <button type="button" class="btn btn-primary" id="btnStaffImage">Choose Phote</button><br/><br/>
                <form class="form floating-label" method="POST" action="../controller/editStudentController.php" enctype="multipart/form-data">
                    <div>
                        <input type="file" class="hidden" id="staffimg" name="photo">
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="gendre"
                                   value="0" <?php echo ($result['gender'] == 0) ? "checked" : ""; ?>><span>Male</span>
                        </label>
                        <label class="radio-inline radio-styled">
                            <input type="radio" name="gendre"
                                   value="1" <?php echo ($result['gender'] == 1) ? "checked" : ""; ?>><span>Female</span>
                        </label>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <em><?php echo $result['facultyName'];?></em>
                                <div class="form-group">
                                    <select name="faculty" class="form-control" id="facultyS">
                                        <option value=""></option>
                                        <?php while ($row = mysqli_fetch_assoc($faculty)) { ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <label for="faculty">Faculty</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <em><?php echo $result['departmentName'];?></em>
                                <div class="form-group">
                                    <label for="department">Department</label>
                                    <select name="department" class="form-control" id="departmentS" disabled>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="firstName" value="<?php echo $result['SfirstName'] ?>"
                                       class="form-control" id="firstName" required>
                                <label for="firstName">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="lastName" value="<?php echo $result['SlastName'] ?>"
                                       class="form-control" id="lastName" required>
                                <label for="lastName">Last Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <em class="pull-right">Class Name<?php echo $result['className'] ?></em><br/>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="fatherName" value="<?php echo $result['SfatherName'] ?>"
                                           class="form-control" id="fatherName" required>
                                    <label for="fatherName">Father Name</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="class">Class Name</label>
                                    <select name="class" class="form-control" id="class" disabled>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="hometown" value="<?php echo $result['pcity'] ?>"
                                       class="form-control" id="hometown" required>
                                <label for="hometown">Hometown</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="livesin" value="<?php echo $result['ccity'] ?>"
                                       class="form-control" id="livesin required">
                                <label for="livesin">Lives in</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Birthday</label>
                            <em class="pull-right">
                                <?php
                                $mounth = [1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',];
                                $date = Date('Y');
                                $age = $date - $result['year'];
                                echo $result['year'] . ' / ' . $result['day'] . ' / ' . $mounth[$result['mounth']] . ' , ' . $age . ' Years old';
                                ?>
                            </em>
                            <br>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select name="year" class="form-control" id="year">
                                        <option value=""></option>
                                        <?php
                                        $begin = date("Y") - 35;
                                        $end = date("Y") - 18;
                                        for ($i = $end; $i >= $begin; $i--) {
                                            echo "<option>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="year">Year</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select name="month" class="form-control" id="month">
                                        <option><?php echo $result['mounth'] ?></option>
                                        <?php
                                        for ($i = 1; $i <= 12; $i++) {
                                            echo "<option>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="month">Month</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select name="day" class="form-control" id="day">
                                        <option><?php echo $result['day'] ?></option>
                                        <?php
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="day">Day</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="nic" value="<?php echo $result['nic'] ?>"
                                       class="form-control" id="nic" required>
                                <label for="nic">Identity</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="phone" value="<?php echo $result['phone'] ?>"
                                       class="form-control" id="phone" required>
                                <label for="phone">Phone</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <em class="pull-right">Graduation Year <?php echo $result['graduationYear'];?></em><br/>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="school" value="<?php echo $result['school'] ?>"
                                           class="form-control" id="school" required>
                                    <label for="school">School</label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <select name="graduationYear" class="form-control">
                                        <option><?php echo $result['graduationYear'] ?></option>
                                        <?php
                                        $begin = date("Y") - 25;
                                        $end = date("Y") - 20;
                                        for ($i = $end; $i >= $begin; $i--) {
                                            echo "<option>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <label for="graduationYear">Graduation Year</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="kankorno" value="<?php echo $result['KankorNo'] ?>"
                                       class="form-control" id="kankorno" required>
                                <label for="kankorno">Kankor No</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="date" name="regdate" value="<?php echo $result['regdate'] ?>"
                                       class="form-control" id="regdate" required>
                                <label for="regdate">Registration</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="studentId" value="<?php echo $result['id'] ?>" required>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT PROFILE MODAL MARKUP -->
<?php include_once('../layouts/footer.php'); ?>
