<?php
include"../../connect.php";
$ordersid=filterRequest('ordersid');
$usersid=filterRequest('usersid');
$deliveryid=filterRequest('deliveryid');
$data=array(
    "orders_status"=>4
);
$count=updateData("orders",$data,"orders_id=$ordersid and orders_status='3'");
if($count>0){
    // sendGCM("Success","The Order Has Been Approved","users$usersid","none","refreshorderpending");
    insertNotify("Success","Order With The ID $ordersid Has Been Delivered",$usersid,"users$usersid","none","refreshorderpending",$ordersid);
    sendGCM("Warning","The Order $ordersid Has Been delivered By Delivery $deliveryid To The Customer $usersid","sevices","none","none");
}
// echo $count;

?>
