<?php

include "../../connect.php";
$table="coupon";
$name=filterRequest('name');
$count=filterRequest('count');
$discount=filterRequest('discount');
$expiredate=filterRequest('expiredate');
$data=array(
    "coupon_name"=>$name,
    "coupon_count"=>$count,
    "coupon_expiredate"=>$expiredate,
    "coupon_discount"=>$discount,
);

// $count=getData($table,"`coupon_name`=?",array($name),false);
// if($count>0){
//     echo json_encode(array("status" => "failure"));

// }else{


    insertData($table,$data);

// }
?>