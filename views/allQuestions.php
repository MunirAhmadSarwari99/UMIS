<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
include_once('../controller/allQuestionsController.php');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Questions</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
                    </div>
                </div>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="table-responsive height-10" style="overflow: auto;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>First Answer</th>
                                <th>Second Answer</th>
                                <th>Third Answer</th>
                                <th>Fourth Answer</th>
                                <th>Right Answer</th>
                                <th>Scores</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($Questions)) { ?>
                                <tr>
                                    <td><?php echo $row['Question']; ?></td>
                                    <td><?php echo $row['Answer1']; ?></td>
                                    <td><?php echo $row['Answer2']; ?></td>
                                    <td><?php echo $row['Answer3']; ?></td>
                                    <td><?php echo $row['Answer4']; ?></td>
                                    <td><?php echo $row['RightAnswer']; ?></td>
                                    <td><?php echo $row['Score']; ?></td>
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
