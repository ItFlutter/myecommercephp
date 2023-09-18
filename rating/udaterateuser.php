<?php
include "../connect.php";
$userid=$_POST['userid'];
$itemid=$_POST['itemid'];
$rateuser=$_POST['rateuser'];
$stmt=$con->prepare("select * from rating where rating_userid=? and rating_itemid=?");
$stmt->execute(array($userid,$itemid));
$count=$stmt->rowCount();
if($count>0){
$stmt1=$con->prepare("update rating set rating_rate=? where rating_userid=? and rating_itemid=?");
$stmt1->execute(array($rateuser,$userid,$itemid));
$count1=$stmt1->rowCount();
if($count1>0){
    echo json_encode(array("status"=>"success"));

}else{
    echo json_encode(array("status"=>"failure"));
}
}else{
    $stmt1=$con->prepare("insert into rating (rating_rate,rating_userid,rating_itemid) values (?,?,?)");
    $stmt1->execute(array($rateuser,$userid,$itemid));
    $count1=$stmt1->rowCount();
    if($count1>0){
        echo json_encode(array("status"=>"success"));
    
    }else{
        echo json_encode(array("status"=>"failure"));
    }

}
?>