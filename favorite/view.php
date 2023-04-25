<?php
include"../connect.php";
$id=filterRequest('id');
getAllData("myfavorite","users_id= ?",array($id));


?>