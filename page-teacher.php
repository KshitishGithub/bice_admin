<?php
define("PAGE", "teachers");
include('header.php');
include('sidebar.php');

?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h3>All Teachers:</h3>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#AddTeachers" class="btn btn-success float-right mb-3"> <i class="bi bi-plus-square mr-2"></i>Add Teacher</button>
                </div>
                <div class="col-md-12">
                    <div class="card mt-2">
                        <div class="row text-center p-2">
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>GI Teacher</p>
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#EditTeachers">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="StudentsDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Ramen Barman</b></span>
                                <p>Math Teacher</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                            <div class="col-md-2 mb-2">
                                <img src="img/teacher-1.jpg" class="img-fluid rounded" alt="">
                                <span><b>Kshitish Barman</b></span>
                                <p>WB Police</p>
                                <button type="button" class="btn btn-secondary btn-sm">Edit</button>
                                <button type="button" class="btn btn-danger btn-sm" id="YoutubeDelete">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade" id="AddTeachers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Teacher</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Teachers Name:</label>
                            <input type="text" class="form-control" name="stunents_name" id="stunents_name" placeholder="Stunents name">
                            <label for="">Teachers Subject:</label>
                            <input type="text" class="form-control" name="stunents_job" id="stunents_job" placeholder="Stunents Job Name">
                            <label for="">Teachers Photo:</label>
                            <input type="file" name="stunents_photo" id="stunents_photo" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-save mr-2"></i>Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="EditTeachers" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="" method="post">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Teachers</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Teachers Name:</label>
                            <input type="text" class="form-control" name="stunents_name" id="stunents_name" value="Stunents name">
                            <label for="">Teachers Subject:</label>
                            <input type="text" class="form-control" name="stunents_job" id="stunents_job" value="Stunents Job Name">
                            <label for="">Teachers Photo:</label>
                            <input type="file" name="stunents_photo" id="stunents_photo" class="form-control">
                            <img style="max-width:250px" src="img/teacher-1.jpg" class="img-thumbnail mt-2 rounded" alt="">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg mr-2"></i>Close</button>
                    <button type="button" class="btn btn-primary"><i class="bi bi-save mr-2"></i>Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include('footer.php');

?>