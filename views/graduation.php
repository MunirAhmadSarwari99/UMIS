<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/graduationController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Student Graduation</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#new-graduation"><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Graduation Year</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td data-target="fullName"><?php echo $row['SfirstName'] .' '. $row['SlastName']; ?></td>
                                <td data-target="facultyName"><?php echo $row['facultyName']; ?></td>
                                <td data-target="departmentName"><?php echo $row['departmentName']; ?></td>
                                <td data-target="graduation"><?php echo $row['graddate']; ?></td>
                                <td class="setting text-right">
                                    <a href="#" data-role="EditGraduation" data-id="<?php echo $row['id']; ?>" data-role="EditClass" data-id="<?php echo $row['id']; ?>" class="btn btn-success" data-toggle="modal" data-target='#edit-graduation'><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteGraduationController.php">
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
<div class="modal fade" id="new-graduation" tabindex="-1" role="dialog" aria-labelledby="new-graduation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Student Graduation</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/creategraduationController.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="student" id="GStudent" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query1)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['SfirstName'] ." ". $row['SlastName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="GStudent">Student</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="faculty" id="GFaculty" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="GFaculty">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="GDepartment" id="GDepartment" disabled required></select>
                                <label for="GDepartment">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gDate">Graduation Date</label>
                                <input type="date" class="form-control" name="gDate" id="gDate" required>
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
<div class="modal editGraduation fade" id="edit-graduation" tabindex="-1" role="dialog" aria-labelledby="edit-graduation" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Student Graduation</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/EditgraduationController.php">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="student" id="EditGStudent">
                                    <option></option>
                                    <?php while ($row = mysqli_fetch_assoc($query4)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['SfirstName'] ." ". $row['SlastName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="GStudent" id="GStudentName">Student</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="faculty" id="EditGFaculty">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query5)){?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="GFaculty" id="GFacultyName">Faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="GDepartment" id="EditGDepartment" disabled></select>
                                <label for="GDepartment" id="GDepartmentName">Department</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gDate" id="GDate">Graduation Date</label>
                                <input type="date" class="form-control" name="gDate" id="EditGDate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="dataID" id="dataID">
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
