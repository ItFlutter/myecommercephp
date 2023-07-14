<?php
include"../../connect.php";
$email=filterRequest("email");
$verify=filterRequest("verifycode");
$stmt=$con->prepare("SELECT * FROM `admin` WHERE `admin_email`=? AND `admin_verfiycode`=?");
$stmt->execute(array($email,$verify));
$count=$stmt->rowCount();
result($count);
?>