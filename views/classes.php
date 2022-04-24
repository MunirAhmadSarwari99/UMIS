<?php
include_once('../layouts/header.php');
include_once('../controller/classController.php');
include_once('../controller/facultyController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Classes</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target='#newClass'><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="row" id="search-bar">
                    <div class="col-md-4 pull-right">
                        <form class="form" role="form">
                            <div class="form-group floating-label">
                                <div class="input-group">
                                    <div class="input-group-btn"></div>
                                    <div class="input-group-content">
                                        <input type="search" name="search" class="form-control" id="search-class" required>
                                        <label for="search">Search.....</label>
                                    </div>
                                </div>
                            </div><!--end .form-group -->
                        </form>
                    </div>
                </div>
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Class Name</th>
                            <th>Faculty Name</th>
                            <th>Department Name</th>
                            <th>Semester</th>
                            <th class="setting text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody id="class-data">
                        <?php while ($row = mysqli_fetch_assoc($class)){ ?>
                        <tr id="<?php echo $row['id']; ?>">
                            <td data-target="className"><?php echo $row['className']; ?></td>
                            <td data-target="facultyName"><?php echo $row['facultyName']; ?></td>
                            <td data-target="departmentName"><?php echo $row['departmentName']; ?></td>
                            <td data-target="semester"><?php echo $row['semester']; ?></td>
                            <td class="setting text-right">
                                <a href="javascript:void(0);" data-role="EditClass" data-id="<?php echo $row['id']; ?>" class="btn btn-success" data-toggle="modal" data-target='#myModal'><i class="md md-edit"></i></a>
                                <form class="delete_form" method="POST" action="../controller/deleteClassController.php">
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
                <form class="form" method="POST" action="../controller/editClassController.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="className" name="className"
                                       value="">
                                <label for="className">Class Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label id="faculty-Name"></label>
                            <div class="form-group">
                                <select name="faculty" class="form-control" id="faculty-class">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($faculty)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="faculty">Faculty</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label id="department-Name"></label>
                            <div class="form-group">
                                <select name="department" class="form-control" id="department-class" disabled></select>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label id="semesterNo"></label>
                            <div class="form-group">
                                <select class="form-control" id="semester" name="semester">
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                </select>
                                <label for="semester">Semester</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="classID" id="classID" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="newClass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createClassController.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="classNames" name="className" required>
                                <label for="className">Class Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="faculty" class="form-control" id="faculty-classes" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($facultys)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="faculty">Faculty</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select name="department" class="form-control" id="department-classes" disabled required></select>
                                <label for="department">Department</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select class="form-control" id="semesters" name="semester" required>
                                    <option value=""></option>
                                    <option value="1">1</option>
                                    <option value="5">5</option>
                                </select>
                                <label for="semester">Semester</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
