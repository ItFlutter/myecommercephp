<?php
include "../connect.php";
$userid=$_POST['userid'];
$itemid=$_POST['itemid'];
$stmt=$con->prepare("select rating_rate from rating where rating_userid=? and rating_itemid=?");
$stmt->execute(array($userid,$itemid));
$data=$stmt->fetchColumn();
$count=$stmt->rowCount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));
}
?>