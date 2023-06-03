<?php
include"connect.php";
$alldata=array();
$alldata['status']='success';
$alldata['settings']=getDataUpdate('settings',"1=1",null,false);
$alldata['categories']=getAllData("categories",null,null,false);
$alldata['items']=getAllData("itemsview","",null,false);
$alldata['itemstopselling']=getAllData("itemstopselling","",null,false);
echo json_encode($alldata); 
?>