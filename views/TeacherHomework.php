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
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#modalName"><i class="md md-save"></i></button>
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="row">
                    <div class="col-lg-12">
                        <?php while ($row = mysqli_fetch_assoc($homework)) { ?>
                            <div class="col-md-6">
                                <div class="card card-bordered style-primary">
                                    <div class="card-head">
                                        <div class="tools">
                                            <div class="btn-group">
                                                <a href="../public/Storage/File/<?php echo $row['Homework']; ?>" target="_blank" class="btn btn-icon-toggle"><i class="md md-cloud-download"></i></a>
                                                <a class="delete_form btn btn-icon-toggle DELETE">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form class="delete_form hidden" method="POST" action="../controller/deleteHomeworkController.php">
                                                    <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                                </form>
                                                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                                            </div>
                                        </div>
                                        <header><img src="../public/images/pdf.png" class="width-1" alt="">  <?php echo $row['Homework']; ?></header>
                                    </div><!--end .card-head -->
                                    <div class="card-body style-default-bright">
                                        <div class="row">
                                            <h3> Replay Homework</h3>
                                            <?php if ($row['UploadHomework'] != null) { ?>
                                                <img src="../public/images/pdf.png" class="width-1" alt=""> <?php echo $row['UploadHomework']; ?>
                                                <a href="../public/Storage/File/<?php echo $row['UploadHomework']; ?>" target="_blank" class="btn btn-icon-toggle btn-primary"><i class="md md-cloud-download"></i></a>
                                            <?php } ?>
                                        </div>
                                        <div class="row">&nbsp;</div>
                                    </div><!--end .card-body -->
                                </div><!--end .card -->
                            </div>
                        <?php } ?>
                    </div>




                    <?php while ($row = mysqli_fetch_assoc($homework)) { ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body no-padding">
                                    <ul class="list">
                                        <li class="divider-full-bleed"></li>
                                        <li class="tile">
                                            <a class="tile-content ink-reaction">
                                                <div class="tile-icon">
                                                    <img src="../public/images/pdf.png" alt="">
                                                </div>
                                                <div class="tile-text">
                                                    <?php echo $row['Homework']; ?>
                                                </div>
                                            </a>
                                            <a  href="../public/Storage/File/<?php echo $row['Homework']; ?>" target="_blank" class="btn btn-flat ink-reaction btn-default">
                                                <i class="md md-file-download"></i>
                                            </a>
                                            <a class="delete_form btn btn-flat ink-reaction btn-default DELETE">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form class="delete_form hidden" method="POST" action="../controller/deleteHomeworkController.php">
                                                <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                            </form>
                                        </li>
                                    </ul>
                                </div><!--end .card-body -->
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div><!--end .row -->
        </div>
    </div>
</div>

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="modalName" tabindex="-1" role="dialog" aria-labelledby="modalName" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Add Homework</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/AddHomeworkController.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="HomeworkFaculty" name="faculty" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($faculty)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="HomeworkFaculty">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="HomeworkDepartment" name="department" class="form-control" disabled>
                                    <option value=""></option>
                                </select>
                                <label for="HomeworkDepartment">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="HomeworkClass" name="class" class="form-control" disabled>
                                    <option value=""></option>
                                </select>
                                <label for="HomeworkClass">Class</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="HomeworkSubject" name="subject" class="form-control">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($subject)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['subname']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="HomeworkSubject">Subject</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <button type="button" class="btn btn-primary btn-homework"><span class="fa fa-file-pdf-o"></span> Homework</button>
                                <input type="file" class="hidden select-homework" name="homework"  accept="application/pdf">
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
