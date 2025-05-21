<?php
define("PAGE", "Students Fees");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>New Students Fees:</h3>
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
                                            <th width=15%>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $Addobj = new Admission();
                                        $Addobj->rawsql('SELECT r.fname,r.lname , r.father_name, f.s_id, p.batch , p.course , r.mobile ,f.active_status, f.registration FROM fresh_students f INNER JOIN personal_details p ON f.s_id = p.s_id INNER JOIN registration r ON f.s_id = r.s_id WHERE f.active_status = 1');
                                        $result = $Addobj->getResult();

                                        $i = 1;
                                        foreach ($result as list('fname' => $fname, 'lname' => $lname, 's_id' => $s_id, 'registration'=> $registration, 'batch' => $batch, 'mobile' => $mobile)) {
                                            echo "<tr>
                                                    <td>$i</td>
                                                    <td>$fname $lname</td>
                                                    <td>$batch</td>
                                                    <td>$registration</td>
                                                    <td>$mobile</td>
                                                    <td><button type='button' data-stu_id=$s_id id='student_collect' class='btn btn-outline-primary btn-sm'><i class='bi bi-currency-rupee mr-1'></i>Collect</button>
                                                    <button type='button' data-stu_id=$s_id id='StudentsDetailsBtn' class='btn btn-outline-secondary btn-sm'><i class='bi bi-eye mr-1'></i>Details</button>
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
        <form id="Old_Fees_Forms">
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