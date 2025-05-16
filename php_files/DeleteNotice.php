<?php
// session_start();
// if ($_SESSION['role'] == 3) {
include('database.php');
$obj = new Database();
$id = $obj->escapeString($_POST['delete_id']);
$obj->select('notice', "media", "id=$id", null, null, null);
$image = $obj->getResult();

if ($id > 0 ) {
    if($image[0]['media'] !== null){
        unlink('../photos/notice_media/' . $image[0]['media']);
    }
    $obj->delete("notice", "id=$id");
    $result = $obj->getResult();
    if ($result[0] == "success") {
        echo json_encode(array('status' => 'success', 'msg' => "Notice deleted successfully."));
    } else {
        echo json_encode(array('status' => 'error', 'msg' => "Notice can not delete."));
    }
}
    
// }
