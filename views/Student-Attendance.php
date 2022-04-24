<?php
include_once('../layouts/header.php');
include_once('../controller/Student_AttendanceController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Attendance</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Year</th>
                            <th>Month</th>
                            <th>Day</th>
                            <th>Attendance</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php while ($row = mysqli_fetch_assoc($attendance)){ ?>
                            <tr>
                                <td><?php echo $row["attYear"]; ?></td>
                                <td><?php echo $row["attMonth"]; ?></td>
                                <td><?php echo $row["attday"]; ?></td>
                                <td>
                                    <?php
                                    if ($row["attr"] == 1){
                                        echo "<small class='md md-verified-user text-success'> Present</small>";
                                    }elseif ($row["attr"] == 2){
                                        echo "<small class='md md-local-hotel text-warning'> Sick</small>";
                                    }elseif ($row["attr"] == 3){
                                        echo "<small class='md md-star-half text-primary'> Necessary</small>";
                                    }else{
                                        echo "<small class='md md-cancel text-danger'> Absences</small>";
                                    }
                                    ?>
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
                <h4 class="modal-title" id="textModalLabel">Title</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="../controller" >
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
