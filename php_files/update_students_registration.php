<?php
include('database.php');
$obj = new Database();

$student_id = $obj->escapeString($_POST['student_id']);
$name = $obj->escapeString($_POST['name']);
$father_name = $obj->escapeString($_POST['father_name']);
$dob = $obj->escapeString($_POST['dob']);
$gander = $obj->escapeString($_POST['gander']);
$mobile = $obj->escapeString($_POST['mobile']);
$email = $obj->escapeString($_POST['email']);
$height = $obj->escapeString($_POST['height']);
$weight = $obj->escapeString($_POST['weight']);
$qualification = $obj->escapeString($_POST['qualification']);
$course = $obj->escapeString($_POST['course']);
$batch = $obj->escapeString($_POST['batch']);
$aadhar = $obj->escapeString($_POST['aadhar']);
$village = $obj->escapeString($_POST['village']);
$post_office = $obj->escapeString($_POST['post_office']);
$police_station = $obj->escapeString($_POST['police_station']);
$district = $obj->escapeString($_POST['district']);
$pin = $obj->escapeString($_POST['pin']);
if ($name == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter students name.']);
    exit;
} elseif ($father_name == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter fathers name.']);
    exit;
} elseif ($dob == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter date of birth.']);
    exit;
} elseif ($gander == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter gander.']);
    exit;
} elseif ($mobile == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter mobile.']);
    exit;
} elseif ($email == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter email address.']);
    exit;
} elseif ($height == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter height.']);
    exit;
} elseif ($weight == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter weight.']);
    exit;
} elseif ($qualification == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter qualification.']);
    exit;
} elseif ($course == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please select course name.']);
    exit;
} elseif ($batch == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please select batch.']);
    exit;
} elseif ($aadhar == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter aadhar.']);
    exit;
} elseif ($village == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter village.']);
    exit;
} elseif ($post_office == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter post office.']);
    exit;
} elseif ($police_station == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter police station.']);
    exit;
} elseif ($district == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter district.']);
    exit;
} elseif ($pin == "") {
    echo json_encode(['status' => 'error', 'msg' => 'Please enter pin.']);
    exit;
} else {
    //! Update Queey ...
    $obj->update("students_registration_2022", ["name" => $name, "father_name" => $father_name, "dob" => $dob, "gander" => $gander, "mobile" => $mobile, "email" => $email, "height" => $height, "weight" => $weight, "last_qualification" => $qualification, "course" => $course, "batch" => $batch, "aadhar" => $aadhar, "vill" => $village, "po" => $post_office, "ps" => $police_station, "dist" => $district, "pin" => $pin], "student_id = '{$student_id}'");
    $result = $obj->getResult();
    if ($result[0] == "success") {
        echo json_encode(array('status' => 'success', 'msg' => 'Students updated successfully.'));
    } else {
        echo json_encode(array('status' => 'error', 'msg' => 'Students can not update.'));
    }
}
