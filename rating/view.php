<?php
include "../connect.php";
$id=$_POST['id'];
$stmt=$con->prepare("select avg(rating_rate) as avgrate from rating WHERE rating_itemid=?");
$stmt->execute(array($id));
$data=$stmt->fetchColumn();
$count=$stmt->rowCount();
if($count >0){
    if($data>0){

        echo json_encode(array("status"=>"success","data"=>$data));
    }
    else{
        echo json_encode(array("status"=>"success","data"=>"0"));

    }
}else{
echo json_encode(array("status"=>"failure"));

}
?>