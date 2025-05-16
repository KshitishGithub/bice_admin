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
                    <h3>All Students:</h3>
                    <!-- <select class="form-control" style="max-width:150px ;" aria-label="Default select example">
                        <option selected disabled>-Select Group-</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                    </select> -->
                    <!-- <a href="students_registration.php" class="btn btn-success mt-1 float-right"><i class="bi bi-plus-square mr-2"></i>Add Students</a> -->
                </div>
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div id="LoadRegisterStudents">
                            <!-- Load Register Students -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="EditRegisteredStudents" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div id="LoadEditRegisterStudents">
                <!-- Load Edit Students -->
            </div>
        </div>
    </div>
</div>
<?php
include('footer.php');
?>