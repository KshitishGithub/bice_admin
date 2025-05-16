<?php
if (isset($_POST['getdata'])) {
     include('database.php');

     //! Load Data

     $obj = new Database();
     $obj->select("gallary", '*', null, null, 'id DESC', null);
     $result = $obj->getResult();
     if (count($result) > 0) {
          echo '<div class="card mt-2">
                <div class="row text-center m-1">';
          $i = 1;
          foreach ($result as list('id' => $id, 'image_id' => $image_id)) {
               echo "<div class='col-lg-3 col-3 mb-2'>
                            <img src='photos/gallary/$image_id' class='img-fluid rounded success_image'>
                            <button type='button' data-id='$id' class='btn btn-outline-danger btn-sm mt-2' id='DeleteGallary' ><i class='bi bi-trash3'></i></button>
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


//! Delete Gallary..

if (isset($_POST['delete_gallary_id'])) {
     include('database.php');
     $obj = new Database();
     $id = $obj->escapeString($_POST['delete_gallary_id']);
     $obj->select('gallary', "image_id", "id=$id", null, null, null);
     $image = $obj->getResult();
     if (unlink('../photos/gallary/' . $image[0]['image_id'])) {
          $obj->delete("gallary", "id=$id");
          $result = $obj->getResult();
          if ($result[0] == "success") {
               echo json_encode(array('status' => 'success', 'msg' => "Gallary deleted successfully."));
          } else {
               echo json_encode(array('status' => 'error', 'msg' => "Gallary can not delete."));
          }
     }
}



//! Add Data ........
if (isset($_FILES['gallary_photo'])) {

     if ($_FILES['gallary_photo']['name'] == "") {
          echo json_encode(['status' => 'error', 'msg' => 'Please insert gallary photo.']);
     } else {

          $file_name = $_FILES['gallary_photo']['name'];
          $file_size = $_FILES['gallary_photo']['size'];
          $file_tmp = $_FILES['gallary_photo']['tmp_name'];
          // $file_type = $image['type'];
          $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
          $extentions = array("jpeg", "jpg", "JPG", "JPEG");
          if (in_array($file_ext, $extentions)) {
               if ($file_size < 1048576) {
                    $new_name = mt_rand() . "." . $file_ext;
                    $path = "../photos/gallary/" . $new_name;
                    if (move_uploaded_file($file_tmp, $path)) {

                         //! Insert file name in database...
                         include('database.php');
                         $obj = new Database();
                         $obj->insert("gallary", ["image_id" => $new_name]);
                         $result = $obj->getResult();
                         if ($result[0] == "success") {
                              echo json_encode(array('status' => 'success', 'msg' => 'Gallary Photo added successfully.'));
                         } else {
                              echo json_encode(array('status' => 'error', 'msg' => 'Gallary Photo could not added.'));
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