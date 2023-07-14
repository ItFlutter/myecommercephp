<?php
include"../../connect.php";
$ordersid=filterRequest('ordersid');
$usersid=filterRequest('usersid');
$deliveryid=filterRequest('deliveryid');
$data=array(
    "orders_status"=>3,
    "orders_delivery"=>$deliveryid,

);
$count=updateData("orders",$data,"orders_id=$ordersid and orders_status='2'");
if($count>0){
    // sendGCM("Success","The Order Has Been Approved","users$usersid","none","refreshorderpending");
    insertNotify("Success","Order With The ID $ordersid On The Way",$usersid,"users$usersid","none","refreshorderpending",$ordersid);
    sendGCM("Warning","The Order $ordersid Has Been Approved By Delivery $deliveryid","sevices","none","none");
    sendGCM("Warning","The Order $ordersid Has Been Approved By Delivery $deliveryid","delivery","none","refreshorderpending");
}
// echo $count;

?>
