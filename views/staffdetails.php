<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/staffDetailsController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Staff Details</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal"
                                data-target="#edit-user"><i class="md md-edit"></i></button>
                        <a href="staffs.php" class="btn btn-floating-action btn-primary" ><i
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
                                                     src="<?php if ($result['image'] == 'default.png') {
                                                         echo "../public/images/" . $result['image'];
                                                     } else {
                                                         echo "../public/Storage/Staff/" . $result['image'];
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
                                                    <strong>Phone</strong><br>
                                                    <?php echo $result['phone']; ?><br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-4 pull-right">
                                                <div class="well">
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
                                                    <div class="clearfix">
                                                        <div class="pull-left"> Position :</div>
                                                        <div class="pull-right">
                                                            <?php echo $result['position'];?>
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
                                                    <?php echo $result['pcity']; ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Lives in</strong><br>
                                                    <?php echo $result['ccity']; ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Registration Date</strong><br>
                                                    <?php echo $result['regdate']; ?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <div class="row">
                                            <div class="col-xs-3">
                                                <address>
                                                    <strong>Faculty</strong><br>
                                                    <?php echo $result['facultyName'];?>
                                                    <br>
                                                </address>
                                            </div><!--end .col -->
                                        </div><!--end .row -->
                                        <!-- END INVOICE DESCRIPTION -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="5" class="text-left"><strong class="text-lg text-accent">Salary</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Amount</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Bonus</th>
                                                        <th class="text-center">Absences</th>
                                                        <th class="text-center">Pay</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($result2 = mysqli_fetch_assoc($query2)){ ?>
                                                    <?php if($result2 != null){ ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $result2["amount"]; ?></td>
                                                        <td class="text-center"><?php echo $result2["salaryDate"]; ?></td>
                                                        <td class="text-center"><?php echo $result2["bonus"]; ?></td>
                                                        <?php
                                                            $amount = $result2["amount"];
                                                            $bonus = $result2["bonus"];
                                                            $absences = $result2["Absences"];
                                                            $total = null;
                                                            if ($result2["bonus"] != 0 ){
                                                                $value = $amount + $bonus;
                                                                if ($absences != 0){
                                                                    $val = $absences * 20;
                                                                    $total = $value - $val;
                                                                }else if($result2["bonus"] != 0 ){
                                                                    $total = $amount + $bonus;
                                                                }
                                                            }else{
                                                                $total =$amount;
                                                            }
                                                        ?>
                                                        <td class="text-center"><?php echo $result2["Absences"] . " Day";?></td>
                                                        <td class="text-center">
                                                            <?php
                                                            if ($result2["pay"] == 1){
                                                                echo "<small class='md md-verified-user text-success'> Yes</small>";
                                                            }else{
                                                                echo "<small class='md md-cancel text-danger'> No</small>";
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td class="text-right"><strong class="text-lg text-accent">Total <?php echo $total;?></strong></td>
                                                    </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div><!--end .col -->
                                            <div class="col-md-12">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th colspan="5" class="text-left"><strong class="text-lg text-accent">Attendance</strong></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-center">Amount</th>
                                                        <th class="text-center">Month</th>
                                                        <th class="text-center">Day</th>
                                                        <th class="text-center">Attendance</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($result2 = mysqli_fetch_assoc($query3)){ ?>
                                                        <?php if($result2 != null){ ?>
                                                            <tr>
                                                                <td class="text-center"><?php echo $result2["attYear"]; ?></td>
                                                                <td class="text-center"><?php echo $result2["attMonth"]; ?></td>
                                                                <td class="text-center"><?php echo $result2["attday"]; ?></td>
                                                                <td class="text-center">
                                                                    <?php
                                                                    if ($result2["attr"] == 1){
                                                                        echo "<small class='md md-verified-user text-success'> Present</small>";
                                                                    }elseif ($result2["attr"] == 2){
                                                                        echo "<small class='md md-local-hotel text-warning'> Sick</small>";
                                                                    }elseif ($result2["attr"] == 3){
                                                                        echo "<small class='md md-star-half text-primary'> Necessary</small>";
                                                                    }else{
                                                                        echo "<small class='md md-cancel text-danger'> Absences</small>";
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div><!--end .col -->
                                        </div>
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
                <h4 class="modal-title" id="textModalLabel">Edit Staff Details</h4>
            </div>
            <div class="modal-body">
                <img id="imgStaffPhoto" class="width-3 img-circle" src="<?php if ($result['image'] == 'default.png') {
                    echo "../public/images/" . $result['image'];
                } else {
                    echo "../public/Storage/Staff/" . $result['image'];
                } ?>" alt=""/><br/><br/>
                <button type="button" class="btn btn-primary" id="btnStaffImage">Choose Phote</button><br/><br/>
                <form class="form" method="POST" action="../controller/editStaffController.php" enctype="multipart/form-data">
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="firstName" value="<?php echo $result['firstName'] ?>"
                                       class="form-control" id="firstName" required>
                                <label for="firstName">First Name</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="lastName" value="<?php echo $result['lastName'] ?>"
                                       class="form-control" id="lastName" required>
                                <label for="lastName">Last Name</label>
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
                                       class="form-control" id="livesin" required>
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
                                    <select name="month" class="form-control" id="month" required>
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
                                    <select name="day" class="form-control" id="day" required>
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
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="position" value="<?php echo $result['position'] ?>"
                                       class="form-control" id="position" required>
                                <label for="position">Position</label>
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
                        <input type="hidden" name="staffId" value="<?php echo $result['id'] ?>" required>
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
