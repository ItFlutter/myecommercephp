<?php
include"../connect.php";
$categoriesId=filterRequest("id");
$userid=filterRequest("userid");
// getAllData("itemsview","`categories_id` =$categoriesId");
$stmt=$con->prepare("SELECT itemsview.*,1 as favorite FROM itemsview
INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid and `categories_id` =$categoriesId
UNION All 
SELECT itemsview.*,0 as favorite FROM itemsview WHERE `categories_id` =$categoriesId and itemsview.items_id NOT IN(SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid )");
$stmt->execute();
$count=$stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($count>0){
echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));

}
?>
