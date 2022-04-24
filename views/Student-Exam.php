<?php
include_once('../layouts/header.php');
include_once('../controller/StudentViewExamSubjectsController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Exam</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($Subjects)) { ?>
                        <!-- BEGIN ALERT - REVENUE -->
<!--                        --><?php
//                        $GetExamStudentID = mysqli_query($DBCONNECTION, "SELECT getexam.SubjectID FROM getexam WHERE getexam.SubjectID =" . $row['id']);
//                        ?>
<!--                        --><?php //while ($data = mysqli_fetch_assoc($GetExamStudentID)) { ?>
<!--                            --><?php //if ($data['SubjectID'] == $row['id']){ ?>
<!--                                <style>-->
<!--                                    .isDisabled {-->
<!--                                        pointer-events: none;-->
<!--                                    }-->
<!--                                </style>-->
<!--                            --><?php //}else{ ?>
<!--                                    <style>-->
<!--                                        .isDisabled {-->
<!--                                            pointer-events: auto;-->
<!--                                        }-->
<!--                                    </style>-->
<!--                            --><?php //} ?>
<!--                        --><?php //} ?>
                        <a class="isDisabled" href="Start-Exam.php?SubjectID=<?php echo  $row["subjectid"]; ?>">
                            <div class="col-md-3 col-sm-6">
                                <div class="card">
                                    <div class="card-body no-padding">
                                        <div class="alert alert-callout alert-info no-margin">
                                            <strong class="text-xl">Exam:
                                                <?php echo $row["subname"]; ?>
                                            </strong><br/>
                                            <?php
                                            $GetStudentID = mysqli_query($DBCONNECTION,"SELECT student.id, student.classid FROM student INNER JOIN users ON users.id = student.userid WHERE users.id  =" . $_SESSION["loginSuccessID"]);
                                            $StudentID = mysqli_fetch_assoc($GetStudentID);
                                            $query = mysqli_query($DBCONNECTION, "SELECT SUM(getexam.Scores) AS TotalScore  FROM getexam INNER JOIN examaq ON examaq.id = getexam.examAQid INNER JOIN onlineexam ON onlineexam.id = examaq.onlineExamid WHERE onlineexam.subjectid =" . $row["subjectid"] ." AND getexam.studentid =" . $StudentID['id']);
                                            ?>
                                            <?php while ($Scores = mysqli_fetch_assoc($query)) { ?>
                                                <span class="opacity-100">Scores: <?php echo $Scores["TotalScore"]; ?></span>
                                            <?php } ?>
                                            <div class="stick-bottom-left-right">
                                                <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                                            </div>
                                        </div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div><!--end .col -->
                        </a>
                        <!-- END ALERT - REVENUE -->
                    <?php } ?>
                </div>
                <!--end .row -->
                <div class="card">
                    <div class="card-body text-center style-primary fa-2x shadow">
                        <?php
                        $query = mysqli_query($DBCONNECTION, "SELECT SUM(getexam.Scores) AS TotalScore FROM getexam INNER JOIN examaq ON examaq.id = getexam.examAQid INNER JOIN onlineexam ON onlineexam.id = examaq.onlineExamid WHERE getexam.studentid =" . $StudentID['id']);
                        $subjects = mysqli_query($DBCONNECTION, "SELECT COUNT(onlineexam.subjectid) AS Subjects FROM onlineexam WHERE onlineexam.classid =" . $StudentID['classid']);
                        $ExamLevels = mysqli_query($DBCONNECTION, "SELECT onlineexam.examlevel FROM onlineexam WHERE onlineexam.classid =" . $StudentID['classid']);
                        $ExamLevel = mysqli_fetch_assoc($ExamLevels);
                        ?>
                        <?php while ($Scores = mysqli_fetch_assoc($query)) { ?>
                            <?php while ($subject = mysqli_fetch_assoc($subjects)) { ?>
                                <?php if ($subject["Subjects"] != 0){ ?>
                                    <?php $i = $Scores["TotalScore"] / $subject["Subjects"]; ?>
                                    <span class="opacity-100">Total Score: <?php echo $Scores["TotalScore"] ." / ".  $i ." % in "; if ($ExamLevel['examlevel'] == 1){echo 'Semi Final Exam';}else{echo 'Final Exam';} ?></span>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
