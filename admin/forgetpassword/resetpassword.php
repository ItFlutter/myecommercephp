<?php
include"../../connect.php";
$password=sha1(filterRequest('password'));
$email=filterRequest('email');
$data=array("admin_password"=>$password);
updateData("admin",$data,"admin_email='$email'");
?>
 