<?php
include('database.php');
// session_start();
// if ($_SESSION['role'] == 3) {
$obj = new Database();
$id = $obj->escapeString($_POST['delete_id']);
$obj->select('yt_videos', "yt_image", "id=$id", null, null, null);
$image = $obj->getResult();
if (unlink('../photos/yt_photo/' . $image[0]['yt_image'])) {
    $obj->delete("yt_videos", "id=$id");
    $result = $obj->getResult();
    if ($result[0] == "success") {
        echo json_encode(array('status' => 'success', 'msg' => "Thumbnail deleted successfully."));
    } else {
        echo json_encode(array('status' => 'error', 'msg' => "Thumbnail can not delete."));
    }
}
    
// }
