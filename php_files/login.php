<?php 
include("database.php");
$obj = new Database();
session_start();

$userid = $obj->escapeString($_POST['userId']);
$password = $obj-> escapeString($_POST['passWord']);
$chaptcha = $obj->escapeString($_POST['chaptcha']);


if($_SESSION['captcha_code'] == $chaptcha){
    $obj->rawsql("SELECT * FROM admin WHERE email = '$userid'");
    $result = $obj->getResult();
    if (count($result) > 0) {

        $fetchPass = $result[0]['pass'];
        $veryfyPass = password_verify($password, $fetchPass);
        if ($veryfyPass) {
            $_SESSION['admin_email'] = $result[0]['email'];
            $_SESSION['admin_name'] = $result[0]['name'];
            $_SESSION['admin_role'] = $result[0]['role'];
            session_regenerate_id(false);  // to stop regenarate id use boolean value false
            echo '1';
        } else {
            echo '2';
        }
    } else {
        echo '3';
    }
}else{
    echo '4';
}
