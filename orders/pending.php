<?php
include"../connect.php";
$userid=filterRequest('id');
getAllData("orders","orders_usersid=$userid");

?>