<?php
include"../../connect.php";
$email=filterRequest('email');

$verifycode=rand(10000,99999);
$data=array(
    "delivery_verfiycode"=>$verifycode
);
updateData("delivery",$data,"delivery_email='$email'");

?>