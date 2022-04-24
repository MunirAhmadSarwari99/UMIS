<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/TeacherHomeworkController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Homework</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="row">
                    <?php while ($row = mysqli_fetch_assoc($homework)) { ?>
                        <div class="col-md-6">
                            <div class="card card-bordered style-primary">
                                <div class="card-head">
                                    <div class="tools">
                                        <div class="btn-group">
                                            <a href="../public/Storage/File/<?php echo $row['Homework']; ?>" target="_blank" class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                            <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                        </div>
                                    </div>
                                    <header><img src="../public/images/pdf.png" class="width-1" alt=""> <?php echo $row['Homework']; ?></header>
                                </div><!--end .card-head -->
                                <div class="card-body style-default-bright">
                                    <div class="row">
                                        <h3> Replay Homework</h3>
                                        <?php if ($row['UploadHomework'] != null) { ?>
                                            <img src="../public/images/pdf.png" class="width-1" alt=""> <?php echo $row['UploadHomework']; ?>
                                        <?php } ?>
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <form method="POST" action="../controller/ReplayHomeworkController.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-primary btn-homework"><span class="fa fa-file-pdf-o"></span> Replay Homework</button>
                                                    <input type="file" class="hidden select-homework" name="ReplayHomework"  accept="application/pdf">
                                                    <input type="hidden" name="HomeworkID" value="<?php echo $row['id']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary-dark">Send</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                            <em class="text-caption">Upon completion of homework, upload your file in pdf format.</em>
                        </div>
                    <?php } ?>
                </div>
            </div><!--end .row -->
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
