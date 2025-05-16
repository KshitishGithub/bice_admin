<?php
include('database.php');
$obj = new Database();
$id = $obj->escapeString($_POST['id']);
$obj->select("success_students", "*", "id = $id");
$result = $obj->getResult();
echo '<div class="modal-body">
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12 mt-1">
                            <label for="">Students Name:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="students_name" id="stunent_name" value="' . $result[0]['students_name'] . '">
                            <input type="hidden" name="id" value="' . $result[0]['id'] . '">
                        </div>
                        <div class="col-md-12 mt-1">
                            <label for="">Students Job Name:<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="students_job" id="stunent_job" value="' . $result[0]['students_job'] . '">
                        </div>
                        <div class="col-md-12 mt-1">
                            <label for="">Students Photo:<span class="text-danger">*</span></label>
                            <input type="file" name="stunents_new_photo" id="stunent_new_photo" class="form-control">
                            <input type="hidden" name="stunents_old_photo" id="stunent_old_photo" class="form-control" value="' . $result[0]['image'] . '">
                            <img src="photos/success_students/' . $result[0]['image'] . '" width="80px" class="mt-2 rounded">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                <button type="submit" class="btn btn-warning"><i class="bi bi-save mr-2"></i>Update</button>
            </div>
        </div>';
