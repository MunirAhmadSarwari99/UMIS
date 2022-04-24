<?php
include_once('../layouts/header.php');
include_once('../controller/staffController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">All Staffs</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <a href="newUser.php" class="btn btn-floating-action btn-primary"><i class="md md-save"></i></a>
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
                                        <input type="search" name="search" class="form-control" id="search-staff" required>
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
                            <th>Image</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th class="setting text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="staff-data">
                        <?php while ($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <td><img class="img-circle width-1" src="<?php if ($row['image'] == 'default.png') { echo "../public/images/" . $row['image'];} else {echo "../public/Storage/Staff/" . $row['image'];} ?>" alt="" /></td>
                            <td><?php echo $row['firstName']; ?></td>
                            <td><?php echo $row['lastName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php if ($row['gender'] == 0) {echo 'Male';} else{echo 'Female';} ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td class="setting text-right">
                                <a href="staffdetails.php?id=<?php echo $row['id']; ?>" class="btn btn-primary-dark"><i class="md md-receipt"></i></a>
                                <form class="delete_form" method="POST" action="../controller/deleteStaffController.php">
                                    <span class="hidden userID"><?php echo $row['userid']; ?></span>
                                    <input type="hidden" class="Delete" value="<?php echo $row['id']; ?>" name="id"  required>
                                    <button type="button" class="btn btn-block ink-reaction btn-danger DELETEStaff"><i class="fa fa-trash-o"></i></button>
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
<?php include_once('../layouts/footer.php'); ?>
