<?php
include('database.php');
$obj = new Database();

$banner_des = $obj->escapeString($_POST['banner_des']);
$about_us = $obj->escapeString($_POST['about_us']);
$footer_des = $obj->escapeString($_POST['footer_des']);
$number = $obj->escapeString($_POST['number']);
$email = $obj->escapeString($_POST['email']);
$address = $obj->escapeString($_POST['address']);

$obj->update('setting',['banner_des'=> $banner_des, 'about_us'=> $about_us, 'footer_des'=> $footer_des, 'number'=> $number, 'email'=> $email, 'address'=> $address]);
$result = $obj->getResult();
if ($result[0] == 'success') {
     echo json_encode(array('status' => 'success', 'msg' => 'Data Updated Successfully.'));
}else{
     echo json_encode(array('status' => 'error', 'msg' => 'Data Could not be update.'));
}

?>