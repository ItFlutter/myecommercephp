<?php

include "../../connect.php";
$table="coupon";
$id=filterRequest('id');
$name=filterRequest('name');
$count=filterRequest('count');
// $expiredate=filterRequest('expiredate');
$discount=filterRequest('discount');
$alldata=array();

if(isset($_POST['expiredate'])){
$expiredate=filterRequest('expiredate');

    $data=array(
        "coupon_name"=>$name,
        "coupon_count"=>$count,
        "coupon_expiredate"=>$expiredate,
        "coupon_discount"=>$discount,
    );
  
}else{
    $data=array(
        "coupon_name"=>$name,
        "coupon_count"=>$count,
        "coupon_discount"=>$discount,
    );
}


$count=getData($table,"`coupon_name`=? and `coupon_id`!=$id",array($name),false);
if($count>0){
    echo json_encode(array("status" => "failurename"));

}else{


    updateData($table,$data,"coupon_id=$id");

}
?>