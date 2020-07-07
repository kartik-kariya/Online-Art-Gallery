<?php

include ("../connection.php");
session_start();


$id = $_REQUEST['field']; //print id
$value = $_REQUEST['query']; //textbox value
//        echo $id;
//        echo "<br>";
//        echo $value;
//        echo    "<br>";

$update = "update tbl_cart set qty = '$value' where cart_id='$id'";
mysqli_query($connection, $update);
//echo "Updated Status";


$sel12 = "select * from tbl_cart where cart_id='$id'";
$res12 = mysqli_query($connection, $sel12);
$r = mysqli_fetch_array($res12);


$t = 1;
$t = ($r['price'] + $_SESSION['shipcost']) * $r['qty'];
echo $t;
?>
  
