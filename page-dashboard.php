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
                                            <table class="table table-bordered table-hover table-sm">
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
                                                    $Addobj->rawsql('SELECT r.fname , r.lname , r.father_name , r.mobile , pd.s_id , pd.batch , pd.course, p.payment_id FROM personal_details pd LEFT JOIN registration r ON r.s_id = pd.s_id LEFT JOIN payment p ON r.s_id = p.stu_id WHERE p.payment_status = "Pending" LIMIT 5');
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
                                        <h3 class=" card-title">Last Registration:</h3>
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
                                            <table id="example1" class="table table-bordered table-sm">
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
                                                    $Addobj->rawsql('SELECT r.fname,r.lname , r.father_name, f.s_id, p.batch , p.course , r.mobile, f.registration ,f.active_status FROM fresh_students f INNER JOIN personal_details p ON f.s_id = p.s_id INNER JOIN registration r ON f.s_id = r.s_id LIMIT 5');
                                                    $result = $Addobj->getResult();

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
                                            <table class="table table-bordered table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th width=30%>Batch</th>
                                                        <th width=30%>Up to date</th>
                                                        <th width=40%>Total Students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $obj->rawsql("SELECT batchs FROM batchs b INNER JOIN old_students s ON b.id = s.batch ORDER BY batchs");
                                                    $totalbatch = $obj->getResult();
                                                    // echo "<pre>";
                                                    // print_r($totalbatch);
                                                    // die;
                                                    $data = []; // Pusing data into index array
                                                    foreach ($totalbatch as list('batchs' => $batchs)) {
                                                        array_push($data, $batchs);
                                                    }
                                                    // Print Data batch wise
                                                    $b_data = array_count_values($data);
                                                    if (!empty($b_data)) {
                                                        $final_data = "";
                                                        $i = 1;
                                                        $date = date('d-M-Y');
                                                        foreach ($b_data as $key => $value) {
                                                            $final_data .= "<tr>
                                                                    <td>$i</td>
                                                                    <td>$key</td>
                                                                    <td>$date</td>
                                                                    <td>$value</td>
                                                                </tr>";
                                                            $i++;
                                                        }
                                                        echo $final_data;
                                                    } else {
                                                        echo "<h3>Data not found.</h3>";
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
                                            <table id="example1" class="table table-bordered table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Sr.</th>
                                                        <th width=30%>Course</th>
                                                        <th width=30%>Up to date</th>
                                                        <th width=40%>Total Students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $obj->rawsql("SELECT c.course FROM course c INNER JOIN old_students s ON c.id = s.course ORDER BY c.course");
                                                    $totalbatch = $obj->getResult();
                                                    // echo "<pre>";
                                                    // print_r($totalbatch);
                                                    // die;
                                                    $data = []; // Pusing data into index array
                                                    foreach ($totalbatch as list('course' => $course)) {
                                                        array_push($data, $course);
                                                    }
                                                    // Print Data batch wise
                                                    $b_data = array_count_values($data);
                                                    if (!empty($b_data)) {
                                                        $final_data = "";
                                                        $i = 1;
                                                        $date = date('d-M-Y');
                                                        foreach ($b_data as $key => $value) {
                                                            $final_data .= "<tr>
                                                                    <td>$i</td>
                                                                    <td>$key</td>
                                                                    <td>$date</td>
                                                                    <td>$value</td>
                                                                </tr>";
                                                            $i++;
                                                        }
                                                        echo $final_data;
                                                    } else {
                                                        echo "<h3>Data not found.</h3>";
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