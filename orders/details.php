<?php
include "../connect.php";
$ordersid=filterRequest('id');
getAllData("ordersdetailsview","cart_ordres=$ordersid");
?>