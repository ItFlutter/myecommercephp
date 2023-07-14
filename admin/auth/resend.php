<?php
include"../../connect.php";
$email=filterRequest('email');

$verifycode=rand(10000,99999);
$data=array(
    "admin_verfiycode"=>$verifycode
);
updateData("admin",$data,"admin_email='$email'");

?>