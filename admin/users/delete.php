<?php
include "../../connect.php";
$table="users";
$id=filterRequest('id');
deleteData($table,"users_id=$id");

?>