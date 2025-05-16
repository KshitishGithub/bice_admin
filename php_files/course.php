<?php

include('database.php');
$obj = new Database();

if (isset($_POST['get_data'])) {
     $obj->select('course', '*', null, null, 'course ASC');
     $result = $obj->getResult();

     if (count($result) > 0) {
          //! All Courses
          echo '<select class="form-control" id="course">
               <option selected disabled value="" class="text-center">-- All Course --</option>';
          foreach ($result as list('id' => $id, 'course' => $course)) {
               echo "<option value=" . $id . ">" . $course . "</option>";
          }
          echo '</select><br>';
          // $i = 1;
          // foreach($result as list('id' => $id, 'course' => $course)){
          //      echo $i . $course ."<br>";
          //      $i++;
          // }

          echo '<a id="AddCourse" class="btn btn-success mt-3 btn-block" href="#" role="button" data-bs-toggle="modal" data-bs-target="#AddCourseModal" >Add Course</a>';
     } else {
          echo 'No Data Found';
     }
}

//! Add Course 
if (isset($_POST['course_name'])) {
     $bacth_name = $obj->escapeString($_POST['course_name']);
     $obj->insert('course', ['course' => $bacth_name]);
     $res = $obj->getResult();
     echo json_encode(['status' => 'success', 'msg' => 'Course added successfully.']);
}
