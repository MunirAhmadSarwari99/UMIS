<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/studentFeesController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Student Fees</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#modalName"><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                            <th>Student Name</th>
                            <th>Faculty</th>
                            <th>Amount</th>
                            <th>Mount</th>
                            <th>Date</th>
                            <th>Pay</th>
                            <th class="text-right setting">Action</th>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($query)){ ?>
                            <tr id="<?php echo $row['id']; ?>">
                                <td data-target="fullName"><?php echo $row['SfirstName'] .''. $row['SlastName']; ?></td>
                                <td data-target="facultyName"><?php echo $row['facultyName']; ?></td>
                                <td data-target="amount"><?php echo $row['amount']; ?></td>
                                <td data-target="mounth"><?php echo $row['mounth']; ?></td>
                                <td data-target="paydate"><?php echo $row['paydate']; ?></td>
                                <td>
                                    <?php if ($row['pay'] == 1){ ?>
                                        <span class="md md-verified-user text-primary"></span>
                                    <?php }else{ ?>
                                        <span class="md md-warning text-warning"></span>
                                    <?php }?>
                                </td>
                                <td data-target="payment" class="hidden"><?php echo $row['pay']; ?></td>
                                <td class="text-right setting">
                                    <a href="#" data-role="editFess" data-id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#Edit" class="btn btn-primary"><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteStudentFessController.php">
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
<div class="modal fade" id="modalName" tabindex="-1" role="dialog" aria-labelledby="modalName" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Pay Student Fees</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/PayFess.php" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="facultyName" id="facultyName" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="facultyName">faculty</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="student" id="Student" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['SfirstName'] ." ". $row['SlastName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="Student"> Student</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="amount" name="amount" required>
                                <label for="amount"> Amount</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="mounth" id="mounth" required>
                                    <option value=""></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="February">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <label for="mounth">Month</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paydate"> Payment Date</label>
                                <input type="date" class="form-control" id="paydate" name="paydate" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <span>Pay</span> &nbsp;<input type="checkbox" name="pay" value="1" checked>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success"><i class="md md-payment"></i> Pay</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT PROFILE MODAL MARKUP -->

<!-- BEGIN EDIT PROFILE MODAL MARKUP -->
<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="Edit" aria-hidden="true"s>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Payment</h4>
            </div>
            <div class="modal-body">
                <form class="form floating-label" method="POST" action="../controller/EditPayFess.php" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="facultyName" id="faculty">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query5)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['facultyName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="faculty" id="Ffaculty"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control" name="student" id="StudentName">
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query4)){ ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['SfirstName'] ." ". $row['SlastName']; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="StudentName" id="stName"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" id="amounts" name="amount">
                                <label for="amounts" id="FAmount"></label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select class="form-control" name="mounth" id="mount">
                                    <option value=""></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="February">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <label for="mount" id="Fmount"></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="paydates"> Payment Date</label>
                                <input type="date" class="form-control" id="paydates" name="paydate" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <span>Pay</span> &nbsp;<input type="checkbox" id="pay" name="pay" value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="dataID" id="dataID" required>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success"><i class="md md-payment"></i> Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT PROFILE MODAL MARKUP -->
<?php include_once('../layouts/footer.php'); ?>
