<?php
define("PAGE", "All Students Details");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                         <h3>Registered Students:</h3>
                    </div>
                    <div class="col-md-12">
                         <div class="card mt-2">
                              <?php
                              $Addobj = new Admission();
                              $Addobj->select('registration', 's_id,fname,lname,father_name,mother_name,mobile,gurdain_mobile,email,dob,status','status > 0',null, 's_id DESC' );
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
                                                                           <th>Mothers Name</th>
                                                                           <th>Mobile</th>
                                                                           <th>Gurdain Mobile</th>
                                                                           <th>Email</th>
                                                                           <th width=10%>DOB</th>
                                                                           <th>Stage</th>
                                                                           <th>Action</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>';
                                   $i = 1;
                                   foreach ($result as list('s_id'=>$id,'fname' => $fname, 'lname' => $lname, 'father_name' => $father_name, 'mother_name' => $mother_name, 'gurdain_mobile' => $gurdain_mobile, 'email' => $email, 'dob' => $dob, 'mobile' => $mobile, 'status' => $status)) {
                                        echo "<tr>
                                                  <td>$i </td>
                                                  <td> $fname $lname</td>
                                                  <td> $father_name</td>
                                                  <td> $mother_name</td>
                                                  <td> $mobile</td>
                                                  <td> $gurdain_mobile</td>
                                                  <td> $email</td>
                                                  <td> $dob</td>
                                                  <td class='text-center'>";
                                                  if ($status == '1') {
                                                       echo "<span class='badge bg-info rounded-pill'>Registered</span>";
                                                  }elseif ($status == '2') {
                                                       echo "<span class='badge bg-warning rounded-pill'>Personal Completed</span>";
                                                  }elseif ($status == '3') {
                                                       echo "<span class='badge bg-primary rounded-pill'>Address Completed</span>";
                                                  } elseif ($status == '4') {
                                                       echo "<span class='badge bg-secondary rounded-pill'>Image Uploaded</span>";
                                                  } elseif ($status == '5') {
                                                       echo "<span class='badge bg-secondary rounded-pill'>Preview</span>";
                                                  } elseif ($status == '6') {
                                                       echo "<span class='badge bg-success rounded-pill'>Complete</span>";
                                                  }
                                                  echo "</td>
                                                  <td class='text-center'>
                                                       <button type='button' data-res_id = '$id' class='btn btn-danger btn-sm' id='DeleteRegisterStu'><i class='bi bi-trash'></i></button>
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


                              ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="OldStuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-xl">
          <div class="modal-content">
               <div id="LoadOldStudents">
                    <!-- Load Edit Students -->
               </div>
          </div>
     </div>
</div>
<?php
include('footer.php');
?>


<!-- <th width=5%>Status</th> -->

<!-- <td class='text-center'>
     <div class='custom-control custom-switch custom-switch-off-light custom-switch-on-success'>";
          if ($status == '1') {
          echo "<input type='checkbox' data-stu_id='$id' class='custom-control-input students_status' id='" . $id . "' checked>
          <label class='custom-control-label' for='" . $id . "'></label>";
          } else {
          echo "<input type='checkbox' data-stu_id='$id' class='custom-control-input studentstatus' id='" . $id . "'>
          <label class='custom-control-label' for='" . $id . "'></label>";
          }
          echo "
     </div>
</td> -->