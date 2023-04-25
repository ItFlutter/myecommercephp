<?php
include"connect.php";
$alldata=array();
$alldata['status']='success';
$alldata['categories']=getAllData("categories",null,null,false);
$alldata['items']=getAllData("itemsview","`items_discount`!=0",null,false);
echo json_encode($alldata); 
?>