<?php
include"connect.php";
$alldata=array();
$userid=filterRequest("userid");

$alldata['status']='success';
$alldata['settings']=getDataUpdate('settings',"1=1",null,false);
$alldata['categories']=getAllData("categories",null,null,false);
$alldata['items']=getAllDataFavoriteTheNewest();
$alldata['itemstopselling']=getAllDataFavoriteTopSelling();

// getAllData("itemstopselling","",null,false);
echo json_encode($alldata); 

function getAllDataFavoriteTheNewest()
{
    global $con;
    $data = array();
    $userid=filterRequest("userid");
        $stmt = $con->prepare("SELECT itemsview.*,1 as favorite, items_price - (items_price * (items_discount/100)) as itemspricediscount FROM itemsview
        INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid
        UNION All 
        SELECT itemsview.*,0 as favorite , items_price - (items_price * (items_discount/100)) as itemspricediscount FROM itemsview WHERE itemsview.items_id NOT IN(SELECT itemsview.items_id FROM itemsview
        INNER JOIN favorite on itemsview.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid) order by items_date ASC");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($count>0){
        return array("status"=>"success","data"=>$data);
    }else{
        return array("status" => "failure");
    }
}

function getAllDataFavoriteTopSelling()
{
    global $con;
    $data = array();
    $userid=filterRequest("userid");
        $stmt = $con->prepare("SELECT itemstopselling.*,1 as favorite FROM itemstopselling
        INNER JOIN favorite on itemstopselling.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid
        UNION All 
        SELECT itemstopselling.*,0 as favorite FROM itemstopselling WHERE itemstopselling.items_id NOT IN(SELECT itemstopselling.items_id FROM itemstopselling
        INNER JOIN favorite on itemstopselling.items_id=favorite.favorite_itemsid and favorite.favorite_usersid=$userid) order by countitems desc");
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count  = $stmt->rowCount();
    if($count>0){
        return array("status"=>"success","data"=>$data);
    }else{
        return array("status" => "failure");
    }
}
?>

