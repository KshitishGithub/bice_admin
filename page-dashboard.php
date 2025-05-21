<?php
define("PAGE", "Home");
include('header.php');
include('sidebar.php');
?>

<!-- Main content of dashboard -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <?php
                                        $Addobj->select('fresh_students', '*');
                                        $res = $Addobj->getResult();
                                        echo "<h3>" . count($res) . "</h3>"
                                        ?>
                                        <p>Students</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-graduation-cap"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <?php
                                        $Addobj->rawsql('SELECT r.fname , r.lname , r.father_name , r.mobile , pd.s_id , pd.batch , pd.course, p.payment_id FROM personal_details pd LEFT JOIN registration r ON r.s_id = pd.s_id LEFT JOIN payment p ON r.s_id = p.stu_id WHERE p.payment_status = "Pending"');
                                        $res = $Addobj->getResult();
                                        echo "<h3>" . count($res) . "</h3>"
                                        ?>
                                        <p>Pending Students</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>15</h3>
                                        <p>Faculty</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <?php
                                        $obj->select('success_students', '*');
                                        $res = $obj->getResult();
                                        echo "<h3>" . count($res) . "</h3>"
                                        ?>
                                        <p>Success Students</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- here the charts  -->
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i> Admission Chart
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- here charts -->
                                    <div class="card-body">
                                        <canvas id="admission"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card card-danger card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="far fa-chart-bar"></i> Success Studetns Chart
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- here charts -->
                                    <div class="card-body">
                                        <canvas id="book_sells"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 connectedSortable">
                                <div class="card">
                                    <div class="card-header bg-secondary">
                                        <h3 class="card-title">Pending Students Details:</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mt-5 table-bordered table-sm table-hover dashboard_table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Batch</th>
                                                        <th>Course</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $Addobj->rawsql('SELECT r.fname , r.lname , r.father_name , r.mobile , pd.s_id , pd.batch , pd.course, p.payment_id FROM personal_details pd LEFT JOIN registration r ON r.s_id = pd.s_id LEFT JOIN payment p ON r.s_id = p.stu_id WHERE p.payment_status = "Pending"');
                                                    $pendingStudents = $Addobj->getResult();
                                                    // print_r($pendingStudents);
                                                    // die;
                                                    $i = 1;
                                                    foreach ($pendingStudents as list('fname' => $fname, 'lname' => $lname, 'batch' => $batch, 'course' => $course)) {
                                                        echo "<tr>
                                                                        <td>$i</td>
                                                                        <td>$fname $lname</td>
                                                                        <td>$batch</td>
                                                                        <td>$course</td>
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
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-danger">
                                        <h3 class=" card-title">Last Admission:</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-sm dashboard_table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th>Name</th>
                                                        <th>Batch</th>
                                                        <th>Course</th>
                                                        <th>Registration</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $Addobj->rawsql('SELECT r.fname, r.lname, r.father_name, f.s_id, p.batch, p.course, r.mobile, f.registration, f.active_status FROM fresh_students f INNER JOIN personal_details p ON f.s_id = p.s_id INNER JOIN registration r ON f.s_id = r.s_id ORDER BY f.application DESC LIMIT 50');
                                                    $result = $Addobj->getResult();
                                                    $i = 1;
                                                    foreach ($result as list('fname' => $fname, 'lname' => $lname, 'batch' => $batch, 'course' => $course, 'registration' => $registration)) {
                                                        echo "<tr>
                                                                        <td>$i</td>
                                                                        <td>$fname $lname</td>
                                                                        <td>$batch</td>
                                                                        <td>$course</td>
                                                                        <td>$registration</td>
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
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-warning">
                                        <h3 class="card-title">Batch Wise Students Details:</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-sm dashboard_table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th width="30%">Batch</th>
                                                        <th width="20%">Up to date</th>
                                                        <th width="25%">Old Students</th>
                                                        <th width="25%">New Students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // 1. Get all batches
                                                    $obj->rawsql("SELECT MIN(id) as id, batchs FROM batchs GROUP BY batchs ORDER BY batchs ASC");
                                                    $batches = $obj->getResult();

                                                    if (!empty($batches)) {
                                                        $j = 1;
                                                        $date = date('d-M-Y');

                                                        foreach ($batches as $batch) {
                                                            $batch_id = $batch['id'];
                                                            $batch_name = $batch['batchs'];

                                                            $obj->select('old_students', 'COUNT(*) as total', 'batch = ' . $batch_id);
                                                            $old_result = $obj->getResult();
                                                            $old_count = $old_result[0]['total'];

                                                            $Addobj->select('personal_details', 'COUNT(*) as total', "batch = '$batch_name'");
                                                            $new_result = $Addobj->getResult();
                                                            $new_count = $new_result[0]['total'];

                                                            echo "<tr>
                                                                    <td>$j</td>
                                                                    <td>$batch_name</td>
                                                                    <td>$date</td>
                                                                    <td>$old_count</td>
                                                                    <td>$new_count</td>
                                                                </tr>";
                                                            $j++;
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5'><h5 class='text-center text-danger'>No batch data found.</h5></td></tr>";
                                                    }

                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-success">
                                        <h3 class=" card-title">Course Wise Students Details:</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example1" class="table table-bordered table-sm dashboard_table">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th width="30%">Course</th>
                                                        <th width="25%">Old Students</th>
                                                        <th width="25%">New Students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Get unique course names from 'course' table
                                                    $obj->rawsql("SELECT MIN(id) as id, course FROM course GROUP BY course ORDER BY course ASC");
                                                    $courses = $obj->getResult();

                                                    if (!empty($courses)) {
                                                        $i = 1;
                                                        $date = date('d-M-Y');

                                                        foreach ($courses as $course) {
                                                            $course_id = $course['id'];
                                                            $course_name = $course['course'];

                                                            // Count old students from old_students by course ID
                                                            $obj->select('old_students', 'COUNT(*) as total', 'course = ' . $course_id);
                                                            $old_result = $obj->getResult();
                                                            $old_count = $old_result[0]['total'];

                                                            // Count new students from personal_details by course name (string)
                                                            $Addobj->select('personal_details', 'COUNT(*) as total', "course = '$course_name'");
                                                            $new_result = $Addobj->getResult();
                                                            $new_count = $new_result[0]['total'];

                                                            echo "<tr>
                                                                    <td>$i</td>
                                                                    <td>$course_name</td>
                                                                    <td>$old_count</td>
                                                                    <td>$new_count</td>
                                                                </tr>";
                                                            $i++;
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='5'><h5 class='text-center text-danger'>No course data found.</h5></td></tr>";
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
        </div>
    </div>
</div>
<?php
include('footer.php');
?>
<script src="assets/js/chat.js"></script>