<?php 
if ($_FILES['stunents_photo']['name'] == "") {
    echo json_encode(['status'=>'error' ,'msg'=>'Please insert photo.']);
}elseif ($_POST['stunents_name'] == "") {
    echo json_encode(['status' => 'error','msg' => 'Please enter students name.']);
}elseif ($_POST['stunents_job'] == "") {
    echo json_encode(['status' => 'error','msg' => 'Please enter students job.']);
}else{
    $students_name = $_POST['stunents_name'];
    $students_job = $_POST['stunents_job'];

    $file_name = $_FILES['stunents_photo']['name'];
    $file_size = $_FILES['stunents_photo']['size'];
    $file_tmp = $_FILES['stunents_photo']['tmp_name'];
    // $file_type = $image['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $extentions = array("jpeg", "jpg", "JPG", "JPEG");
    if (in_array($file_ext, $extentions)) {
        if ($file_size < 1048576) {
            $new_name = mt_rand() . "." . $file_ext;
            $path = "../photos/success_students/" . $new_name;
            if (move_uploaded_file($file_tmp, $path)) {

                //! Insert file name in database...
                include('database.php');
                $obj = new Database();
                $obj->insert("success_students",["students_name"=>$students_name,"students_job"=> $students_job , "image" => $new_name]);
                $result = $obj->getResult();
                if ($result[0] == "success") {
                    echo json_encode(array('status' => 'success', 'msg' => 'Students added successfully.'));
                } else {
                    echo json_encode(array('status' => 'error', 'msg' => 'Students can not added.'));
                }
            } else {
                echo json_encode(['status' => 'error', 'msg' =>'Image Can not be upload.']);
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Image must have less than 1MB or lower.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Image must have been jpg and jpeg format.']);
    }
}