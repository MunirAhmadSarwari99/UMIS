<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/examController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Exams</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#newExam"><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Exam Section</th>
                                <th>Chanse</th>
                                <th>Date</th>
                                <th class="setting">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query7)){ ?>
                            <tr>
                                <td><?php echo $row['facultyName'];?></td>
                                <td><?php echo $row['departmentName'];?></td>
                                <td><?php echo $row['className'];?></td>
                                <td><?php echo $row['subname'];?></td>
                                <td><?php echo $row['firstname'] .' '. $row['lastname'];?></td>
                                <td>
                                    <?php
                                        if ($row['examlevel'] == 1){echo 'Semi Final Exam';}
                                        else{echo 'Final Exam';}
                                    ?></td>
                                <td><?php echo $row['examChanse'];?></td>
                                <td><?php echo $row['examyDate'];?></td>
                                <td class="setting text-right">
                                    <a href="editExam.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteExamController.php">
                                        <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                        <button type="button" class="btn btn-block ink-reaction btn-danger DELETE"><i class="fa fa-trash-o"></i></button>
                                    </form>
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

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="newExam" tabindex="-1" role="dialog" aria-labelledby="newExam" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Exam</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/createExamController.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="faculty" id="ExamFaculty" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamFaculty">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="department" id="ExamDepartment" disabled required></select>
                                <label for="ExamDepartment">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="class" id="ExamClass" disabled required></select>
                                <label for="ExamClass">Class</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="teacher" id="ExamTeacher" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['firstName'] ." ". $row['lastName'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamTeacher">Teacher</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="subject" id="ExamSubject" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query6)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamSubject">Subject</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="level" id="ExamLevel" required>
                                    <option value=""></option>
                                    <option value="1">Semi Final Exam</option>
                                    <option value="2">Final Exam</option>
                                </select>
                                <label for="ExamLevel">Exam Section</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="chanse" id="ExamChanse" required>
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <label for="ExamChanse">Exam Chanse</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ExamDate">Exam Date</label>
                                <input type="date" class="form-control" name="ExamDate" id="ExamDate" required>
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
<?php include_once('../layouts/footer.php'); ?>
