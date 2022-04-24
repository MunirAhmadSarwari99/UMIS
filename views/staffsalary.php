<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/staffSalaryController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Staff Salary</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#new-attr"><i class="md md-save"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Bonus</th>
                                <th>Absences</th>
                                <th>Total</th>
                                <th>Pay</th>
                                <th class="setting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="staff-data">
                            <?php while ($row = mysqli_fetch_assoc($query)){ ?>
                            <tr id="<?php echo $row["id"];?>">
                                <td data-target="firstName"><?php echo $row["firstName"];?></td>
                                <td data-target="lastName"><?php echo $row["lastName"];?></td>
                                <td data-target="amount"><?php echo $row["amount"]; ?></td>
                                <td data-target="salaryDate"><?php echo $row["salaryDate"]; ?></td>
                                <td data-target="bonus"><?php echo $row["bonus"]; ?></td>
                                <td data-target="Absences"><?php echo $row["Absences"] . " Day";?></td>
                                <?php
                                $amount = $row["amount"];
                                $bonus = $row["bonus"];
                                $absences = $row["Absences"];
                                $total = null;
                                if($bonus == 0 && $absences == 0){
                                    $total = $amount;
                                }elseif ($bonus != 0 && $absences == 0){
                                    $total = $amount + $bonus;
                                }elseif ($bonus != 0 && $absences != 0){
                                    $val1 = $amount + $bonus;
                                    $val2 = $absences * 20;
                                    $total = $val1 - $val2;
                                }elseif ($bonus == 0 && $absences != 0){
                                    $val3 = $absences * 20;
                                    $total = $amount - $val3;
                                }
                                ?>
                                <td><strong class="text-lg text-accent"><?php echo $total;?></strong></td>
                                <td class="hidden" data-target="pay"><?php echo $row["pay"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["pay"] == 1){
                                        echo "Yes &nbsp; <small class='md md-verified-user'></small>";
                                    }else{
                                        echo "No &nbsp; <small class='md md-cancel' style='color: red;'></small>";
                                    }
                                    ?>
                                </td>
                                <td class="setting text-right">
                                    <a href="#" data-role='edit-staff-salary' data-id="<?php echo $row["id"];?>" data-target='edit-staff-salary' class="btn btn-success"><i class="md md-edit"></i></a>
                                    <form class="delete_form" method="POST" action="../controller/deleteStaffSalaryController.php">
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
<div class="modal fade" id="new-attr" tabindex="-1" role="dialog" aria-labelledby="new-attr" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">New Staff Salary</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/createStaffSalaryController.php" enctype="multipart/form-data">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="staffName" class="form-control" id="staffName" required>
                                    <option value=""></option>
                                    <?php while ($row = mysqli_fetch_assoc($query2)){ ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["firstName"] ." ". $row["lastName"]; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="staffName">Staff Name</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="amount" class="form-control" id="amount" required>
                                <label for="amount">Amount</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="date" name="salaryDate" class="form-control" id="salaryDate" required>
                                <label for="salaryDate">salary Date</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="number" name="bonus" class="form-control" min="100" max="500" id="bonus">
                                <label for="bonus">Bonus</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="absences" class="form-control" id="absences" required>
                                <label for="absences">Absences</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="pay" value="1" checked><span>Pay</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" name="pay" value="0"><span>Not Pay</span>
                                    </label>
                                </div>
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
<div class="modal StaffSalary fade" id="edit-staff-salary" tabindex="-1" role="dialog" aria-labelledby="edit-staff-salary" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="textModalLabel">Edit Staff Salary</h4>
                <h5 id="sName" class="text-center text-primary"></h5>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller/EditStaffSalaryController.php">
                    <br>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <select name="staffName" class="form-control" id="staffNames">
                                    <option></option>
                                    <?php while ($row = mysqli_fetch_assoc($query3)){ ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["firstName"] ." ". $row["lastName"]; ?></option>
                                    <?php } ?>
                                </select>
                                <label for="staffName">Staff Name</label>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" name="amount" class="form-control" id="amounts">
                                <label for="amount">Amount</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="date" name="salaryDate" class="form-control" id="salaryDates">
                                <label for="salaryDate">salary Date</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="number" name="bonus" class="form-control" min="100" max="500" id="bonuses">
                                <label for="bonus">Bonus</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="absences" class="form-control" id="absencess">
                                <label for="absences" id="absencesv">Absences</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" id="payd" name="pay" value="1"><span>Pay</span>
                                    </label>
                                    <label class="radio-inline radio-styled">
                                        <input type="radio" id="notpayd" name="pay" value="0"><span>Not Pay</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="text" class="hidden" name="dataID" id="dataID">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- END EDIT Salary MODAL MARKUP -->
<?php include_once('../layouts/footer.php'); ?>
