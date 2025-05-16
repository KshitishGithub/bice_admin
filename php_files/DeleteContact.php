<?php
include('database.php');
    if (isset($_POST['delete_id'])) {
        $obj = new Database();
        $id = $obj->escapeString($_POST['delete_id']);

        $obj->delete("contact", "id=$id");
        $result = $obj->getResult();
        if ($result[0] == "success") {
            echo json_encode(array('status' => 'success', 'msg' => "Contact deleted successfully."));
        } else {
            echo json_encode(array('status' => 'error', 'msg' => "Contact can not delete."));
        }
    }
    
    

