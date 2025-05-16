<?php
include('database.php');
$obj = new Admission();

$id = $obj->escapeString($_POST['id']);
// $status = $obj->escapeString($_POST['status']);

$obj->update('registration',['status'=> "4"], "s_id = '{$id}'");
$result = $obj->getResult();
if($result[0] == "success"){
    echo json_encode(array('status' => 'success', 'msg' => 'Edit mode on successfully.'));
}else{
    echo json_encode(array('status' => 'error', 'msg' => "Edit mode can't be ."));
}
