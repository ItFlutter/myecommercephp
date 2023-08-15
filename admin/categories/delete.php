<?php
include"../../connect.php";
$id=filterRequest("id");
$imagename=filterRequest("imagename");
$status=deleteFile("../../upload/categories", $imagename);
if($status==true){

    deleteData("categories","categories_id=$id");
}else{
    echo json_encode(array("status" => "failure"));  
}
?>