<?php
include_once('../layouts/header.php');
include_once('../controller/departmentController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Departments</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal"
                                data-target='#newDepartment'><i class="md md-save"></i></button>
                        <a href="faculty.php" class="btn btn-floating-action btn-primary"><i
                                    class="md md-reply-all"></i></a>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                        <h3>Faculty Name: <?php echo $faculty['facultyName']; ?></h3>
                        <tr>
                            <th>Department Name</th>
                            <th>Department Establishment Date</th>
                            <th class="setting text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($department)) { ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td class="hidden" data-target="departmentID"><?php echo $row['id']; ?></td>
                                <td data-target="departmentName"><?php echo $row['departmentName']; ?></td>
                                <td data-target="regdate"><?php echo $row['regdate']; ?></td>
                                <td class="setting text-right">
                                    <a href="javascript:void(0);" data-role="EditFacultyDepartment"
                                       data-id="<?php echo $row['id']; ?>" class="btn btn-success"
                                       data-toggle="modal" data-target='#myModal'><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteDepartmentController.php">
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

<div class="modal fade" role="dialog" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/EditFacultyDepartmentController.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="facultyName" name="facultyName"
                                       value="<?php echo $faculty['facultyName']; ?>" required>
                                <label for="facultyName">Faculty Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="date" class="form-control" id="facultyDate" name="facultyDate"
                                       value="<?php echo $faculty['facultydate']; ?>" required>
                                <label for="facultyDate">Faculty Establishment Date</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="departmentName" name="departmentName" required>
                                <label for="departmentName">Department Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="date" class="form-control" id="departmentDate" name="departmentDate" required>
                                <label for="departmentDate">Department Establishment Date</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="facultyID" value="<?php echo $faculty['id']; ?>" required>
                <input type="hidden" name="departmentID" id="dpID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="newDepartment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Department For Faculty / <?php echo $faculty['facultyName']; ?></h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createFacultyDepartmentController.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="departmentName" name="departmentName" required>
                                <label for="departmentName">Department Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="date" class="form-control" id="departmentDate" name="departmentDate" required>
                                <label for="departmentDate">Department Establishment Date</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="facultyID" value="<?php echo $faculty['id']; ?>" required>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
