<?php

if ($_FILES['yt_photo']['name'] == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please insert photo.']);
    exit;
} elseif ($_POST['title'] == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter title.']);
    exit;
} elseif ($_POST['link'] == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter link.']);
    exit;
} else {
    include('database.php');
    $obj = new Database();

    $title = $obj->escapeString($_POST['title']);
    $link = $obj->escapeString($_POST['link']);

    $file_name = $_FILES['yt_photo']['name'];
    $file_size = $_FILES['yt_photo']['size'];
    $file_tmp = $_FILES['yt_photo']['tmp_name'];
    // $file_type = $image['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $extentions = array("jpeg", "jpg", "JPG", "JPEG","png");
    if (in_array($file_ext, $extentions)) {
        if ($file_size < 1048576) {
            $new_name = mt_rand() . "." . $file_ext;
            $path = "../photos/yt_photo/" . $new_name;
            if (move_uploaded_file($file_tmp, $path)) {

                //! Insert file name in database...
                
                $obj->insert("yt_videos", ["yt_title" => $title, "yt_link" => $link, "yt_image" => $new_name]);
                $result = $obj->getResult();
                // print_r($result[0]);
                if ($result[0] == "success") {
                    echo json_encode(array('status' => 'success', 'msg' => 'Thumbnail added successfully.'));
                } else {
                    echo json_encode(array('status' => 'error', 'msg' => 'Thumbnail can not added.'));
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'Image Can not be upload.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Image must have less than 1MB or lower.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Image must have been jpg , png and jpeg format.']);
    }
}
