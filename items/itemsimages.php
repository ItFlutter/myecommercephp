<?php
include"../connect.php";
$itemsid=filterRequest('itemsid');
getAllData("itemsimages","itemsimages_itemsid=$itemsid");
?>