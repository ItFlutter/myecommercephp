<?php
include "../connect.php";
$itemsid=filterRequest('itemsid');
$usersid=filterRequest('usersid');
$count=getData("cart","cart_usersid=$usersid AND cart_itemsid=$itemsid AND cart_ordres=0",null,false);
$data=array(
    "cart_usersid"=>$usersid,
    "cart_itemsid"=>$itemsid
);
insertData("cart",$data);
?>

