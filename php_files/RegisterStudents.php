<?php
include('database.php');
$obj = new Admission();
$id = $obj->escapeString($_POST['id']);

$obj->rawsql("SELECT * FROM fresh_students f LEFT JOIN registration r ON f.s_id = r.s_id LEFT JOIN comunication c ON f.s_id = c.s_id LEFT JOIN personal_details pd ON f.s_id = pd.s_id LEFT JOIN photo_signature ps ON f.s_id = ps.s_id WHERE f.s_id = $id");
$result = $obj->getResult();
$result = $result[0];
$res = $result['com_know'] == 'on' ? "Yes" : "No";
// echo "<pre>";
// print_r($result);
// die;
    
echo '<div class="modal-header bg-primary">
                    <h5 class="modal-title" id="staticBackdropLabel">Registered Students:</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                    <div class="card">
                        <div class="card-content">
                            <form id="UpdateRegisteredStudents">
                                <div class="card-body">
               <div class="row">
                    <div class="col-12 text-center">
                         <h2>Student Id : '. $result['registration'] .'</h2>
                    </div>
                    <div class="col-md-6">
                         <span class="fw-bolder fs-5"><u><b>Personal Details:</b></u></span>
                         <table class="table table-border fw-bolder">
                              <tbody>
                                   <tr>
                                        <td scope="row">Applicant Name:</td>
                                        <td>'. $result['fname'] .' '. $result['lname']. '</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Fathers Name:</td>
                                        <td>' . $result['father_name'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Mothers Name:</td>
                                        <td>' . $result['mother_name'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Gander:</td>
                                        <td>' . $result['gander'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Religion:</td>
                                        <td>' . $result['religion'] . '</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Category:</td>
                                        <td>' . $result['category'] . '</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Aadhar:</td>
                                        <td>' . $result['aadhar'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Date of birth:</td>
                                        <td>' . $result['dob'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Course:</td>
                                        <td>' . $result['course'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Batch:</td>
                                        <td>' . $result['batch'] .'</td>
                                   </tr>
                                    <tr>
                                        <td scope="row">Registration Date:</td>
                                        <td>' . $result['registration_date'] . '</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
                    <div class="col-md-6">
                         <div class="row mt-md-5">
                              <div class="offset-md-5 col-md-7">
                                   <tr>
                                        <td>
                                             <label class="py-2">Applicants Photo</label><br>
                                             <img src="../admission/photos/images/'. $result['photo']. '" height="200" width="120" alt="photo" class="img-fluid">
                                        </td>
                                        <br>
                                        <td>
                                             <label class="py-2">Applicants Signature</label><br>
                                             <img src="../admission/photos/signatures/' . $result['sig'] . '" height="50" width="120" alt="photo" class="img-fluid">
                                        </td>
                                   </tr>
                              </div>
                         </div>
                    </div>
                    <hr class="border-success opacity-50 my-3">
                    <div class="col-md-6">
                         <span class="fw-bolder fs-5"><u><b>Address Details:</b></u></span>
                         <table class="table table-border fw-bolder">
                              <tbody>
                                   <tr>
                                        <td scope="row">Village:</td>
                                        <td>' . $result['vill'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Locality:</td>
                                        <td>' . $result['locality'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Post Office:</td>
                                        <td>' . $result['po'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Police Station:</td>
                                        <td>' . $result['ps'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">District:</td>
                                        <td>' . $result['dist'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Pin:</td>
                                        <td>' . $result['pin'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">State:</td>
                                        <td>' . $result['state'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Country:</td>
                                        <td>' . $result['country'] . '</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
                    <div class="col-md-6">
                         <span class="fw-bolder fs-5"><u><b>Communination Details:</b></u></span>
                         <table class="table table-border fw-bolder">
                              <tbody>
                                   <tr>
                                        <td scope="row">Mobile:</td>
                                        <td>' . $result['mobile'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Gurdain Mobile:</td>
                                        <td>' . $result['gurdain_mobile'] .'</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Email:</td>
                                        <td>' . $result['email'] . '</td>
                                   </tr>
                              </tbody>
                         </table>
                         <span class="fw-bolder fs-5"><u><b>Physical Details:</b></u></span>
                         <table class="table table-border fw-bolder">
                              <tbody>
                                   <tr>
                                        <td scope="row">Height:</td>
                                        <td> ' . $result['height'] .'cm.</td>
                                   </tr>
                                   <tr>
                                        <td scope="row">Weight:</td>
                                        <td> ' . $result['weight'] .'kg.</td>
                                   </tr>
                                   <td scope="row">Cheast:</td>
                                   <td> ' . $result['chest'] . 'cm.</td>
                                   </tr>
                              </tbody>
                         </table>
                    </div>
                    <hr class="border-success opacity-50 my-3">
                    <div class="col-12  mt-2">
                         <span class="fw-bolder fs-5"><b>Qualification Details:</b></span>
                         <div class="">
                              <table class="table fw-bolder mt-3">
                                   <tbody>
                                        <tr>
                                             <td>Last Qualification</td>
                                             <td>Year of passing</td>
                                             <td>Extra course</td>
                                        </tr>
                                        <tr>
                                             <td>' . $result['last_qualification'] .'</td>
                                             <td>' . $result['passing_year'] .'</td>
                                             <td>' . $result['ex_course'] . '</td>
                                        </tr>
                                   </tbody>
                              </table>
                         </div>
                    </div>
                    <span class="mt-2">Computer Knowledge : ' . $res .' </span>
                    <hr class="border-success opacity-50 my-3">
                    <div class="card-footer">
                    <button type="button" class="btn btn-danger modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-1"></i>Close</button>
                </div>
               </div>
          </div>
          </form>
     </div>
</div>';


