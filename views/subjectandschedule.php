<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/SubjectsSchedulesController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Subjects & Schedules</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="row">
                    <div class="col-md-3">
                        <div class="table-responsive height-10" style="overflow: auto;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#Subjects"><i class="md md-save"></i></button></th>
                                    </tr>
                                    <tr>
                                        <th>Subjects</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query1)){ ?>
                                <tr id="<?php echo $row["id"];?>">
                                    <td data-target="subjectName"><?php echo $row["subname"];?></td>
                                    <td class="setting text-right">
                                        <a href="#" data-role='edit-subject' data-id="<?php echo $row["id"];?>" data-target='edit-subject' class="btn btn-success"><i class="md md-edit"></i></a>
                                        <form class="delete_form" method="POST" action="../controller/deleteSubjectController.php">
                                            <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                            <button type="button" class="btn btn-block ink-reaction btn-danger DELETE"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="table-responsive height-10" style="overflow: auto;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><h3 class="text-primary-dark">Teacher Schedules</h3></th>
                                    <th colspan="8" class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#Schedules"><i class="md md-save"></i></button></th>
                                </tr>
                                <tr>
                                    <th>Teacher</th>
                                    <th>Faculty</th>
                                    <th>Department</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query5)){ ?>
                                    <tr id="<?php echo $row["id"];?>">
                                        <td><?php echo $row["firstName"] ." ". $row["lastName"];?></td>
                                        <td><?php echo $row["facultyName"];?></td>
                                        <td><?php echo $row["departmentName"];?></td>
                                        <td><?php echo $row["className"];?></td>
                                        <td><?php echo $row["subname"];?></td>
                                        <td><?php echo $row["day"];?></td>
                                        <td><?php echo $row["starttime"];?></td>
                                        <td><?php echo $row["endtime"];?></td>
                                        <td class="setting text-right">
                                            <a href="#" data-role='updated' data-id="<?php echo $row["id"];?>" data-target='edit-Schedule' class="btn btn-success"><i class="md md-edit"></i></a>
                                            <form class="delete_form" method="POST" action="../controller/deleteSchedulestController.php">
                                                <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                                <button type="button" class="btn btn-block ink-reaction btn-danger DELETE"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive height-10" style="overflow: auto;">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><h3 class="text-primary-dark">Student Schedules</h3></th>
                                    <th colspan="8" class="text-right"><button class="btn btn-primary" data-toggle="modal" data-target="#StudentSchedules"><i class="md md-save"></i></button></th>
                                </tr>
                                <tr>
                                    <th>Student</th>
                                    <th>Faculty</th>
                                    <th>Department</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Day</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($row = mysqli_fetch_assoc($query13)){ ?>
                                    <tr id="<?php echo $row["id"];?>">
                                        <td><?php echo $row["SfirstName"] ." ". $row["SlastName"];?></td>
                                        <td><?php echo $row["facultyName"];?></td>
                                        <td><?php echo $row["departmentName"];?></td>
                                        <td><?php echo $row["className"];?></td>
                                        <td><?php echo $row["subname"];?></td>
                                        <td><?php echo $row["day"];?></td>
                                        <td><?php echo $row["starttime"];?></td>
                                        <td><?php echo $row["endtime"];?></td>
                                        <td class="setting text-right">
                                            <a href="#" data-role='updated-Student-Schedule' data-id="<?php echo $row["id"];?>" data-target='StudentSchedules' class="btn btn-success"><i class="md md-edit"></i></a>
                                            <form class="delete_form" method="POST" action="../controller/deleteStudentSchedulestController.php">
                                                <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                                <button type="button" class="btn btn-block ink-reaction btn-danger DELETE"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!--end .row -->
        </div>
    </div>
</div>

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="Subjects" tabindex="-1" role="dialog" aria-labelledby="Subjects" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Subjects</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createSubjectController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" id="subject" required>
                                <label for="subject">Subjects</label>
                            </div>
                        </div>
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
<div class="modal subject fade" id="edit-subject" tabindex="-1" role="dialog" aria-labelledby="edit-subject" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Subjects</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/editSubjectController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" id="editSubject" required>
                                <label for="editSubject">Subjects</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" class="hidden" name="subjectID" id="subjectID" required>
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
<div class="modal Schedules fade" id="Schedules" tabindex="-1" role="dialog" aria-labelledby="Schedules" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createScheduleController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="teacherName" id="teacherName" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['firstName'] .' '. $row['lastName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="teacherName">Teacher</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="faculty" id="faculty-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="faculty-class">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="department" id="department-Schedule" class="form-control" disabled required></select>
                                <label for="department-Schedule">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="class" id="class-Schedule" class="form-control" disabled required></select>
                                <label for="class-Schedule">Class</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="subject" id="subject-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query4)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="subject-Schedule">Subject</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="day" id="day-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                                <label for="day-Schedule">Day</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StartTime" id="StartTime" class="form-control" required>
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="StartTime">StartTime</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="EndTime" id="EndTime" class="form-control" required>
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="EndTime">End Time</label>
                            </div>
                        </div>
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
<div class="modal EditSchedules fade" id="edit-Schedule" tabindex="-1" role="dialog" aria-labelledby="edit-Schedule" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/EditTeacherScheduleController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="teacherName" id="editteacherName" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query7)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['firstName'] .' '. $row['lastName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="editteacherName" id="TeacherName">Teacher: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="faculty" id="editfaculty-Schedule" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query8)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="editfaculty-class" id="fName">Faculty: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="department" id="editdepartment-Schedule" class="form-control" disabled></select>
                                <label for="editdepartment-Schedule" id="dName">Department: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="class" id="editclass-Schedule" class="form-control" disabled></select>
                                <label for="editclass-Schedule" id="cName">Class: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="subject" id="editsubject-Schedule" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query9)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="editsubject-Schedule" id="sName">Subject: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="day" id="editday-Schedule" class="form-control">
                                    <option value=""></option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                                <label for="editday-Schedule" id="dayName">Day: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StartTime" id="editStartTime" class="form-control">
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="editStartTime" id="sTime">StartTime: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="EndTime" id="editEndTime" class="form-control">
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                    <label for="editEndTime" id="eTime">End Time: </label>
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


<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal Schedules fade" id="StudentSchedules" tabindex="-1" role="dialog" aria-labelledby="StudentSchedules" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createStudentScheduleController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StudentName" id="StudentName" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query10)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['SfirstName'] .' '. $row['SlastName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="StudentName">Student</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="faculty" id="Sfaculty-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query11)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="Sfaculty-class">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="department" id="Sdepartment-Schedule" class="form-control" disabled required></select>
                                <label for="Sdepartment-Schedule">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="class" id="Sclass-Schedule" class="form-control" disabled required></select>
                                <label for="Sclass-Schedule">Class</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="subject" id="Ssubject-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query12)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="Ssubject-Schedule">Subject</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="day" id="Sday-Schedule" class="form-control" required>
                                    <option value=""></option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                                <label for="Sday-Schedule">Day</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StartTime" id="SStartTime" class="form-control" required>
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="SStartTime">StartTime</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="EndTime" id="SEndTime" class="form-control" required>
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="SEndTime">End Time</label>
                            </div>
                        </div>
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
<div class="modal SEditSchedules fade" id="edit-Student-Schedule" tabindex="-1" role="dialog" aria-labelledby="edit-Student-Schedule" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Schedule</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/EditStudentScheduleController.php">
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StudentName" id="editStudentName" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query14)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['SfirstName'] .' '. $row['SlastName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="editStudentName" id="StudentNames">Student: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="faculty" id="editSfaculty-Schedule" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query15)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="editSfaculty-class" id="SfName">Faculty: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="department" id="Seditdepartment-Schedule" class="form-control" disabled></select>
                                <label for="Seditdepartment-Schedule" id="SdName">Department: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="class" id="Seditclass-Schedule" class="form-control" disabled></select>
                                <label for="Seditclass-Schedule" id="ScName">Class: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="subject" id="Seditsubject-Schedule" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query16)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php } ?>
                                </select>
                                <label for="Seditsubject-Schedule" id="SsName">Subject: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="day" id="Seditday-Schedule" class="form-control">
                                    <option value=""></option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                </select>
                                <label for="Seditday-Schedule" id="SdayName">Day: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="StartTime" id="SeditStartTime" class="form-control">
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="SeditStartTime" id="SsTime">StartTime: </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="EndTime" id="SeditEndTime" class="form-control">
                                    <option value=""></option>
                                    <?PHP
                                    $start = strtotime('8:00 AM');
                                    $end   = strtotime('8:00 PM');
                                    ?>
                                    <?php for($i = $start; $i <= $end; $i += 2400){ ?>
                                        <option value='<?php echo date('G:i', $i); ?>'><?php echo date('G:i', $i); ?></option>;
                                    <?php } ?>
                                </select>
                                <label for="SeditEndTime" id="SeTime">End Time: </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="text" class="hidden" name="dataID" id="SdataID" required>
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
