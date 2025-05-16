<?php 
$file = $_GET['l_id'] ;

header("content-disposition: attachment; filename = " . urldecode($file));
$fb = fopen("../photos/notice_media/".$file , "r");
while(!feof($fb)){
    echo fread($fb,8192);
    flush();   
}
fclose($fb);
