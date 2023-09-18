<?php
include "../../connect.php";
$table="delivery";
$id=filterRequest('id');
$name=filterRequest('name');
$password=sha1(filterRequest('password'));
$email=filterRequest('email');
$phone=filterRequest('phone');
// $verfiycode=$verifycode=rand(10000,99999);
// $approve=filterRequest('approve');
$data=array(
    "delivery_name"=>$name,
    "delivery_password"=>$password,
    "delivery_email"=>$email,
    "delivery_phone"=>$phone,
);
$count=getData($table,"`delivery_id`!=? and (`delivery_email`=? or `delivery_phone`=?)",array($id,$email,$phone),false);
if($count>0){
    echo json_encode(array("status"=>"failureemailorphone"));

}else{
    updateData($table,$data,"`delivery_id`=$id");
}

?>