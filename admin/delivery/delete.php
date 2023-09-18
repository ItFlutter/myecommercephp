<?php
include "../../connect.php";
$table="delivery";
$id=filterRequest('id');
deleteData($table,"delivery_id=$id");

?>