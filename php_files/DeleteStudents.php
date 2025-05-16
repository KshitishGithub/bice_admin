<?php
include('database.php');
    $obj = new Database();
    $id = $obj->escapeString($_POST['delete_id']);
    $obj->select('students_registration_2022', "image", "student_id=$id",null , null , null);
    $image = $obj->getResult();
    // echo '<pre>';
    // print_r($image);
    // die;
    if (unlink('../photos/student_photos/' . $image[0]['image'])) {
        $obj->delete("students_registration_2022", "student_id=$id");
        $result = $obj->getResult();
        if ($result[0] == "success") {
            echo json_encode(array('status' => 'success', 'msg' => "Students deleted successfully."));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => "Students can not delete."));
        }
    }
    

