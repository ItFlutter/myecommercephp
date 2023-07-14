<?php
include"../../connect.php";
$ordersid=filterRequest('ordersid');
$usersid=filterRequest('usersid');
$type=filterRequest('ordertype');
if($type==0){
    $data=array(
        "orders_status"=>2
    );
}else{
    $data=array(
        "orders_status"=>4
    );
}

$count=updateData("orders",$data,"orders_id=$ordersid and orders_status='1'");
if($count>0){
    // sendGCM("Success","The Order Has Been Approved","users$usersid","none","refreshorderpending");
    if($type==0){
       sendGCM("Warning","There Is Orders $ordersid Awaiting Approval","delivery","none","refreshorderpending"); 
    insertNotify("Success","Order With The ID $ordersid Has Been Prepared And Will Be Sending",$usersid,"users$usersid","none","refreshorderpending",$ordersid);

    }else{
    insertNotify("Success","Order With The ID $ordersid Has Been Prepared",$usersid,"users$usersid","none","refreshorderpending",$ordersid);

    }
}
// echo $count;

?>
