<?php
include('database.php');
$obj = new Database();

$Addobj = new Admission();
$Addobj->rawsql('SELECT r.fname,r.lname , r.father_name, f.s_id, p.batch , p.course , r.mobile ,f.active_status , f.registration FROM fresh_students f INNER JOIN personal_details p ON f.s_id = p.s_id INNER JOIN registration r ON f.s_id = r.s_id order by f.registration asc');
$result = $Addobj->getResult();



if (count($result) > 0) {
    echo '<div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm table-hover" id="AllStudents">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width=4%>SL</th>
                                            <th>Name</th>
                                            <th>Fathers Name</th>
                                            <th>Registration</th>
                                            <th>Batch</th>
                                            <th>Course</th>
                                            <th>Mobile</th>
                                            <th width=5%>Status</th>
                                            <th width=8%>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                                        $i = 1;
                                        foreach ($result as list('fname' => $fname,'lname' => $lname, 'father_name' => $father_name, 's_id' =>$s_id, 'registration'=> $registration, 'batch' => $batch, 'course' => $course, 'mobile' => $mobile,'active_status' => $active_status)) {
                                            echo "<tr>
                                                    <td>$i </td>
                                                    <td> $fname  $lname </td>
                                                    <td> $father_name</td>
                                                    <td> $registration</td>
                                                    <td> $batch</td>
                                                    <td> $course</td>
                                                    <td> $mobile</td>
                                                    <td class='text-center'>
                                                        <div class='custom-control custom-switch custom-switch-off-light custom-switch-on-success'>";
                                                        if($active_status == '1'){
                                                            echo "<input type='checkbox' data-stu_id = '$s_id' class='custom-control-input students_status' id='" . $s_id . "' checked>
                                                            <label class='custom-control-label' for='" . $s_id . "'></label>";
                                                        }else {
                                                            echo "<input type='checkbox' data-stu_id = '$s_id' class='custom-control-input students_status' id='" . $s_id . "'>
                                                            <label class='custom-control-label' for='" . $s_id . "'></label>";
                                                        }
                                                       echo "</div>
                                                    </td>
                                                    <td class='text-center'>
                                                        <button type='button' data-stu_id = '$s_id' class='btn btn-secondary btn-sm mr-2' id='RegisterStudents'><i class='bi bi-eye'></i></button>
                                                        <button type='button' data-stu_id = '$s_id' class='btn btn-danger btn-sm' id='DeleteRegisterStudents'><i class='bi bi-trash'></i></button>
                                                     </td>
                                                </tr>";
                                            $i++;
                                        }
                            echo '</tbody>
                                </table>
                            </div>
                        </div>';
                    } else {
                    echo "<div class='card mt-2 row '>
                                <div class='text-center'><span class='text-danger h4 '>No Data Found !</span></div>
                            </div>";
                    }
                    