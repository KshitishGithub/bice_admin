<?php
include('database.php');
$obj = new Database();
$id = $obj->escapeString($_POST['id']);
$obj->select("yt_videos", "*", "id = $id", null , null);
$result = $obj->getResult();
echo '<div class="modal-header bg-info">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Youtube Video</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Youtube Title:</label>
                            <input type="text" class="form-control" name="EditTitle" id="EditTitle" value="' . $result[0]['yt_title'] . '">
                            <input type="hidden" name="id" value="' . $result[0]['id'] . '">
                            <label for="">Youtube Link:</label>
                            <input type="text" class="form-control" name="EditLink" id="EditLink" value="' . $result[0]['yt_link'] . '">
                            <label for="">Youtube Thumbnail:</label>
                            <input type="file" name="new_thumbnail" id="new_thumbnail" class="form-control">
                            <input type="hidden" name="old_thumbnail" id="old_thumbnail" class="form-control" value="' . $result[0]['yt_image'] . '">
                            <img style="max-width:150px" src="photos/yt_photo/' . $result[0]['yt_image'] . '" class="img-thumbnail mt-2 rounded">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save mr-2"></i>Update</button>
                </div>';
