<?php
include "../../connect.php";
$table="delivery";
$name=filterRequest('name');
$password=sha1(filterRequest('password'));
$email=filterRequest('email');
$phone=filterRequest('phone');
$verfiycode=$verifycode=rand(10000,99999);
// $approve=filterRequest('approve');
$data=array(
    "delivery_name"=>$name,
    "delivery_password"=>$password,
    "delivery_email"=>$email,
    "delivery_phone"=>$phone,
    "delivery_verfiycode"=>$verfiycode,
    "delivery_approve"=>"1",
);
$count=getData($table,"`delivery_email`=? or `delivery_phone`=?",array($email,$phone),false);
if($count>0){
    echo json_encode(array("status"=>"failureemailorphone"));

}else{
    insertData($table,$data);
}

?>