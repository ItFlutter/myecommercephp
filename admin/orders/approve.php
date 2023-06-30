<?php
include"../../connect.php";
$ordersid=filterRequest('ordersid');
$usersid=filterRequest('usersid');
$data=array(
    "orders_status"=>1
);
$count=updateData("orders",$data,"orders_id=$ordersid and orders_status='0'");
if($count>0){
    // sendGCM("Success","The Order Has Been Approved","users$usersid","none","refreshorderpending");
    insertNotify("Success","Order With The ID $ordersid Has  Approved",$usersid,"users$usersid","none","refreshorderpending",$ordersid);
}
// echo $count;

?>
