<?php
define("PAGE", "Old Students Due Fees");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                         <h3>Old Students Due List:</h3>
                    </div>
                    <div class="col-md-12">
                         <div class="card mt-2">
                              <div class="card-body">
                                   <div class="table-responsive">
                                        <table class="table mt-5 table-bordered table-sm table-hover" id="student_fees">
                                             <thead class="table-success">
                                                  <tr>
                                                       <th width=3%>SL</th>
                                                       <th>Name</th>
                                                       <th>Batch</th>
                                                       <th>Registration</th>
                                                       <th>Mobile</th>
                                                       <th>JAN</th>
                                                       <th>FEB</th>
                                                       <th>MAR</th>
                                                       <th>APR</th>
                                                       <th>MAY</th>
                                                       <th>JUN</th>
                                                       <th>JUL</th>
                                                       <th>AUG</th>
                                                       <th>SEP</th>
                                                       <th>OCT</th>
                                                       <th>NOV</th>
                                                       <th>DEC</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php

                                                  //! Old Student data from database...

                                                  $Addobj = new Database();
                                                  $Addobj->rawsql('SELECT * FROM old_students s INNER JOIN old_students_fees_2023 o ON s.stu_sl = o.s_id LEFT JOIN batchs b ON s.batch = b.id');
                                                  $result = $Addobj->getResult();

                                                  // echo '<pre>';
                                                  // print_r($result);
                                                  // die;
                                                  $i = 1;
                                                  foreach ($result as list('name' => $name, 'stu_sl' => $stu_sl, 'batchs' => $batchs, 'mobile' => $mobile, 'jan' => $jan, 'feb' => $feb, 'mar' => $mar, 'apr' => $apr, 'may' => $may, 'jun' => $jun, 'jul' => $jul, 'aug' => $aug, 'sep' => $sep, 'oct' => $oct, 'nov' => $nov, 'dece' => $dece)) {
                                                       echo "<tr class='text-center'>
                                                                 <td width=2%>$i</td>
                                                                 <td>$name</td>
                                                                 <td>$batchs</td>
                                                                 <td>$stu_sl</td>
                                                                 <td>$mobile</td>
                                                                 <td>$jan</td>
                                                                 <td>$feb</td>
                                                                 <td>$mar</td>
                                                                 <td>$apr</td>
                                                                 <td>$may</td>
                                                                 <td>$jun</td>
                                                                 <td>$jul</td>
                                                                 <td>$aug</td>
                                                                 <td>$sep</td>
                                                                 <td>$oct</td>
                                                                 <td>$nov</td>
                                                                 <td>$dece</td>
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


<?php
include('footer.php');
?>