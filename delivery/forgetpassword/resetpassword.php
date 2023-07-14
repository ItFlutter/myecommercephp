<?php
include"../../connect.php";
$password=sha1(filterRequest('password'));
$email=filterRequest('email');
$data=array("delivery_password"=>$password);
updateData("delivery",$data,"delivery_email='$email'");
?>
 