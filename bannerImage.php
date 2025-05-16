<?php
define("PAGE", "Setting");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                         <h3>Banner:</h3>
                         <button type="button" data-bs-toggle="modal" data-bs-target="#AddBannerPhoto" class="btn btn-success float-right"> <i class="bi bi-plus-square mr-2"></i>Add Photo</button>
                    </div>
                    <div class="col-md-12">
                         <div id="LoadBanner">
                              <!-- Load Banner Content Here -->
                         </div>
                         <a href="setting.php" class="btn btn-info">Back</a>
                    </div>
               </div>
          </div>
     </div>
</div>

<!-- Add Modal -->
<div class="modal fade" id="AddBannerPhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog">
          <form id="AddBannerForm" enctype="multipart/form-data">
               <div class="modal-content">
                    <div class="modal-header bg-light">
                         <h5 class="modal-title" id="staticBackdropLabel">Add Banner Image</h5>
                         <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">
                         <div class="card-body">
                              <div class="form-group">
                                   <label for="">Image:</label>
                                   <input type="file" name="banner_photo" id="banner_photo" class="form-control">
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

<?php
include('footer.php');
?>