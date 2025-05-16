<?php
define("PAGE", "Old Students Fees");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                         <h3>Old Students Fees:</h3>
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
                                                       <th>Student ID</th>
                                                       <th>Mobile</th>
                                                       <th width=15%>Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $Addobj = new Database();
                                                  $Addobj->rawsql('SELECT o.name , o.id , o.father_name , o.stu_sl , b.batchs , c.course , o.mobile , o.status FROM old_students o INNER JOIN course c ON o.course = c.id INNER JOIN batchs b ON o.batch = b.id ORDER BY b.batchs');
                                                  $result = $Addobj->getResult();
                                                  // echo "<pre>";
                                                  // print_r($result);
                                                  // die;
                                                  $i = 1;
                                                  foreach ($result as list('name' => $name, 'id'=> $id , 'stu_sl' => $stu_sl, 'batchs' => $batchs, 'mobile' => $mobile)) {
                                                       echo "<tr>
                                                    <td>$i</td>
                                                    <td>$name</td>
                                                    <td>$batchs</td>
                                                    <td>$stu_sl</td>
                                                    <td>$mobile</td>
                                                    <td><button type='button' data-stu_id=$stu_sl id='old_student_collect' class='btn btn-outline-primary btn-sm'><i class='bi bi-currency-rupee mr-1'></i>Collect</button>
                                                    <button type='button' data-stu_id=$stu_sl id='OldStudentsDetailsBtn' class='btn btn-outline-secondary btn-sm'><i class='bi bi-eye mr-1'></i>Details</button>
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