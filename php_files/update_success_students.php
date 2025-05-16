<?php
    include("database.php");
    $obj = new Database();
    $id = $obj->escapeString($_POST['id']);
    $students_name = $obj->escapeString($_POST['students_name']);
    $students_job = $obj->escapeString($_POST['students_job']);

    $new_photo = $_FILES['stunents_new_photo'];
    $old_photo = $_POST['stunents_old_photo'];
    // print_r($_FILES['photo']['name']);
    if ($students_name == '' || empty($students_name)) {
        echo json_encode(array('status' => 'error', 'msg' => 'Please Enter Students Name.'));
        exit;
    } elseif ($students_job == '' || empty($students_job)) {
        echo json_encode(array('status' => 'error', 'msg' => 'Please Enter Students Job.'));
        exit;
    } elseif (empty($old_photo) || empty($new_photo)) {
        echo json_encode(array('status' => 'error', 'msg' => 'Please Choose Students Image.'));
        exit;
    } else {
        if (!empty($old_photo) && !empty($_FILES['stunents_new_photo']['name'])) {
            $photo = $_FILES['stunents_new_photo'];
        } elseif (!empty($old_photo) && empty($_FILES['stunents_new_photo']['name'])) {
            $photo = $_POST['stunents_old_photo'];
            $new_file_name = $_POST['stunents_old_photo'];
        }
        $message = [];
        // if select the new file than entered in this condition
        if (!empty($old_photo) && !empty($_FILES['stunents_new_photo']['name'])) {
            $message = [];
            $file_name = $photo['name'];
            $file_size = $photo['size'];
            $file_tmp = $photo['tmp_name'];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $extentions = array("jpeg", "jpg", "JPG", "JPEG", "PNG", "png");
            if (in_array($file_ext, $extentions)) {
                if ($file_size < 1048576) { // 1mb 
                    $new_file_name = mt_rand() . "." . $file_ext;
                    // Check the old existing file in folder
                    if (file_exists('../photos/success_students/' . $_POST['stunents_old_photo'])) {
                        // Delete the old file 
                        if (unlink('../photos/success_students/' . $_POST['stunents_old_photo'])) {
                            $path = "../photos/success_students/" . $new_file_name;
                            // Upload the new file 
                            if (!move_uploaded_file($file_tmp, $path)) {
                                // if image is not uploaded.
                                $message[] = "Image Can not be upload.";
                            }
                        }
                    }
                } else {
                    $message[] = "Image must have less than 1MB or lower.";
                }
            } else {
                $message[] = "Image must have been jpg , jpeg and png format.";
            }
        }
        if (!empty($message)) {
            $message = implode('', $message);
            echo json_encode(array('status' => 'error', 'msg' => " $message"));
        } else {
            //! Update function....
            $obj->update('success_students', ["students_name" => "{$students_name}", "students_job" => $students_job, "image" => "{$new_file_name}"], "id = '{$id}'");
            $result = $obj->getResult();
            if ($result[0] == "success") {
                echo json_encode(array('status' => 'success','msg'=>'Updated Successfully.'));
            } else {
                echo json_encode(array('status' => 'error', 'msg' => 'Students updated failed !'));
            }
        }
    }

