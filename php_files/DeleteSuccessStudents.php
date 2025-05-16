<?php
include('database.php');
// session_start();
// if ($_SESSION['role'] == 3) {
    $obj = new Database();
    $id = $obj->escapeString($_POST['delete_id']);
    $obj->select('success_students', "image", "id=$id",null , null , null);
    $image = $obj->getResult();
    if (unlink('../photos/success_students/' . $image[0]['image'])) {
        $obj->delete("success_students", "id=$id");
        $result = $obj->getResult();
        if ($result[0] == "success") {
            echo json_encode(array('status' => 'success', 'msg' => "Students deleted successfully."));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => "Students can not delete."));
        }
    }
    
// }
