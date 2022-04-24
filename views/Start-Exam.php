<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/StartExamController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Start Exam</strong>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <?php while ($row = mysqli_fetch_assoc($ExamDetails)) { ?>
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-md-3">
                                        <strong>Faculty</strong>
                                        <em><?php echo $row['facultyName']; ?></em>
                                        <br/>
                                        <strong>Department</strong>
                                        <em><?php echo $row['departmentName']; ?></em>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Class</strong>
                                        <em><?php echo $row['className']; ?></em>
                                        <br/>
                                        <strong>Subject</strong>
                                        <em><?php echo $row['subname']; ?></em>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Teacher</strong>
                                        <em><?php echo $row['firstName'] .' '. $row['lastName']; ?></em>
                                        <br/>
                                        <strong>Exam Section</strong>
                                        <em>
                                            <?php
                                            if ($row['examlevel'] == 1){echo 'Semi Final Exam';}
                                            else{echo 'Final Exam';}
                                            ?>
                                        </em>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Chanse</strong>
                                        <em><?php echo $row['examChanse']; ?></em>
                                        <br/>
                                        <strong>Date</strong>
                                        <em><?php echo $row['examyDate']; ?></em>
                                    </div>
                                    <?php
                                        $counts = mysqli_query($DBCONNECTION,"SELECT COUNT(examaq.onlineExamid) AS Total FROM examaq WHERE examaq.onlineExamid =" . $row['id']);
                                    ?>
                                    <div class="col-md-3">
                                        <strong>Total Answers</strong>
                                        <?php while ($count = mysqli_fetch_assoc($counts)) { ?>
                                            <em class="total"><?php echo $count["Total"]; ?></em>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>
                <?php while ($rows = mysqli_fetch_assoc($Exam)) { ?>
                        <div class="row function">
                            <div class="card">
                                <div class="card-body">
                                        <div class="title"><strong><?php echo $rows['Question']; ?></strong>
                                            <sup>Score <?php echo $rows['Score']; ?></sup>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="radio" class="answer" name="<?php echo $rows['id']; ?>" value="<?php echo $rows['Answer1']; ?>">
                                                    <strong><?php echo $rows['Answer1']; ?></strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="radio" class="answer" name="<?php echo $rows['id']; ?>" value="<?php echo $rows['Answer2']; ?>">
                                                    <strong><?php echo $rows['Answer2']; ?></strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="radio" class="answer" name="<?php echo $rows['id']; ?>" value="<?php echo $rows['Answer3']; ?>">
                                                    <strong><?php echo $rows['Answer3']; ?></strong>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="checkbox checkbox-styled">
                                                <label>
                                                    <input type="radio" class="answer" name="<?php echo $rows['id']; ?>" value="<?php echo $rows['Answer4']; ?>">
                                                    <strong><?php echo $rows['Answer4']; ?></strong>
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="SubjectID" class="SubjectID" value="<?php echo $_GET['SubjectID']; ?>">
                            <input type="hidden" name="AnswerID" class="AnswerID" value="<?php echo $rows['id']; ?>">
                            <input type="hidden" name="Student" class="Student" value="<?php echo $StudentID['id']; ?>">
                        </div>
                    </div>
                <?php } ?>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
