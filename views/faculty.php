<?php include_once('../layouts/header.php');
include_once('../controller/facultyController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Faculty</strong>
                <div class="tools">
                    <div class="btn-group">
                        <a class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></a>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target='#newFaculty'><i class="md md-save"></i></button>
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
                                        <input type="search" name="search" class="form-control" id="search-faculty" required>
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
                        <th>Faculy Name</th>
                        <th>Faculty Establishment Date</th>
                        <th class="setting text-right">Action</th>
                        </thead>
                        <tbody id="faculty-data">
                        <?php while ($row = mysqli_fetch_assoc($faculty)){ ?>
                            <tr>
                                <td><?php echo $row['facultyName']; ?></td>
                                <td><?php echo $row['facultydate']; ?></td>
                                <td class="setting text-right">
                                    <a href="facultydetails.php?id=<?php echo $row['id']; ?>" class="btn btn-primary-dark"><i class="md md-receipt"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteFacultyController.php">
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

<div class="modal fade" role="dialog" id="newFaculty">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Faculty</h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createNewFacultyController.php">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="facultyName" name="facultyName" required>
                                <label for="facultyName">Faculty Name</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="date" class="form-control" id="facultyDate" name="facultyDate" required>
                                <label for="facultyDate">Faculty Establishment Date</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="save" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('../layouts/footer.php'); ?>
