<?php
define("PAGE", "Youtube Videos");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h2>YouTube Videos</h2>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddYtVideo" class="btn btn-success float-right mb-3"> <i class="bi bi-plus-square mr-2"></i>Add Yt Video</button>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div id="loadYTcontent">
                            <!-- Load Content Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="AddYtVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="yt_form">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Youtube Video</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Youtube Title:</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Notice Title">
                            <label for="">Youtube Link:</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="Notice Link">
                            <label for="">Youtube Thumbnail:</label>
                            <input type="file" name="yt_photo" id="yt_photo" class="form-control">
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
<div class="modal fade" id="EditYtVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="UpdateThumbnailData">
                <div id="LoadEditContent">
                    <!-- Load Content -->
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include('footer.php');

?>