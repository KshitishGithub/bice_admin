<?php

     include('database.php');
     $obj = new Database();

     if (isset($_POST['get_data'])) {
          $obj->select('batchs', '*', null, null, 'batchs ASC');
          $result = $obj->getResult();

          if (count($result) > 0) {
               //! All Batches
               echo '<select class="form-control" id="course">
               <option selected disabled value="" class="text-center">-- All Batchs --</option>';
               foreach ($result as list('id' => $id, 'batchs' =>$batchs)) {
                    echo "<option value=" . $id . ">" . $batchs . "</option>";
               }
               echo '</select><br>';
               //! Active Select Batch
               echo '<select class="form-control" id="active_course">
                    <option disabled value="" class="text-center">-- Active Batchs --</option>';
               foreach ($result as list('id' => $id, 'batchs' => $batchs, 'active_batch' => $active_batch)) {
                    if ($active_batch == 1) {
                         echo "<option selected id=" . $id . ">" . $batchs . "</option>";
                    }else{
                         echo "<option id=" . $id . ">" . $batchs . "</option>";
                    }
               }
               echo '</select>';

               echo '<a id="AddBatch" class="btn btn-success mt-3 btn-block" href="#" role="button" data-bs-toggle="modal" data-bs-target="#AddBatchModal" >Add Batch</a>';
          } else {
               echo 'No Data Found';
          }
     }


     //! Change active batch
     if (isset($_POST['changeId'])) {
          $change_id = $obj->escapeString($_POST['changeId']);
          $obj->update('batchs',['active_batch'=>'0']);
          $obj->update('batchs',['active_batch'=>'1'], "id = $change_id");
          $Update_reuslt = $obj->getResult();
          print_r($Update_reuslt[1]);
     }

     //! Add Batch 
     if (isset($_POST['batch_name'])) {
          $bacth_name = $obj->escapeString($_POST['batch_name']);
          $obj->insert('batchs',['batchs'=>$bacth_name,'active_batch'=>'0']);
          $res = $obj->getResult();
          echo json_encode(['status'=>'success','msg'=>'Batch added successfully.']);
     }
     