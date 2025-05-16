<?php
include('database.php');
$obj = new Database();


$student_id = $obj->escapeString($_POST['student_id']);
$month = $obj->escapeString($_POST['month']);
$fees_amount = $obj->escapeString($_POST['fees_amount']);

$obj->select('old_students_fees_2023',"*", "s_id = $student_id",null,null);
$result = $obj->getResult();  // Students exits or not in fees table
if(count($result) > 0){
    $obj->select('old_students_fees_2023', "$month", "s_id = $student_id AND $month != 0", null, null);
    $months = $obj->getResult();   // Students Fees month exits or not in fees table
    if (count($months) > 0) {
        // Add Fees month in exiting students fess ...... 
        $exitsfees = $months[0][$month]; // Exits Fees
        $total_fees = $exitsfees + $fees_amount;
        $date = date('d-m-Y');

        $obj->update('old_students_fees_2023', [$month =>$total_fees], "s_id = '{$student_id}'");
        $obj->update('old_students_months_2023', [$month => $date], "s_id = '{$student_id}'");

        $result = $obj->getResult();
        if ($result[0] == "success") {
            //Fetching Students Data 
            $obj->rawsql("SELECT name,mobile FROM old_students WHERE stu_sl = $student_id");
            $stu_data = $obj->getResult();
            $stu_name = $stu_data[0]['name'];
            $stu_mobile = $stu_data[0]['mobile'];
            $stu_details = [$stu_name, strtoupper($month).' Rs:'.$fees_amount ];
            $obj->sendsms('EdBiCE', "148161",$stu_details,[$stu_mobile]);
            // $stu_data = $obj->getResult();
            // if($stu_data[0] == 'success'){
            //     echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
            // }else{
                //     echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected. But SMS not send.'));
                // }
            echo json_encode(array('status' => 'success', 'msg' => 'Students fees added success.'));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed.'));
        }
    }else{
        // Insert Fees month in exiting students id......

        $date = date('d-m-Y');
        $obj->update('old_students_fees_2023', [$month => $fees_amount], "s_id = '{$student_id}'");
        $obj->update('old_students_months_2023', [$month => $date] , "s_id = '{$student_id}'");
        $obj->insert('fees_per_day', ["date" => $date, "fees" => $fees_amount]);
        $result = $obj->getResult();
        if ($result[0] == "success") {
            //Fetching Students Data 
            $obj->rawsql("SELECT name,mobile FROM old_students WHERE stu_sl = $student_id");
            $stu_data = $obj->getResult();
            $stu_name = $stu_data[0]['name'];
            $stu_mobile = $stu_data[0]['mobile'];
            $stu_details = [$stu_name, strtoupper($month) . ' Rs:' . $fees_amount];
            $obj->sendsms('EdBiCE', "148161", $stu_details, [$stu_mobile]);
            echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed.'));
        }
    }
}else {
    // Insert new Students id in fees and months table

    $date = date('d-m-Y');
    $obj->insert('old_students_fees_2023',["s_id"=>$student_id , $month=>$fees_amount]);
    $obj->insert('old_students_months_2023', ["s_id" => $student_id, $month => $date]);
    $obj->insert('fees_per_day', ["date" => $date, "fees" => $fees_amount]);
    $result = $obj->getResult();
    if ($result[0] == "success") {
        //Fetching Students Data 
        $obj->rawsql("SELECT name,mobile FROM old_students WHERE stu_sl = $student_id");
        $stu_data = $obj->getResult();
        $stu_name = $stu_data[0]['name'];
        $stu_mobile = $stu_data[0]['mobile'];
        $stu_details = [$stu_name, strtoupper($month) . ' Rs:' . $fees_amount];
        $obj->sendsms('EdBiCE', "148161", $stu_details, [$stu_mobile]);
        echo json_encode(array('status' => 'success', 'msg' => 'Students fees collected.'));
    }else{
        echo json_encode(array('status' => 'error', 'msg' => 'Students collection failed due to some reason.'));
    }
}
