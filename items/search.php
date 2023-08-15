<?php
include "../connect.php";
$search=filterRequest('search');
getAllData("itemsview","items_name LIKE '%$search%' and itemsview.items_active='1'  OR items_name_ar LIKE '%$search%' and itemsview.items_active='1'");
?>