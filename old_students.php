<?php
define("PAGE", "Registered Students Details");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                         <h3>Old Students:</h3>
                    </div>
                    <div class="col-md-12">
                         <div class="card mt-2">
                              <?php
                              $Addobj = new Database();
                              $Addobj->rawsql('SELECT o.name , o.id , o.father_name , o.stu_sl , b.batchs , c.course , o.mobile , o.status FROM old_students o INNER JOIN course c ON o.course = c.id INNER JOIN batchs b ON o.batch = b.id');
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
                                                                           <th>Registration</th>
                                                                           <th>Batch</th>
                                                                           <th>Course</th>
                                                                           <th>Mobile</th>
                                                                           <th width=5%>Action</th>
                                                                           </tr>
                                                                      </thead>
                                                                      <tbody>';
                                   $i = 1;
                                   foreach ($result as list('name' => $name, 'father_name' => $father_name, 'id' => $id, 'stu_sl' => $stu_sl, 'batchs' => $batchs, 'course' => $course, 'mobile' => $mobile, 'status' => $status)) {
                                        echo "<tr>
                                                                                     <td>$i </td>
                                                                                     <td> $name </td>
                                                                                     <td> $father_name</td>
                                                                                     <td> $stu_sl</td>
                                                                                     <td> $batchs</td>
                                                                                     <td> $course</td>
                                                                                     <td> $mobile</td>
                                                                                     
                                                                                     <td class='text-center'>
                                                                                          <button type='button' data-stu_id = '$id' class='btn btn-secondary btn-sm' id='ShowOldStudents'><i class='bi bi-eye'></i></button>
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