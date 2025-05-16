<?php
define("PAGE", "Notice");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>Notice Section:</h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddNotice" class="btn btn-success float-right mb-3"> <i class="bi bi-plus-square mr-2"></i>Add Notice</button>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div id="LoadNoticeContent">
                            <!-- Load notice content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="AddNotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="NoticeForm">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Notice</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group clearfix">
                            <label for="">Notice Title:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Notice Title">
                            <div class="form-group mt-3">
                                <div class="icheck-danger d-inline">
                                    <input type="checkbox" id="FileCheckBox" checked>
                                    <label for="FileCheckBox">
                                        Attatch File
                                    </label>
                                </div>
                            </div>
                            <div id="notice_link">
                                <label for="">Notice Link:<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="link" id="link" placeholder="Notice Link">
                            </div>
                            <div id="notice_file">
                                <label for="">Notice File:<span class="text-danger">*</span></label>
                                <input type="file" name="notice_file" id="notice_file" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Edit Modal -->
<!-- <div class="modal fade" id="EditNotice" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Notice</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="">Notice Title:</label>
                            <input type="text" class="form-control" name="title" id="title" value="Notice Title">
                            <label for="">Notice Link:</label>
                            <input type="text" class="form-control" name="link" id="link" value="Notice Link">
                            <label for="">Notice File:</label>
                            <input type="file" name="notice_file" id="notice_file" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-save mr-2"></i>Update</button>
                </div>
            </div>
        </form>
    </div>
</div> -->
<?php
include('footer.php');
?>
<script>
    // Notice File Hide Show////
    $(function() {
        $("#notice_link").hide();
        checkBox = document.getElementById('FileCheckBox').addEventListener('click', event => {
            if (event.target.checked) {
                $("#notice_file").show();
                $("#notice_link").hide();
            } else {
                $("#notice_file").hide();
                $("#notice_link").show();
            }
        });
    })
</script>