<?php
include("database.php");
$obj = new Database();

$oldpass = $obj->escapeString($_POST['oldpass']);
$newpass = $obj->escapeString($_POST['newpass']);
$cnewpass = $obj->escapeString($_POST['cnewpass']);

if ($newpass == $cnewpass) {
    session_start();
    $email = $_SESSION['admin_email'];
    $obj->rawsql("SELECT pass FROM admin WHERE email = '$email'");
    $result = $obj->getResult();
    if (count($result) > 0) {
        $fetchPass = $result[0]['pass'];
        $veryfyPass = password_verify($oldpass, $fetchPass);
        if ($veryfyPass) {
            $hashpass = password_hash($cnewpass, PASSWORD_BCRYPT);
            $obj->update("admin", ["pass" => "$hashpass"], "email = '$email'");
            $result1 = $obj->getResult();
            if (count($result1) > 0) {
                echo '3';
            }
        } else {
            echo '1';
        }
    }
} else {
    echo "0";
}
