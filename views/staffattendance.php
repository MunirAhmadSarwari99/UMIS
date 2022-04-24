<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/staffAttendanceController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Staff Attendance</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal"
                                data-target="#new-attr"><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Year</th>
                                <th>Month</th>
                                <th>Day</th>
                                <th>Attendance</th>
                                <th class="setting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="staff-data">
                            <?php while ($row = mysqli_fetch_assoc($query)){ ?>
                            <tr id="<?php echo $row["id"];?>">
                                <td data-target="firstName"><?php echo $row["firstName"];?></td>
                                <td data-target="lastName"><?php echo $row["lastName"];?></td>
                                <td data-target="attYear"><?php echo $row["attYear"]; ?></td>
                                <td data-target="attMonth"><?php echo $row["attMonth"]; ?></td>
                                <td data-target="attday"><?php echo $row["attday"]; ?></td>
                                <td class="hidden" data-target="attr"><?php echo $row["attr"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["attr"] == 1){
                                        echo "<small class='md md-verified-user text-success'> Present</small>";
                                    }else{
                                        echo "<small class='md md-cancel text-danger'> Absences</small>";
                                    }
                                    ?>
                                </td>
                                <td class="setting text-right">
                                    <a href="#" data-role='edit-attr' data-id="<?php echo $row["id"];?>" data-target='edit-attr' class="btn btn-success"><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteStaffAttendanceController.php">
                                        <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                        <button type="button" class="btn btn-block ink-reaction btn-danger DELETE"><i class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                </div>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Present: <?php echo $Present['total1']; ?></th>
                        <th>Absences: <?php echo $Necessary['total4']; ?></th>
                    </tr>
                    </thead>
                </table>
            </div><!--end .row -->
        </div>
    </div>
</div>

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="new-attr" tabindex="-1" role="dialog" aria-labelledby="new-attr" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Staff Attendance</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createStaffAttendanceController.php" enctype="multipart/form-data">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="staffName" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["firstName"] ." ". $row["lastName"]; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="staffName">Staff Name</label>
                            </div>
                        </div>

<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <input type="text" name="year" class="form-control" value="--><?php //echo date('Y')?><!--" required>-->
<!--                                <label for="amount">Year</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <select class="form-control" name="attMonth" required>-->
<!--                                    <option value=""></option>-->
<!--                                    <option value="January">January</option>-->
<!--                                    <option value="February">February</option>-->
<!--                                    <option value="February">March</option>-->
<!--                                    <option value="April">April</option>-->
<!--                                    <option value="May">May</option>-->
<!--                                    <option value="June">June</option>-->
<!--                                    <option value="July">July</option>-->
<!--                                    <option value="August">August</option>-->
<!--                                    <option value="September">September</option>-->
<!--                                    <option value="October">October</option>-->
<!--                                    <option value="November">November</option>-->
<!--                                    <option value="December">December</option>-->
<!--                                </select>-->
<!--                                <label for="attMonth">Month</label>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <select name="attday" class="form-control" required>-->
<!--                                    <option value=""></option>-->
<!--                                    --><?php
//                                    for ($i = 1; $i <= 31; $i++) {
//                                        echo "<option>" . $i . "</option>";
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                                <label for="attday">Day</label>-->
<!--                            </div>-->
<!--                        </div>-->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="checkbox-inline checkbox-styled checkbox-success">
                                        <input type="checkbox" name="attendance" value="1"><span>Present</span>
                                    </label>
<!--                                    <label class="radio-inline radio-styled">-->
<!--                                        <input type="radio" name="attendance" value="1" checked><span>Present</span>-->
<!--                                    </label>-->
<!--                                    <label class="radio-inline radio-styled">-->
<!--                                        <input type="radio" name="attendance" value="0"><span>Absences</span>-->
<!--                                    </label>-->
                                </div>
                            </div>
                        </div>
<!--                        <div class="col-sm-6">-->
<!--                            <div class="form-group">-->
<!--                                <div>-->
<!--                                    <label class="radio-inline radio-styled">-->
<!--                                        <input type="radio" name="attendance" value="2"><span>Sick</span>-->
<!--                                    </label>-->
<!--                                    <label class="radio-inline radio-styled">-->
<!--                                        <input type="radio" name="attendance" value="3"><span>Necessary</span>-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT PROFILE MODAL MARKUP -->

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal staffATTR fade" id="edit-attr" tabindex="-1" role="dialog" aria-labelledby="edit-attr" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Staff Attendance</h4>
                <h5 id="stName" class="text-center text-primary"></h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/EditStaffAttendanceController.php" enctype="multipart/form-data">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="staffName" class="form-control" id="staffName">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["firstName"] ." ". $row["lastName"]; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="staffName">Staff Name</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="year" class="form-control" id="year" required>
                                <label for="amount">Year</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="attMonth" id="attMonth">
                                    <option value=""></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="February">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <label for="attMonth" id="month">Month</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="attday" class="form-control" id="attday">
                                    <option value=""></option>
                                    <?php
                                    for ($i = 1; $i <= 31; $i++) {
                                        echo "<option>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                                <label for="attday" id="day">Day</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="attendance" id="Present" value="1"><span>Present</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="attendance" id="Absences" value="0"><span>Absences</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="attendance" id="Sick" value="2"><span>Sick</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="attendance" id="Necessary" value="3"><span>Necessary</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="text" class="hidden" name="dataID" id="dataID" required>
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
