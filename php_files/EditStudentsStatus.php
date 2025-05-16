<?php
include('database.php');
$obj = new Admission();

$id = $obj->escapeString($_POST['id']);
$status = $obj->escapeString($_POST['status']);

$obj->update('fresh_students',['active_status'=> "$status"], "s_id = '{$id}'");
$result = $obj->getResult();
if($result[0] == "success"){
    echo json_encode(array('status' => 'success', 'msg' => 'Students status updated successfully.'));
}else{
    echo json_encode(array('status' => 'error', 'msg' => 'Students can not be deactivate.'));
}

?>