<?php
if($_POST['title'] == ""){
    echo json_encode(['status' => 'error', 'msg' => 'Please enter title.']);
    exit;
}elseif ($_FILES['notice_file']['name'] !== "" && $_POST['link'] == "") {
    include('database.php');
    $obj = new Database();

    $title = $obj->escapeString($_POST['title']);

    $file_name = $_FILES['notice_file']['name'];
    $file_size = $_FILES['notice_file']['size'];
    $file_tmp = $_FILES['notice_file']['tmp_name'];
    // $file_type = $image['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $extentions = array("jpeg", "jpg", "JPG", "JPEG", "pdf","PDF","png");
    if (in_array($file_ext, $extentions)) {
        if ($file_size < 2097152) { // 2 mb
            $new_name = mt_rand() . "." . $file_ext;
            $path = "../photos/notice_media/" . $new_name;
            if (move_uploaded_file($file_tmp, $path)) {

                //! Insert file name in database...
                $date = date('d-M-Y');
                $obj->insert("notice", ["title" => $title, "date" => $date, "media" => $new_name]);
                $result = $obj->getResult();
                // print_r($result[0]);
                if ($result[0] == "success") {
                    echo json_encode(array('status' => 'success', 'msg' => 'Notice added successfully.'));
                } else {
                    echo json_encode(array('status' => 'error', 'msg' => 'Notice can not added.'));
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' => 'File Can not be upload.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'File must have less than 2MB or lower.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'File must have been jpg , jpeg , png and pdf format.']);
    }
}elseif($_FILES['notice_file']['name'] == "" && $_POST['link'] !== ""){
    include('database.php');
    $obj = new Database();

    $title = $obj->escapeString($_POST['title']);
    $link = $obj->escapeString($_POST['link']);
    
    //! Insert file name in database...
    $date = date('d-M-Y');
    $obj->insert("notice", ["title" => $title, "link" => $link, "date" => $date]);
    $result = $obj->getResult();
    // print_r($result[0]);
    if ($result[0] == "success") {
        echo json_encode(array('status' => 'success', 'msg' => 'Notice added successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'msg' => 'Notice can not added.'));
    }
}else{
    echo json_encode(['status' => 'error', 'msg' => 'Please enter link or Media file.']);
    exit;
}




