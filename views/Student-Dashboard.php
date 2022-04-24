<?php
include_once('../layouts/header.php');
include_once('../controller/StudentScheduleController.php');
$flash->flash();
?>
    <div class="row">

        <!-- BEGIN ALERT - REVENUE -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="8" class="text-left"><strong class="text-lg text-accent">Schedule</strong></th>
                            </tr>
                            <tr>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Day</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while ($row = mysqli_fetch_assoc($Schedule)){ ?>
                                <tr>
                                    <td><?php echo $row["facultyName"];?></td>
                                    <td><?php echo $row["departmentName"];?></td>
                                    <td><?php echo $row["className"];?></td>
                                    <td><?php echo $row["subname"];?></td>
                                    <td><?php echo $row["day"];?></td>
                                    <td><?php echo $row["starttime"];?></td>
                                    <td><?php echo $row["endtime"];?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!--end .col -->
        <!-- END ALERT - REVENUE -->


    </div><!--end .row -->
<?php include_once('../layouts/footer.php'); ?>