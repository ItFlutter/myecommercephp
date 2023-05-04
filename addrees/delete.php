<?php
include "../connect.php";
$addressid=filterRequest('addressid');
$table="address";
deleteData($table,"address_id=$addressid");
?>