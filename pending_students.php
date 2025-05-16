<?php
define("PAGE", "Pending Students Details");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <h3>Pending Students:</h3>
                    </div>
                    <div class="col-12">
                         <div class="card mt-2">
                              <div class="m-1">
                                   <?php
                                   $Addobj = new Admission();
                                   $Addobj->rawsql('SELECT r.fname , r.lname , r.father_name , r.mobile ,r.status , pd.s_id , pd.batch , pd.course, p.payment_id FROM personal_details pd INNER JOIN registration r ON r.s_id = pd.s_id INNER JOIN payment p ON r.s_id = p.stu_id WHERE p.payment_status = "Pending"');
                                   $result = $Addobj->getResult();
                                   // echo "<pre>";
                                   // print_r($result);
                                   // die;
                                   if (count($result) > 0) {
                                        echo '<div class="card-body">
                                             <div class="table-responsive">
                                                  <table class="table table-bordered table-sm table-hover" id="AllStudents">
                                                       <thead class="table-primary">
                                                            <tr>
                                                            <th width=4%>SL</th>
                                                            <th>Name</th>
                                                            <th>Fathers Name</th>
                                                            <th>Batch</th>
                                                            <th>Course</th>
                                                            <th>Mobile</th>
                                                            <th width=5%>Status</th>
                                                            <th width=5%>View</th>
                                                            <th width=5%>Action</th>
                                                            <th width=5%>Registration Edit</th>
                                                            <th width=5%>Student Edit</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>';
                                        $i = 1;
                                        foreach ($result as list('fname' => $fname, 'lname' => $lname, 'father_name' => $father_name, 's_id' => $s_id, 'batch' => $batch, 'course' => $course, 'mobile' =>$mobile, 'status' => $status)) {
                                             echo "<tr>
                                                  <td>$i </td>
                                                  <td> $fname  $lname </td>
                                                  <td> $father_name</td>
                                                  <td> $batch</td>
                                                  <td> $course</td>
                                                  <td> $mobile</td>
                                                  <td class='text-center'>
                                                     <span class='badge bg-info rounded-pill'>Pending</span>
                                                  </td>
                                                  <td class='text-center'>
                                                       <button type='button' data-stu_id = '$s_id' class='btn btn-secondary btn-sm' id='ViewPendingStudents'><i class='bi bi-eye'></i></button>
                                                  </td>
                                                  <td class='text-center'>
                                                       <button type='button' data-stu_id = '$s_id' class='btn btn-warning btn-sm' id='ApproveStudents'><i class='bi bi-check-square'></i></button>
                                                  </td>
                                                  <td class='text-center'>
                                                       <a href='edit_registration.php?id=$s_id' class='btn btn-primary btn-sm'><i class='bi bi-pencil-square'></i></a>
                                                  </td>
                                                  <td class='text-center'>
                                                        <div class='custom-control custom-switch custom-switch-off-light custom-switch-on-success'>";
                                                  if ($status <= '4') {
                                                       echo "<input type='checkbox' data-stu_id = '$s_id' class='custom-control-input edit_mode' id='" . $s_id . "' checked>
                                                                 <label class='custom-control-label' for='" . $s_id . "'></label>";
                                                  } else {
                                                       echo "<input type='checkbox' data-stu_id = '$s_id' class='custom-control-input edit_mode' id='" . $s_id . "'>
                                                                 <label class='custom-control-label' for='" . $s_id . "'></label>";
                                                  }
                                                  echo "</div>
                                                       </td>
                                        </tr>";
                                             $i++;
                                        }
                                        echo '</tbody>
                                        </table>
                                   </div>
                              </div>';
                                   } else {
                                        echo "<div class='card mt-2'>
                                             <div class='text-center'><span class='text-danger h4'>No Data Found !</span></div>
                                        </div>";
                                   }
                                   ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>

          <!-- Approve Modal -->
          <div class="modal fade" id="ApproveModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog modal-lg">
                    <form id="ApproveForm">
                         <div class="modal-content">
                              <div id="ApproveModalContent">
                                   <!-- Load Content Here -->
                              </div>
                         </div>
                    </form>
               </div>
          </div>



          <!-- Pending View Modal -->
          <div class="modal fade" id="PendingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
               <div class="modal-dialog modal-xl">
                    <form id="PendingForm">
                         <div class="modal-content">
                              <div id="PendingModalContent">
                                   <!-- Load Content Here -->
                              </div>
                         </div>
                    </form>
               </div>
          </div>
          <?php
          include('footer.php');
          ?>