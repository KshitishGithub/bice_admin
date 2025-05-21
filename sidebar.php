<?php
if (!isset($_SESSION['admin_role'])) {
?>
    <script>
        location.href = "index.php";
    </script>
<?php
}
?>

<!-- Sidebar Nav Container -->

<aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="page-dashboard.php" target="_blank" class="brand-link">
        <img src="assets/img/logo.png" style="max-width:50px ;" alt="Admin Logo" class="brand-image mt-1">
        <span class="brand-text font-weight-bolder">BiCE Institute</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="page-dashboard.php" class="nav-link <?php if (PAGE == "home") {
                                                                        echo 'active';
                                                                    } ?>">
                        <ion-icon name="speedometer-outline"></ion-icon>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (PAGE == "Setting") {
                                                    echo 'active';
                                                } ?>">
                        <ion-icon name="settings-outline"></ion-icon>
                        <p>Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="setting.php" class="nav-link">
                                <ion-icon name="cog-outline"></ion-icon>
                                <p>All Settings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bannerImage.php" class="nav-link">
                                <ion-icon name="image-outline"></ion-icon>
                                <p>Banner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="gallary.php" class="nav-link">
                                <ion-icon name="images-outline"></ion-icon>
                                <p>Gallary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="SmsSetting" class="nav-link">
                                <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                                <p>SMS Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="BatchSetting" class="nav-link">
                                <ion-icon name="grid-outline"></ion-icon>
                                <p>Batch</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" id="CourseSetting" class="nav-link">
                                <ion-icon name="albums-outline"></ion-icon>
                                <p>Course</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (PAGE == "Students Fees" || PAGE == "Students Fees Report") {
                                                    echo 'active';
                                                } ?>">
                        <ion-icon name="cash-outline"></ion-icon>
                        <p>Student Fees
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="students_fees.php" class="nav-link">
                                <i class="bi bi-currency-rupee"></i>
                                <p>New Students Fess</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="old_students_fees.php" class="nav-link">
                                <i class="bi bi-currency-rupee"></i>
                                <p>Old Students Fess</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="students_fees_report.php" class="nav-link <?php if (PAGE == "Students Fees Report") {
                                                    echo 'active';
                                                } ?>">
                                <i class="bi bi-currency-rupee"></i>
                                <p>New Students Fess Reports</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="old_students_fees_report.php" class="nav-link <?php if (PAGE == "Students Fees Report") {
                                                    echo 'active';
                                                } ?>">
                                <i class="bi bi-currency-rupee"></i>
                                <p>Old Students Fess Reports</p>
                            </a>
                        </li>
                    </ul>
                    
                    <!--<ul class="nav nav-treeview">-->
                    <!--    <li class="nav-item">-->
                    <!--        <a href="old_due_list.php" class="nav-link">-->
                    <!--            <i class="bi bi-currency-rupee"></i>-->
                    <!--            <p>Old Due Students</p>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--</ul>-->
                    <!--<ul class="nav nav-treeview">-->
                    <!--    <li class="nav-item">-->
                    <!--        <a href="due_list.php" class="nav-link">-->
                    <!--            <i class="bi bi-currency-rupee"></i>-->
                    <!--            <p>New Due Students</p>-->
                    <!--        </a>-->
                    <!--    </li>-->
                    <!--</ul>-->
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if (PAGE == "All Students Details") {
                                                    echo 'active';
                                                } ?>">
                        <ion-icon name="people-outline"></ion-icon>
                        <p>Students Section
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="registered.php" class="nav-link">
                                <i class="bi bi-r-circle"></i>
                                <p>Registered Students</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="students_registration.php" class="nav-link">
                                <i class="bi bi-plus"></i>
                                <p>Add Old Students</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pending_students.php" class="nav-link">
                                <i class="bi bi-person"></i>
                                <p>Pending Students</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="all_students.php" class="nav-link">
                                <i class="bi bi-person-check"></i>
                                <p>New Students List</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="old_students.php" class="nav-link">
                                <i class="bi bi-person-check"></i>
                                <p>Old Students List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="success_students.php" class="nav-link <?php if (PAGE == "Success Students") {
                                                                        echo 'active';
                                                                    } ?>">
                        <ion-icon name="checkmark-done-outline"></ion-icon>
                        <p>Success Students</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="page-youtube.php" class="nav-link <?php if (PAGE == "Youtube Videos") {
                                                                    echo 'active';
                                                                } ?>">
                        <ion-icon name="videocam-outline"></ion-icon>
                        <p>YouTube Videos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="page-notice.php" class="nav-link <?php if (PAGE == "Notice") {
                                                                    echo 'active';
                                                                } ?>">
                        <ion-icon name="alert-circle-outline"></ion-icon>
                        <p>Notice</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="page-contact.php" class="nav-link <?php if (PAGE == "Contact") {
                                                                    echo 'active';
                                                                } ?>">
                        <ion-icon name="call-outline"></ion-icon>
                        <p>Contact</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="student_id_card.php" class="nav-link <?php if (PAGE == "ID Card") {
                                                                        echo 'active';
                                                                    } ?>">
                        <ion-icon name="card-outline"></ion-icon>
                        <p>Student ID Card</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>





<!-- Add Modal -->
<div class="modal fade" id="SmsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form>
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Send SMS Setting</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="LoadStatus">
                            <!-- Load Status Content -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Group Modal -->
<div class="modal fade" id="GroupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="SmsForm">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Batch Setting</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="LoadGroup">
                            <!-- Load Status Content -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Add Batch -->
<div class="modal fade" id="AddBatchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Batch Setting</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="BatchForm">
                        <label>Add Batch:</label>
                        <input type="text" class="form-control" name="batch_name" id="batch_name" placeholder="Add Batchs Name">
                        <button type="submit" class="btn btn-success btn-block mt-3">Add Batch</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Course Modal -->
<div class="modal fade" id="CourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form id="SmsForm">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Course Setting</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div id="LoadCourse">
                            <!-- Load Status Content -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<!-- Add Batch -->
<div class="modal fade" id="AddCourseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Course Setting</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="CourseForm">
                        <label>Add Course:</label>
                        <input type="text" class="form-control" name="course_name" id="course_name" placeholder="Add Course Name">
                        <button type="submit" class="btn btn-success btn-block mt-3">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>