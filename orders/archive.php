<?php
include "../connect.php";
$userid=filterRequest("id");
getAllData("ordersview","orders_usersid=$userid and orders_status=4");
?>

