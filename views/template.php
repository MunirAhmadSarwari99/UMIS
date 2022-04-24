<?php
include_once('../layouts/header.php');
include_once('../database/DBConnect.php');
//include_once('../controller/');
$flash->flash();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card card-printable style-primary">
            <div class="card-head">
                <strong class="title-card-head">Simpal Text</strong>
                <div class="tools">
                    <div class="btn-group">
                        <button class="btn btn-floating-action btn-primary" href="javascript:void(0);" onclick="javascript:window.print();"><i class="md md-print"></i></button>
                        <button class="btn btn-floating-action btn-primary" data-toggle="modal" data-target="#modalName"><i class="md md-save"></i></button>
                        <button class="btn btn-floating-action btn-primary" onclick="window.history.back();"><i class="md md-reply-all"></i></button>
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
                                        <input type="search" name="search" class="form-control" id="search-Name">
                                        <label for="search">Search.....</label>
                                    </div>
                                </div>
                            </div><!--end .form-group -->
                        </form>
                    </div>
                </div>
                <div class="table-responsive height-10" style="overflow: auto;">

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
