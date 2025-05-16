<?php
include('database.php');
$obj = new Admission();
$DataObj = new Database();


if (isset($_POST['s_id'])) {
    $id = $obj->escapeString($_POST['s_id']);
    $obj->rawsql("SELECT * FROM registration r WHERE r.s_id = $id");
    $result = $obj->getResult();
    // echo '<pre>';
    // print_r($result);   
    // die;
    echo '<div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Approve Students</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td width="50%">Name:</td>
                                        <td>' . $result[0]['fname'] . ' ' . $result[0]['lname'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Joining Date:</td>
                                        <td>' . $result[0]['registration_date'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>Mobile:</td>
                                        <td>+91-' . $result[0]['mobile'] . '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="pending_id" id="student_id" value="' . $result[0]['s_id'] . '">
                                            <select class="form-control">
                                                <option selected disabled>Admission Fees</option>
                                            </select>
                                        <td>
                                            <input type="number" name="admission_fees" id="AdmissionFees" placeholder="Enter Fees Amount" class="form-control">
                                        </td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-1"></i>Close</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-currency-rupee mr-1"></i>Collect</button>
                </div>';
}




//! Approve 
if (isset($_POST['pending_id'])) {
    $pending_id = $obj->escapeString($_POST['pending_id']);
    $AddFess = $obj->escapeString($_POST['admission_fees']);

    // Culcutta time zone
    $dt = new DateTime("now", new DateTimeZone('Asia/Calcutta'));
    $added_on = $dt->format('d-m-Y, H:i:s');
    $obj->update('payment', ['amount' => $AddFess, 'payment_status' => 'Complete', 'added_on' => $added_on], "stu_id = '$pending_id'");

    $obj->rawsql('SELECT `registration` FROM `fresh_students` ORDER BY registration DESC LIMIT 1');
    $Registration = $obj->getResult();

    if (count($Registration) > 0) {
        $nextRegistration = $Registration[0]['registration'] + 1;
    } else {
        $nextRegistration = 120232516;
    }

    // Next Registration Number
    $obj->insert('fresh_students', ['s_id' => "$pending_id", 'registration' => $nextRegistration, 'active_status' => "1"]);

    // Set id in fees and month table 
    $DataObj->insert('new_students_fees_2023', ['s_id' => $pending_id]);
    $DataObj->insert('new_students_months_2023', ['s_id' => $pending_id]);

    $result = $obj->getResult();
    if ($result[0] == "success") {
        //! Sms sending 
        $obj->select('registration', 'registration.fname , registration.lname , registration.mobile', "s_id = $pending_id");
        $reg_res = $obj->getResult();

        $value = [$nextRegistration];
        $mobile = [$reg_res[0]['mobile']];
        $obj->sendsms('EdBiCE', '153153', $value, $mobile);
        $smsRes = $obj->getResult();
        //Update Status 
        if ($smsRes[0] == 'success') {
            echo json_encode(array('status' => 'success', 'msg' => 'Students Approve Successfull.'));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => 'SMS sending failed.'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'msg' => 'Application no updated failed.'));
    }
}
