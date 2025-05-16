<?php
include('database.php');
$obj = new Database();
$obj->select("success_students", "*", null, null, 'id DESC', null);
$result = $obj->getResult();
    if (count($result) > 0) {
        echo '<div class="card mt-2">
                <div class="row text-center m-1">';
                $i = 1;
                foreach ($result as list('id' => $id, 'students_name' => $students_name, 'students_job' => $students_job, 'image' => $image)) {
                    echo "<div class='col-lg-1 col-3 mb-2'>
                            <img src='photos/success_students/$image' class='img-fluid rounded success_image'>
                            <span><b>$students_name</b></span>
                            <p>$students_job</p>
                            <button type='button' data-id='$id' class='btn btn-outline-secondary btn-sm' id='EditSuccessStudents'><i class='bi bi-pencil-square'></i></button>
                            <button type='button' data-id='$id' class='btn btn-outline-danger btn-sm' id='DeleteSuccessStudents' ><i class='bi bi-trash3'></i></button>
                        </div>";
                    $i++;
                }
        echo '</div>
                </div>';
} else {
    echo "<div class='card mt-2 row '>
                <div class='text-center'><span class='text-danger h4 '>No Data Found !</span></div>
                </div>";
    } 
                           