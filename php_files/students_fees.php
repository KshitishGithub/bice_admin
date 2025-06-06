<?php
include('database.php');
$obj = new Database();
$Addobj = new Admission();


//! old code
// $student_id = $obj->escapeString($_POST['student_id']);
// $month = $obj->escapeString($_POST['month']);
// $fees_amount = $obj->escapeString($_POST['fees_amount']);

// $obj->select('new_students_fees_2023',"*", "s_id = $student_id",null,null);
// $result = $obj->getResult();  // Students exits or not in fees table
// if(count($result) > 0){
//     $obj->select('new_students_fees_2023', "$month", "s_id = $student_id AND $month != 0", null, null);
//     $months = $obj->getResult();   // Students Fees month exits or not in fees table
//     if (count($months) > 0) {
//         // Add Fees month in exiting students fess ...... 
//         $exitsfees = $months[0][$month]; // Exits Fees
//         $total_fees = $exitsfees + $fees_amount;
//         $date = date('d-m-Y');

//         $obj->update('new_students_fees_2023', [$month =>$total_fees], "s_id = '{$student_id}'");
//         $obj->update('new_students_months_2023', [$month => $date], "s_id = '{$student_id}'");

//         $result = $obj->getResult();
//         if ($result[0] == "success") {
//             //Fetching Students Data 
//             $Addobj->rawsql("SELECT fname,mobile FROM registration WHERE s_id = $student_id");
//             $stu_data = $Addobj->getResult();
//             $stu_name = $stu_data[0]['fname'];
//             $stu_mobile = $stu_data[0]['mobile'];
//             $stu_details = [$stu_name, strtoupper($month).' Rs:'.$fees_amount ];
//             $obj->sendsms('EdBiCE', "148161",$stu_details,[$stu_mobile]);
//             // $stu_data = $obj->getResult();
//             // if($stu_data[0] == 'success'){
//             //     echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
//             // }else{
//                 //     echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected. But SMS not send.'));
//                 // }
//             echo json_encode(array('status' => 'success', 'msg' => 'Students fees added success.'));
//         } else {
//             echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed.'));
//         }
//     }else{
//         // Insert Fees month in exiting students id......

//         $date = date('d-m-Y');
//         $obj->update('new_students_fees_2023', [$month => $fees_amount], "s_id = '{$student_id}'");
//         $obj->update('new_students_months_2023', [$month => $date] , "s_id = '{$student_id}'");
//         $obj->insert('fees_per_day', ["date" => $date, "fees" => $fees_amount]);
//         $result = $obj->getResult();
//         if ($result[0] == "success") {
//             //Fetching Students Data 
//             $Addobj->rawsql("SELECT fname,mobile FROM registration WHERE s_id = $student_id");
//             $stu_data = $Addobj->getResult();
//             $stu_name = $stu_data[0]['fname'];
//             $stu_mobile = $stu_data[0]['mobile'];
//             $stu_details = [$stu_name, strtoupper($month) . ' Rs:' . $fees_amount];
//             $obj->sendsms('EdBiCE', "148161", $stu_details, [$stu_mobile]);
//             echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
//         } else {
//             echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed.'));
//         }
//     }
// }else {
//     // Insert new Students id in fees and months table

//     $date = date('d-m-Y');
//     $obj->insert('new_students_fees_2023',["s_id"=>$student_id , $month=>$fees_amount]);
//     $obj->insert('new_students_months_2023', ["s_id" => $student_id, $month => $date]);
//     $obj->insert('fees_per_day', ["date" => $date, "fees" => $fees_amount]);
//     $result = $obj->getResult();
//     if ($result[0] == "success") {
//         //Fetching Students Data 
//         $Addobj->rawsql("SELECT fname,mobile FROM registration WHERE s_id = $student_id");
//         $stu_data = $Addobj->getResult();
//         $stu_name = $stu_data[0]['fname'];
//         $stu_mobile = $stu_data[0]['mobile'];
//         $stu_details = [$stu_name, strtoupper($month) . ' Rs:' . $fees_amount];
//         $obj->sendsms('EdBiCE', "148161", $stu_details, [$stu_mobile]);
//         echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
//     }else{
//         echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed due to some reason.'));
//     }
// }


// ! new code
$student_id = $obj->escapeString($_POST['student_id']);
$year = $obj->escapeString($_POST['year']);

$month = $_POST['selected_months']; // Expecting array from frontend

if (!is_array($month)) {
    $month = explode(',', $month); // Convert to array if comma-separated string
}

$totalMonths = count($month); // Count months
$totalAmount = $totalMonths * 500; // Calculate amount

// Convert months array to JSON format for DB storage
$monthsJson = json_encode($month);

// Current date in Asia/Kolkata timezone
$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
$date = $date->format('Y-m-d H:i:s');


// Insert into the database
$obj->insert('fees_collection', [
    "student_id" => $student_id,
    "year" => $year,
    "months" => $monthsJson,
    "amount" => $totalAmount,
    "created_at" => $date,
    "payment_type" => 'Cash',
    "payment_by" => 'Admin',
]);

$result = $obj->getResult();
if ($result[0] == "success") {
    // Fetching student data
    $Addobj->rawsql("SELECT fname,lname, mobile FROM registration WHERE s_id = $student_id");
    $stu_data = $Addobj->getResult();
    $stu_name = $stu_data[0]['fname']. ' ' .$stu_data[0]['lname'];
    $stu_mobile = $stu_data[0]['mobile'];

    // Map short keys to uppercase month names
    $monthsMap = [
        'jan' => 'JAN', 'feb' => 'FEB', 'mar' => 'MAR', 'apr' => 'APR',
        'may' => 'MAY', 'jun' => 'JUN', 'jul' => 'JUL', 'aug' => 'AUG',
        'sep' => 'SEP', 'oct' => 'OCT', 'nov' => 'NOV', 'dec' => 'DEC'
    ];

    $formattedMonths = [];
    foreach ($month as $m) {
        if (isset($monthsMap[$m])) {
            $formattedMonths[] = $monthsMap[$m];
        }
    }
    $monthString = implode(', ', $formattedMonths);

    // Send SMS
    $stu_details = [$stu_name, "$monthString - $year Rs:$totalAmount"];
    $obj->sendsms('EdBiCE', "148161", $stu_details, [$stu_mobile]);

    echo json_encode(['status' => 'success', 'msg' => 'Student fees collected.']);
} else {
    echo json_encode(['status' => 'error', 'msg' => 'Student collection failed due to some reason.']);
}
?>

