<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/EditExamController.php');
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Edit Exam</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <form class="form floating-label" method="POST" action="../controller/UpdateExamController.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="faculty" id="ExamFaculty">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['facultyName'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamFaculty">Faculty: <?php echo $rowData['facultyName'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="department" id="ExamDepartment" disabled></select>
                                <label for="ExamDepartment">Department: <?php echo $rowData['departmentName'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="class" id="ExamClass" disabled></select>
                                <label for="ExamClass">Class: <?php echo $rowData['className'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="teacher" id="ExamTeacher">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['firstName'] ." ". $row['lastName'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamTeacher">Teacher: <?php echo $rowData['firstName'] ." ". $rowData['lastName'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="subject" id="ExamSubject">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query6)){ ?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['subname'];?></option>
                                    <?php }?>
                                </select>
                                <label for="ExamSubject">Subject: <?php echo $rowData['subname'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="level" id="ExamLevel">
                                    <option value=""></option>
                                    <option value="1">Semi Final Exam</option>
                                    <option value="2">Final Exam</option>
                                </select>
                                <label for="ExamLevel">Exam Section:
                                    <?php
                                        if ($rowData['examlevel'] == 1){echo 'Semi Final Exam';}
                                        else{echo 'Final Exam';}
                                    ?>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="chanse" id="ExamChanse">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <label for="ExamChanse">Exam Chanse: <?php echo $rowData['examChanse'];?></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ExamDate">Exam Date</label>
                                <input type="date" class="form-control" name="ExamDate" value="<?php echo $rowData['examyDate'];?>" id="ExamDate" required>
                            </div>
                        </div>
                        <input type="hidden" name="examID" value="<?php echo $_GET['id']; ?>">
                        <button type="submit" class="btn btn-success pull-right">Save</button>
                    </div>
                </form>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
