<?php
include "../connect.php";
$now=date('Y-m-d H:i:s');

$table="coupon";
$couponName=filterRequest('couponname');
getData($table,"coupon_name = '$couponName' AND coupon_count > 0 AND coupon_expiredate >= '$now'");

?>