<?php
include"connect.php";
// getAllData("itemsview","`categories_id` =$categoriesId");
$userid=filterRequest("userid");

$stmt=$con->prepare("SELECT itemsview.*,1 as favorite , items_price - (items_price * (items_discount/100)) as itemspricediscount FROM itemsview
INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid where itemsview.items_discount!=0 and itemsview.items_active='1'
UNION All 
SELECT itemsview.*,0 as favorite , items_price - (items_price * (items_discount/100)) as itemspricediscount FROM itemsview WHERE  itemsview.items_active='1' and itemsview.items_discount!=0 and itemsview.items_id NOT IN(SELECT itemsview.items_id FROM itemsview
INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid and itemsview.items_discount!=0)");
$stmt->execute();
$count=$stmt->rowCount();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($count>0){
echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"failure"));

}
?>

