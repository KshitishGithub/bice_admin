<?php
include('database.php');
$obj = new Admission();

if (isset($_POST['id'])) {
    $id = $obj->escapeString($_POST['id']);

    // Culcutta time zone
    $dt = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
    $added_on = $dt->format('d-m-Y, H:i:s');

    // Update the student in payment table
    $obj->update('payment', ['amount' => '0', 'payment_status' => 'Pending', 'added_on' => $added_on], "stu_id = '$id'");
    // Delete the student in fresh_student table
    $obj->delete('fresh_students',"s_id = $id");

    echo json_encode(array('status' => 'success', 'msg' => 'Student deleted successfully.'));
}else{
    echo json_encode(array('status' => 'error', 'msg' => 'Student delete failed.'));
}
