<?php
include("database.php");
$obj = new Database();
$id = $obj->escapeString($_POST['id']);
$EditTitle = $obj->escapeString($_POST['EditTitle']);
$EditLink = $obj->escapeString($_POST['EditLink']);

$new_thumbnail = $_FILES['new_thumbnail'];
$old_thumbnail = $_POST['old_thumbnail'];
// print_r($_FILES['photo']['name']);
if ($EditTitle == '' || empty($EditTitle)) {
    echo json_encode(array('status' => 'error', 'msg' => 'Please Enter Students Name.'));
    exit;
} elseif ($EditLink == '' || empty($EditLink)) {
    echo json_encode(array('status' => 'error', 'msg' => 'Please Enter Students Job.'));
    exit;
} elseif (empty($old_thumbnail) || empty($new_thumbnail)) {
    echo json_encode(array('status' => 'error', 'msg' => 'Please Choose Students Image.'));
    exit;
} else {
    if (!empty($old_thumbnail) && !empty($_FILES['new_thumbnail']['name'])) {
        $photo = $_FILES['new_thumbnail'];
    } elseif (!empty($old_thumbnail) && empty($_FILES['new_thumbnail']['name'])) {
        $photo = $_POST['old_thumbnail'];
        $new_file_name = $_POST['old_thumbnail'];
    }
    $message = [];
    // if select the new file than entered in this condition
    if (!empty($old_thumbnail) && !empty($_FILES['new_thumbnail']['name'])) {
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
                if (file_exists('../photos/yt_photo/' . $_POST['old_thumbnail'])) {
                    // Delete the old file 
                    if (unlink('../photos/yt_photo/' . $_POST['old_thumbnail'])) {
                        $path = "../photos/yt_photo/" . $new_file_name;
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
        $obj->update('yt_videos', ["yt_title" => "{$EditTitle}", "yt_link" => $EditLink, "yt_image" => "{$new_file_name}"], "id = '{$id}'");
        $result = $obj->getResult();
        if ($result[0] == "success") {
            echo json_encode(array('status' => 'success', 'msg' => 'Updated Successfully.'));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => 'Students updated failed !'));
        }
    }
}
