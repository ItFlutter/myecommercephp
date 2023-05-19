<?php
include "../connect.php";
$usersid=filterRequest('usersid');
$addressid=filterRequest('addressid');
$orderstype=filterRequest('orderstype');
$pricedelivery=filterRequest('pricedelivery');
$ordersprice=filterRequest('ordersprice');
$couponid=filterRequest('couponid');
$paymentmethod=filterRequest('paymentmethod');
$discount=filterRequest('discount');
if($orderstype=="1"){
    $pricedelivery=0;
}
$totalprice=$ordersprice+$pricedelivery;
//Check Coupon
$now=date('Y-m-d H:i:s');

$table="coupon";
$checkcoupon=getData($table,"coupon_id = '$couponid' AND coupon_count > 0 AND coupon_expiredate >= '$now'",null,false);
if($checkcoupon>0){
    $totalprice=$totalprice-$ordersprice*$discount/100;
    $stmt=$con->prepare("update coupon set coupon_count=coupon_count-1 where coupon_id=$couponid");
    $stmt->execute();
}

$data=array(
    'orders_usersid'=>$usersid,
    'orders_address'=>$addressid,
    'orders_type'=>$orderstype,
    'orders_pricedelivery'=>$pricedelivery,
    'orders_price'=>$ordersprice,
    'orders_totalprice'=>$totalprice,
    'orders_coupon'=>$couponid,
    'orders_paymentmethod'=>$paymentmethod,
);
$count=insertData("orders",$data,$json=false);
if($count > 0){
    $stmt=$con->prepare("SELECT Max(orders_id) from orders");
    $stmt->execute();
    $maxid=$stmt->fetchColumn();
    $data=array(
        "cart_ordres" =>$maxid
    );
    updateData("cart",$data,"cart_usersid =$usersid AND cart_ordres = 0");
}
?>