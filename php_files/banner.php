<?php
if (isset($_POST['getdata'])) {
     include('database.php');

     //! Load Data

     $obj = new Database();
     $obj->select("banner", '*', null, null, 'id DESC', null);
     $result = $obj->getResult();
     if (count($result) > 0) {
          echo '<div class="card mt-2">
                <div class="row text-center m-1">';
          $i = 1;
          foreach ($result as list('id' => $id, 'banner_id' => $banner_id)) {
               echo "<div class='col-lg-3 col-3 mb-2'>
                            <img src='photos/banner/$banner_id' class='img-fluid rounded success_image'>
                            <button type='button' data-id='$id' class='btn btn-outline-danger btn-sm mt-2' id='DeleteBanner' ><i class='bi bi-trash3'></i></button>
                        </div>";
               $i++;
          }
          echo '</div>
                </div>';
     } else {
          echo "<div class='card mt-2 row '>
                <div class='text-center'><span class='text-danger h4 '>No Data Found !</span></div>
                </div>";
     }
}


//! Delete Banner..

if (isset($_POST['delete_banner_id'])) {
     include('database.php');
     $obj = new Database();
     $id = $obj->escapeString($_POST['delete_banner_id']);
     $obj->select('banner', "banner_id", "id=$id", null, null, null);
     $image = $obj->getResult();
     if (unlink('../photos/banner/' . $image[0]['banner_id'])) {
          $obj->delete("banner", "id=$id");
          $result = $obj->getResult();
          if ($result[0] == "success") {
               echo json_encode(array('status' => 'success', 'msg' => "Banner deleted successfully."));
          } else {
               echo json_encode(array('status' => 'error', 'msg' => "Banner can not delete."));
          }
     }
}



//! Add Data ........
if (isset($_FILES['banner_photo'])) {

     if ($_FILES['banner_photo']['name'] == "") {
          echo json_encode(['status' => 'error', 'msg' => 'Please insert banner photo.']);
     } else {

          $file_name = $_FILES['banner_photo']['name'];
          $file_size = $_FILES['banner_photo']['size'];
          $file_tmp = $_FILES['banner_photo']['tmp_name'];
          // $file_type = $image['type'];
          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
          $extentions = array("jpeg", "jpg", "JPG", "JPEG");
          if (in_array($file_ext, $extentions)) {
               if ($file_size < 1048576) {
                    $new_name = time() . "." . $file_ext;
                    $path = "../photos/banner/" . $new_name;
                    if (move_uploaded_file($file_tmp, $path)) {

                         //! Insert file name in database...
                         include('database.php');
                         $obj = new Database();
                         $obj->insert("banner", ["banner_id" => $new_name]);
                         $result = $obj->getResult();
                         if ($result[0] == "success") {
                              echo json_encode(array('status' => 'success', 'msg' => 'Banner Photo added successfully.'));
                         } else {
                              echo json_encode(array('status' => 'error', 'msg' => 'Banner Photo could not added.'));
                         }
                    } else {
                         echo json_encode(['status' => 'error', 'msg' => 'Image Can not be upload.']);
                    }
               } else {
                    echo json_encode(['status' => 'error', 'msg' => 'Image must have less than 1MB or lower.']);
               }
          } else {
               echo json_encode(['status' => 'error', 'msg' => 'Image must have been jpg and jpeg format.']);
          }
     }
}

//! sms status....
if (isset($_POST['sms'])) {
     include('database.php');
     $obj = new Database();
     $obj->select('setting', 'sms_status');
     $SmsStatus = $obj->getResult();

     echo "<div class='custom-control custom-switch custom-switch-off-light custom-switch-on-success'>";
     if($SmsStatus[0]['sms_status'] == 1){
          echo "<input type='checkbox' class='custom-control-input sms_status' id='smsId' checked>
               <label class='custom-control-label' for='smsId'>SMS Status</label>";
     }else{
          echo "<input type='checkbox' class='custom-control-input sms_status' id='smsId'>
               <label class='custom-control-label' for='smsId'>SMS Status</label>";
     }
     echo "</div>";
}

//! SMS Update .......
if(isset($_POST['op_type'])){
     include('database.php');
     $obj = new Database();

     $status = $obj->escapeString($_POST['status']);

     $obj->update('setting',['sms_status'=> "$status"], "id = '1'");
     $result = $obj->getResult();
     if($result[0] == "success"){
     echo json_encode(array('status' => 'success', 'msg' => 'SMS status updated successfully.'));
     }else{
     echo json_encode(array('status' => 'error', 'msg' => 'SMS setting can not be update.'));
     }
}
