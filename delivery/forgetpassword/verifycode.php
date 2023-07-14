<?php
include"../../connect.php";
$email=filterRequest("email");
$verify=filterRequest("verifycode");
$stmt=$con->prepare("SELECT * FROM `delivery` WHERE `delivery_email`=? AND `delivery_verfiycode`=?");
$stmt->execute(array($email,$verify));
$count=$stmt->rowCount();
result($count);
?>