<?php
define("PAGE", "Students Due Fees");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
     <div class="content-header">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                         <h3>New Students Due List:</h3>
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

                                                  //! Student data from Admission database...

                                                  $Addobj = new Admission();
                                                  $Addobj->rawsql('SELECT r.fname,r.lname , f.s_id, p.batch ,f.registration, r.mobile FROM fresh_students f LEFT JOIN personal_details p ON f.s_id = p.s_id LEFT JOIN registration r ON f.s_id = r.s_id WHERE f.active_status = 1');
                                                  $result = $Addobj->getResult();
                                                  
                                                  // echo '<pre>';
                                                  // print_r($result);
                                                  // die;
                                                  //! Fess data from another database...........
                                                  $dobj = new Database();
                                                  $dobj->rawsql('SELECT * FROM new_students_months_2023 f LEFT JOIN new_students_fees_2023 m ON f.s_id = m.s_id ORDER BY m.s_id');
                                                  $d_result = $dobj->getResult();
                                                  // echo '<pre>';
                                                  // print_r($d_result);
                                                  // die;
                                                       $multi_array=[]; //empty array
                                                       for ($i=0; $i < count($result); $i++) { 
                                                            if ($result[$i]['s_id'] == $d_result[$i]['s_id']) { // check s_id is same or not
                                                             $arr_merge = array_merge($result[$i], $d_result[$i]);  // array merge two diffrent result in single s_id;
                                                             array_push($multi_array, $arr_merge);           // push multi s_id in single array.....                                       
                                                            }
                                                       }
                                                  //      echo '<pre>';
                                                  //     print_r($multi_array);
                                                       $i= 1;
                                                       foreach ($multi_array as list('fname'=>$fname , 'lname'=>$lname, 'registration' =>$registration, 'batch' =>$batch, 'mobile' => $mobile, 'jan' => $jan, 'feb' => $feb, 'mar' => $mar, 'apr' => $apr, 'may' => $may, 'jun' => $jun, 'jul' => $jul, 'aug' => $aug, 'sep' => $sep, 'oct' => $oct, 'nov' => $nov, 'dece' => $dece)) {
                                                            echo "<tr class='text-center'>
                                                                 <td width=2%>$i</td>
                                                                 <td>$fname $lname</td>
                                                                 <td>$batch</td>
                                                                 <td>$registration</td>
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