<?php
date_default_timezone_set("Asia/Calcutta");
include("../connection.php");

$id = $_REQUEST['field'];//print id
$value = $_REQUEST['query'];//textbox value


$date=date('Y-m-d h:i:s');

$update="update tbl_shoporder set shop_orderstatus = '$value' where shoporder_id='$id'";
mysqli_query($conn,$update);

echo "Status Updated";
?>