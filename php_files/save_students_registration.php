<?php
    include('database.php');
    $obj = new Database();

    $stu_id = $obj->escapeString($_POST['stu_id']);
    $name = $obj->escapeString($_POST['name']);
    $father_name = $obj->escapeString($_POST['father_name']);
    $mother_name = $obj->escapeString($_POST['mother_name']);
    $dob = $obj->escapeString($_POST['dob']);
    $gander = $obj->escapeString($_POST['gander']);
    $mobile = $obj->escapeString($_POST['mobile']);
    $gurdain_mobile = $obj->escapeString($_POST['gurdain_mobile']);
    $email = $obj->escapeString($_POST['email']);
    $category = $obj->escapeString($_POST['category']);
    $religion = $obj->escapeString($_POST['religion']);
    $course = $obj->escapeString($_POST['course']);
    $batch = $obj->escapeString($_POST['batch']);
    $qualification = $obj->escapeString($_POST['last_qualification']);
    $passing_year = $obj->escapeString($_POST['passing_year']);
    $aadhar = $obj->escapeString($_POST['aadhar']);
    $height = $obj->escapeString($_POST['height']);
    $weight = $obj->escapeString($_POST['weight']);
    $chest = $obj->escapeString($_POST['chest']);
    $village = $obj->escapeString($_POST['village']);
    $post_office = $obj->escapeString($_POST['post_office']);
    $police_station = $obj->escapeString($_POST['police_station']);
    $district = $obj->escapeString($_POST['district']);
    $pin = $obj->escapeString($_POST['pin']);
    $state = $obj->escapeString($_POST['state']);
    $country = $obj->escapeString($_POST['country']);
    // Culcutta time zone
    $dt = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
    $date = $dt->format('d-m-Y');

    $obj->select('old_students','aadhar',"aadhar = $aadhar",null,null);
    $aadharcount = $obj->getResult();

    $obj->select('old_students', 'mobile', "mobile = $mobile", null, null);
    $mobilecount = $obj->getResult();
    
    
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    // $file_type = $image['type'];
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $extentions = array("jpeg", "jpg", "JPG", "JPEG" , "PNG","png");
    if (in_array($file_ext, $extentions)) {
        if ($file_size < 512000) { // 500kb
            $new_name = mt_rand() . "." . $file_ext;
            $path = "../photos/old_student_photos/" . $new_name;
            if (!move_uploaded_file($file_tmp, $path)) {
                echo json_encode(['status' => 'error', 'msg' => 'Image Can not be upload.']);
            } 
        } else {
            echo json_encode(['status' => 'error', 'msg' => 'Image must have less than 200kb or lower.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'msg' => 'Image must have been jpg and jpeg format.']);
    }

//! Insert data into database...

$obj->insert("old_students", ["stu_sl" => $stu_id, "name" => $name, "father_name" => $father_name, "mother_name" => $mother_name, "dob" => $dob, "gander" => $gander, "category" => $category, "mobile" => $mobile, "gurdain_mobile" => $gurdain_mobile, "email" => $email, "height" => $height, "weight" => $weight, "chest" => $chest, "last_qualification" => $qualification, "passing_year" => $passing_year, "religion" => $religion, "course" => $course, "batch" => $batch, "aadhar" => $aadhar, "vill" => $village, "po" => $post_office, "ps" => $police_station, "dist" => $district, "pin" => $pin, "state" => $state, "country" => $country, "image" => $new_name, "date" => $date, "status" => '1']);

// Set id in fees and month table 
$obj->insert('old_students_fees_2023', ['s_id' => $stu_id]);
$obj->insert('old_students_months_2023', ['s_id' => $stu_id]);

$result = $obj->getResult();
if ($result[0] == "success") {
    echo json_encode(array('status' => 'success', 'msg' => 'Students added successfully.'));
} else {
    echo json_encode(array('status' => 'error', 'msg' => 'Students can not be added.'));
}
