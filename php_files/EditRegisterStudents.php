<?php
include('database.php');
$obj = new Database();
// $obj->rawsql('SELECT * FROM students_registration_2022 LEFT JOIN batchs ON students_registration_2022.batch = batchs.batch_id WHERE id = 1');
// $coursed = $obj->getResult();
// echo "<pre>";
// print_r($coursed);
// die;
$id = $obj->escapeString($_POST['id']);
$obj->select("students_registration_2022", "*", "student_id = $id",null , null);
$result = $obj->getResult();
echo '<div class="modal-header bg-secondary">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Registered Students:</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>          
                    <div class="card">
                        <div class="card-content">
                            <form id="UpdateRegisteredStudents">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                        <input type="hidden" name="student_id"  value="' . $result[0]['student_id']. '">
                                            <label>Name:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="name" value="'.$result[0]['name'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Fathers Name:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="father_name" id="father_name" value="' . $result[0]['father_name'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Dob:<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="dob" id="dob" value="' . $result[0]['dob'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Gander:<span class="text-danger">*</span></label>
                                            <select class="form-control" name="gander" id="gander" value="' . $result[0]['gander'] . '">';
                                            if ($result[0]['gander'] == 'Male') {
                                                $male = "selected";
                                            } elseif ($result[0]['gander'] == 'Female') {
                                                $female = "selected";
                                            }
                                        echo '<option disabled value="">--Choose Gander--</option>
                                                <option ' . $male . ' value="Male" >Male</option>
                                                <option ' . $female . ' value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Mobile:<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="mobile" id="mobile" value="' . $result[0]['mobile'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Email:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="email" id="email" value="' . $result[0]['email'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Height:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="height" id="height" value="' . $result[0]['height'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Weight:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="weight" id="weight" value="' . $result[0]['weight'] . '"  >
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Last Qualification:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="qualification" id="qualification" value="' . $result[0]['last_qualification'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Course:<span class="text-danger">*</span></label>
                                            <select class="form-control" name="course" id="course">
                                                <option selected disabled value="" class="text-center">-- Select Course --</option>';
                                                $obj->select('course', '*', null, null, "course");
                                                $getcourse = $obj->getResult();
                                                foreach ($getcourse as list('course_id' => $course_id, 'course' => $course)) {
                                                    if($course_id == $result[0]['course']){
                                                        echo "<option selected value=" . $course_id . ">" . $course . "</option>";
                                                    }else{
                                                        echo "<option value=" . $course_id . ">" . $course . "</option>";
                                                    }
                                                };
                                    echo '</select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Batch:<span class="text-danger">*</span></label>
                                            <select class="form-control" name="batch" id="batch">';
                                            $obj->select('batchs', '*', null, null, null);
                                                $getbatch = $obj->getResult();
                                                foreach ($getbatch as list('batch_id' => $batch_id, 'batchs' => $batch)) {
                                                    if($batch_id == $result[0]['batch']){
                                                        echo "<option selected value=" . $batch_id . ">" . $batch . "</option>";
                                                    }else{
                                                        echo "<option value=" . $batch_id . ">" . $batch . "</option>";
                                                    }
                                                };
                                           echo ' </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Aadhar:<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="aadhar" id="aadhar" value="' . $result[0]['aadhar'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Village:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="village" id="village" value="' . $result[0]['vill'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Post Office:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="post_office" id="post_office" value="' . $result[0]['po'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Police Station:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="police_station" id="police_station" value="' . $result[0]['ps'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>District:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="district" id="district" value="' . $result[0]['dist'] . '">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Pin:<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="pin" id="pin" value="' . $result[0]['pin'] . '">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary modal_close" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-save mr-2"></i>Update</button>
                                </div>
                            </form>
                        </div>
                    </div>';


