<?php
include"../connect.php";
$email=filterRequest("email");
$verify=filterRequest("verifycode");
$stmt=$con->prepare("SELECT * FROM `users` WHERE `users_email`=? AND `users_verifycode`=?");
$stmt->execute(array($email,$verify));
$count=$stmt->rowCount();
result($count);
?>