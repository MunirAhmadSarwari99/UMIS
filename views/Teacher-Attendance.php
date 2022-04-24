<?php
include_once('../layouts/header.php');
include_once('../controller/Teacher_AttendanceController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Attendance</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <form class="form" method="POST" action="../controller/createTeacherAttendanceController.php">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div>
                                            <label class="checkbox-inline checkbox-styled checkbox-success">
                                                <input type="checkbox" name="attendance" value="1" required>
                                            </label>
                                            <?php
                                            $GetTeacherID = mysqli_query($DBCONNECTION,"SELECT teacher.id FROM teacher INNER JOIN users ON users.id = teacher.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
                                            $TeacherID = mysqli_fetch_assoc($GetTeacherID);
                                            ?>
                                            <input type="hidden" name="TeacherName" value="<?php echo $TeacherID["id"]; ?>">
                                            <button type="submit" class="btn btn-primary-dark">Present</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </tr>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Day</th>
                            <th>Attendance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($attendance)){ ?>
                            <tr>
                                <td><?php echo $row["attYear"]; ?></td>
                                <td><?php echo $row["attMonth"]; ?></td>
                                <td><?php echo $row["attday"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["attr"] == 1){
                                        echo "<small class='md md-verified-user text-success'> Present</small>";
                                    }else{
                                        echo "<small class='md md-cancel text-danger'> Absences</small>";
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
