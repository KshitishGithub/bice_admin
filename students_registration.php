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
                <div class="col-12 d-flex justify-content-between">
                    <h3>Add Students:</h3>
                </div>
                <div class="col-md-12">
                    <!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>HI</strong> 
                    </div> -->

                    <div class="card">
                        <form id="AddStudentsForm">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label>Student ID:</label>
                                            <input type="text" class="form-control" name="stu_id" id="stu_id" placeholder="Student ID">
                                        </div>
                                        <div class="offset-md-8"></div>
                                        <div class="col-md-4 mt-2">
                                            <label>Student Name:</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Students Name">
                                        </div>
                                        <div cla <div class="col-md-4 mt-2">
                                            <label>Fathers' Name:</label>
                                            <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Fathers' name">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Mothers' Name:</label>
                                            <input type="text" class="form-control" name="mother_name" id="mother_name" placeholder="Mothers' name">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Dob:</label>
                                            <input type="text" class="form-control" name="dob" id="dob" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Gander:</label>
                                            <select name="gander" class="form-control" id="gander">
                                                <option selected disabled value="">--Select Gander--</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Mobile:(10 Digits)</label>
                                            <input type="text" class="form-control" name="mobile" id="mobile" data-inputmask='"mask": "9999999999"' data-mask>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Gurdain Mobile:(10 Digits)</label>
                                            <input type="text" class="form-control" name="gurdain_mobile" id="gurdain_mobile" data-inputmask='"mask": "9999999999"' data-mask>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option selected disabled value="">--Select Category--</option>
                                                    <option value="SC">SC</option>
                                                    <option value="ST">ST</option>
                                                    <option value="OBC-A">OBC-A</option>
                                                    <option value="OBC-B">OBC-B</option>
                                                    <option value="OTHERS">OTHERS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Religion</label>
                                                <select name="religion" id="religion" class="form-control">
                                                    <option selected disabled value="">--Select Religion--</option>
                                                    <option value="Hinduism">Hinduism</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Chiristianity">Chiristianity</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Course:</label>
                                            <select class="form-control" name="course" id="course">
                                                <option selected disabled value="" class="text-center">-- Select Course --</option>
                                                <?php
                                                $obj->select('course', '*', null, null, "course");
                                                $result = $obj->getResult();
                                                foreach ($result as list('id' => $id, 'course' => $course)) {
                                                    echo "<option value=" . $id . ">" . $course . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Batch</label>
                                                <select class="form-control" name="batch" id="batch">
                                                    <option disabled selected value="" class="text-center">-- Batchs --</option>
                                                    <?php
                                                    $obj->select('batchs', '*', null, null, 'batchs ASC');
                                                    $batch_res = $obj->getResult();
                                                    foreach ($batch_res as list('id' => $id, 'batchs' => $batchs, 'active_batch' => $active_batch)) {
                                                        echo "<option value=" . $id . " id=" . $id . ">" . $batchs . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Last Qualification</label>
                                                <input type="text" class="form-control" name="last_qualification" id="last_qualification" placeholder="Enter Last Qualification">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Year of Passing</label>
                                                <input type="text" class="form-control" name="passing_year" id="passing_year" data-inputmask='"mask": "9999"' data-mask>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label for="">Aadhar</label>
                                                <input type="text" class="form-control" name="aadhar" id="aadhar" data-inputmask='"mask": "9999-9999-9999"' data-mask>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Height:(K.G)</label>
                                            <input type="number" class="form-control" name="height" id="height">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Weight:(C.M)</label>
                                            <input type="number" class="form-control" name="weight" id="weight">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Chest:(C.M)</label>
                                            <input type="number" class="form-control" name="chest" id="chest">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Village:</label>
                                            <input type="text" class="form-control" name="village" id="village">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Post Office:</label>
                                            <input type="text" class="form-control" name="post_office" id="post_office">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Police Station:</label>
                                            <input type="text" class="form-control" name="police_station" id="police_station">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>District:</label>
                                            <input type="text" class="form-control" name="district" id="district">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Pin:</label>
                                            <input type="text" class="form-control" name="pin" id="pin" data-inputmask='"mask": "999999"' data-mask>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>State:</label>
                                            <input type="text" class="form-control" name="state" value="West Bengal" id="state">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Country:</label>
                                            <input type="text" class="form-control" name="country" value="India" id="country">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label>Upload Image:</label>
                                            <input type="file" class="form-control" name="image" id="image">
                                            <small class="text-danger">***Image must be less than 500kb.</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="reset" class="btn btn-secondary"><i class="bi bi-x-lg mr-2"></i>Reset</button>
                                    <button type="submit" class="btn btn-primary float-right"><i class="bi bi-save mr-2"></i>Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>