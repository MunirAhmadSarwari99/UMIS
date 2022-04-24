<?php
include_once('../layouts/header.php');
include_once('../controller/CounterController.php');
$flash->flash();
?>
    <div class="row">

        <!-- BEGIN ALERT - REVENUE -->
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-info no-margin">
                        <?php while ($row = mysqli_fetch_assoc($users)){ ?>
                        <strong class="text-xl">User: <?php  echo $row["TotalUser"]; ?></strong><br/>
                        <?php } ?>
                        <span class="opacity-100">&nbsp;</span>
                        <div class="stick-bottom-left-right">
                            <div class="height-2 sparkline-revenue" data-line-color="#bdc1c1"></div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
        <!-- END ALERT - REVENUE -->

        <!-- BEGIN ALERT - VISITS -->
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-warning no-margin">
                        <?php while ($row = mysqli_fetch_assoc($staff)){ ?>
                            <strong class="text-xl">Staff: <?php  echo $row["TotalStaff"]; ?></strong><br/>
                        <?php } ?>
                        <span class="opacity-50">&nbsp;</span>
                        <div class="stick-bottom-right">
                            <div class="height-1 sparkline-visits" data-bar-color="#e5e6e6"></div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
        <!-- END ALERT - VISITS -->

        <!-- BEGIN ALERT - BOUNCE RATES -->
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-danger no-margin">
                        <?php while ($row = mysqli_fetch_assoc($teacher)){ ?>
                            <strong class="text-xl">Teacher: <?php  echo $row["TotalTeacher"]; ?></strong><br/>
                        <?php } ?>
                        <span class="opacity-50">&nbsp;</span>
                        <div class="stick-bottom-left-right">
                            <div class="progress progress-hairline no-margin">
                                <div class="progress-bar progress-bar-danger" style="width:43%"></div>
                            </div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
        <!-- END ALERT - BOUNCE RATES -->

        <!-- BEGIN ALERT - BOUNCE RATES -->
        <div class="col-md-3 col-sm-6">
            <div class="card">
                <div class="card-body no-padding">
                    <div class="alert alert-callout alert-primary no-margin">
                        <?php while ($row = mysqli_fetch_assoc($student)){ ?>
                            <strong class="text-xl">Student: <?php  echo $row["TotalStudent"]; ?></strong><br/>
                        <?php } ?>
                        <span class="opacity-50">&nbsp;</span>
                        <div class="stick-bottom-left-right">
                            <div class="progress progress-hairline no-margin">
                                <div class="progress-bar progress-bar-primary-dark" style="width:43%"></div>
                            </div>
                        </div>
                    </div>
                </div><!--end .card-body -->
            </div><!--end .card -->
        </div><!--end .col -->
        <!-- END ALERT - BOUNCE RATES -->
        <!-- END ALERT - TIME ON SITE -->

    </div>
    <!--end .row -->
<?php include_once('../layouts/footer.php'); ?>