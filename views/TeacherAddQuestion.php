<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/TeacherQuestionController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Questions</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                    <div class="row">
                        <?php while ($row = mysqli_fetch_assoc($OnlineExam)){ ?>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <ul class="list">
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text">Faculty: <?php echo $row['facultyName']; ?></div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text">Department: <?php echo $row['departmentName']; ?></div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text">Class: <?php echo $row['className']; ?></div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-text">Subject: <?php echo $row['subname']; ?></div>
                                            </a>
                                        </li>
                                        <li class="tile">
                                            <a class="tile-content">
                                                <div class="">
                                                    <form class="form floating-label" method="POST" action="../controller/AddTeacherQuestionController.php">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Question<?php echo $row['id']; ?>" name="Question" class="form-control" required>
                                                                    <label for="Question<?php echo $row['id']; ?>">Question</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Score<?php echo $row['id']; ?>" name="Score" class="form-control" required>
                                                                    <label for="Score<?php echo $row['id']; ?>">Score</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Answer1<?php echo $row['id']; ?>" name="FirstAnswer" class="form-control" required>
                                                                    <label for="Answer1<?php echo $row['id']; ?>">The First Answer</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Answer2<?php echo $row['id']; ?>" name="SecondAnswer" class="form-control" required>
                                                                    <label for="Answer2<?php echo $row['id']; ?>">The Second Answer</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Answer3<?php echo $row['id']; ?>" name="ThirdAnswer" class="form-control" required>
                                                                    <label for="Answer3<?php echo $row['id']; ?>">The Third Answer</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="Answer4<?php echo $row['id']; ?>" name="FourthAnswer" class="form-control" required>
                                                                    <label for="Answer4<?php echo $row['id']; ?>">The Fourth Answer</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="tex" id="RightAnswer<?php echo $row['id']; ?>" name="RightAnswer" class="form-control" required>
                                                                    <label for="RightAnswer<?php echo $row['id']; ?>">Right Answer</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <input type="hidden" name="examid" value="<?php echo $row['id']; ?>">
                                                                   <input type="submit" class="btn btn-primary" value="Add">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <a href="../views/allQuestions.php?Questions=<?php echo $row['id']; ?>" class="btn btn-primary-dark">Questions</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                <!--end .row -->
            </div>
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
