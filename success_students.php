<?php
define("PAGE", "Success Students");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>Students List:</h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddStudents" class="btn btn-success float-right"> <i class="bi bi-plus-square mr-2"></i>Add Students</button>
                </div>
                <div class="col-md-12">
                    <div id="LoadContent">
                        <!-- Load Content Here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="AddStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="AddSuccessStudents" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Students</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Students Name:</label>
                            <input type="text" class="form-control" name="stunents_name" id="stunents_name" placeholder="Stunents name">
                            <label for="">Students Job Name:</label>
                            <input type="text" class="form-control" name="stunents_job" id="stunents_job" placeholder="Stunents Job Name">
                            <label for="">Students Photo:</label>
                            <input type="file" name="stunents_photo" id="stunents_photo" class="form-control">
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
<div class="modal fade" id="EditStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Edit Students</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="EditSuccessData" enctype="multipart/form-data">
                <!-- Content Loading -->
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>