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
                    <h3>Settings:</h3>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <?php
                                $obj->select('setting', '*');
                                $result = $obj->getResult();
                                $result = $result[0];
                                ?>
                                <div class="col-12">
                                    <form id="setting_form">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <label>Banner Description:</label>
                                                    <textarea style="resize: none;" class="form-control" name="banner_des"><?php print_r($result['banner_des']); ?></textarea>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>About Us:</label>
                                                    <textarea style="resize: none;" class="form-control" name="about_us"><?php print_r($result['about_us']); ?></textarea>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Footer Description:</label>
                                                    <textarea style="resize: none;" class="form-control" name="footer_des"><?php print_r($result['footer_des']); ?></textarea>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Contact Number:</label>
                                                    <input type="text" class="form-control" name="number" value="<?php print_r($result['number']); ?>">
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Contact Email:</label>
                                                    <input type="email" class="form-control" name="email" value="<?php print_r($result['email']); ?>">
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Address:</label>
                                                    <input type="text" class="form-control" name="address" value="<?php print_r($result['address']); ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="">
                                            <button type="submit" class="btn btn-success my-3 float-right"><i style="font-size: 17px;" class="fas fa-save mr-2"></i>Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Add Modal -->
<div class="modal fade" id="SmsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="SmsForm">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Send SMS Setting</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="LoadStatus">
                            <!-- Load Status Content -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Group Modal -->
<div class="modal fade" id="GroupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="SmsForm">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Batch Setting</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="LoadGroup">
                            <!-- Load Status Content -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Add Batch -->
<div class="modal fade" id="AddBatchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Batch Setting</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="BatchForm">
                        <label>Add Batch:</label>
                        <input type="text" class="form-control" name="batch_name" id="batch_name" placeholder="Add Batchs Name">
                        <button type="submit" class="btn btn-success btn-block mt-3">Add Batch</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>