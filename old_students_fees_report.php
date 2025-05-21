<?php
define("PAGE", "Students Fees Report");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>Old Students Fees Reports:</h3>
                </div>
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mt-5 table-bordered table-sm table-hover" id="student_fees">
                                    <thead class="table-success">
                                        <tr>
                                            <th width=5%>SL</th>
                                            <th>Name</th>
                                            <th>Batch</th>
                                            <th>Registration</th>
                                            <th>Mobile</th>
                                            <th>Month-Year</th>
                                            <th>Amount</th>
                                            <th>Payment Type</th>
                                            <th>Payment By</th>
                                            <th>Transaction ID</th>
                                            <th>Date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $obj = new Database();

                                        // Get all fees transactions for the selected year
                                        $obj->rawsql("SELECT * FROM old_fees_collection ORDER BY id DESC");

                                        $fees_result = $obj->getResult();
                                        // echo "<pre>";
                                        // print_r($fees_result);
                                        // die;

                                        // Get unique student IDs
                                        $studentIds = [];
                                        foreach ($fees_result as $entry) {
                                            $studentIds[$entry['student_id']] = true;
                                        }
                                        $uniqueIds = array_keys($studentIds);
                                        
                                        if (empty($uniqueIds)) {
                                            echo "<tr><td colspan='12'>No transactions found for the selected year.</td></tr>";
                                            exit;
                                        }

                                        $idList = implode(',', array_map('intval', $uniqueIds));

                                        // Fetch student details
                                        $obj->rawsql(
                                            "SELECT * FROM old_students s LEFT JOIN batchs b ON s.batch = b.id WHERE s.status = 1 AND s.stu_sl IN ($idList)"
                                        );
                                        $student_result = $obj->getResult();

                                        // echo "<pre>";
                                        // print_r($student_result);
                                        // echo "</pre>";
                                        // die;

                                        // Map student info by stu_sl (NOT s_id)
                                        $student_map = [];
                                        foreach ($student_result as $stu) {
                                            $student_map[$stu['stu_sl']] = $stu;
                                        }

                                        // Show transaction rows
                                        $i = 1;
                                        foreach ($fees_result as $fee) {
                                            $sid = $fee['student_id'];
                                            if (!isset($student_map[$sid])) continue;

                                            $stu = $student_map[$sid];
                                            $name = $stu['name'];
                                            $batch = $stu['batchs'];
                                            $registration = $stu['stu_sl'];
                                            $mobile = $stu['mobile'];
                                            $amount = $fee['amount'];
                                            $payment_type = $fee['payment_type'];
                                            $payment_by = $fee['payment_by'];
                                            $transaction_id = $fee['transection_id'] ?: 'N/A';
                                            $created_at = date('d-m-Y h:i A', strtotime($fee['created_at']));

                                            // Decode months and prepare month-year string
                                            $months = json_decode($fee['months']);
                                            $monthYear = !empty($months) ? implode(', ', array_map('ucfirst', $months)) . " {$fee['year']}" : '-';

                                            echo "<tr>
                                                    <td>$i</td>
                                                    <td>$name</td>
                                                    <td>$batch</td>
                                                    <td>$registration</td>
                                                    <td>$mobile</td>
                                                    <td>$monthYear</td>
                                                    <td>₹$amount</td>
                                                    <td>$payment_type</td>
                                                    <td>$payment_by</td>
                                                    <td>$transaction_id</td>
                                                    <td>$created_at</td>
                                                    <td class='text-center'>
                                                        <button type='button' data-stu_id='$sid' id='old_student_collect' class='btn btn-outline-secondary btn-sm'>
                                                            <i class='bi bi-eye mr-1'></i>Details
                                                        </button>
                                                    </td>
                                                </tr>";
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- student fees -->
<div class="modal fade" id="StudentsFees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="Fees_Forms">
            <div class="modal-content">
                <div id="LoadCollectStudents">
                    <!-- Load Content Here -->
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Students Details Modal -->
<div class="modal fade" id="StudentsDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="FeesDetails">
            <!-- Load students Fess Details -->
        </form>
    </div>
</div>

<?php
include('footer.php');
?>