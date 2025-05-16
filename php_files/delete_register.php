<?php
include('database.php');
if (isset($_POST['delete_id'])) {
     $obj = new Admission();
     $id = $obj->escapeString($_POST['delete_id']);
    //  $obj->update('registration',['status'=>0],"s_id='{$id}'");
    $obj->delete('registration',"s_id='{$id}'");
     $result = $obj->getResult();
     if ($result[0] == "success") {
          echo json_encode(array('status' => 'success', 'msg' => "Registered deleted successfully."));
     } else {
          echo json_encode(array('status' => 'error', 'msg' => "Registered can not delete."));
     }
}
