<?php
include('../../admin/php_files/database.php');
$obj = new Admission();

$id = $obj->escapeString($_POST['id']);
$fname = $obj->escapeString($_POST['fname']);
$lname = $obj->escapeString($_POST['lname']);
$FatherName = $obj->escapeString($_POST['FatherName']);
$MotherName = $obj->escapeString($_POST['MotherName']);
$mobile = $obj->escapeString($_POST['mobile']);
$gurdain_mobile = $obj->escapeString($_POST['gurdain_mobile']);
$email = $obj->escapeString($_POST['email']);
$dob = $obj->escapeString($_POST['dob']);

$obj->update('registration', ["fname" => $fname, "lname" => $lname, "father_name" => $FatherName, "mother_name" => $MotherName, "mobile" => $mobile, "gurdain_mobile" => $gurdain_mobile, "email" => $email, "dob" => $dob,],"s_id = '$id'");

$result = $obj->getResult();
if ($result[0] == "success") {
    echo json_encode(array('status' => 'success', 'msg' => 'Registration updated successfully'));
} else {
    echo json_encode(array('status' => 'error', 'msg' => 'Registration updated failed.'));
}
