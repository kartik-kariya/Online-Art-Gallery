<?php
include '../connection.php';
session_start();
$order_code = $_GET['order_code'];
$sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
        . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
        . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
        . "and shop.artist_id = artist.artist_id and "
        . "shoporder.shoporder_id ='$order_code'";
$res = mysqli_query($conn, $sel);
$row = mysqli_fetch_array($res);

$customername = $row['customer_firstname']." ".$row['customer_lastname'];


if (empty($_SESSION['username'])) {
    header("location:login.php");
}
require 'mailerClass/PHPMailerAutoload.php';
include ('../connection.php');

    $to = $_GET['customer'];
    $from = "Vision Art Gallery";
    $subject = "Purchase Bill";
    $message = "Dear $customername , " . "<br/>" . " Your recent purchase from Vision Art Gallery has been dispatched and you will receive the purchase item soon." . "<br/>" ."<br/>"."This email message will serve as your receipt."."<br/><br/>". $_SESSION['bill']."<br/><br/>"."The Vision Support Team"."<br/>"."http://php.fun/art/client/visitor_home.php";                
    $mail = new PHPMailer();
    $mail->IsSmtp();
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';

    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    //$mail ->Host = "tls.gmail.com";
    $mail->Host = 'smtp.gmail.com';
    //$mail->Host = 'tls://smtp.gmail.com';
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "vision6570@gmail.com";
    $mail->Password = "7874485660";
    $mail->SetFrom("vision6570@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);

    if (!$mail->Send()) {
        echo "<snap class ='sussess'>Something went Wrong!</snap>";
        echo "$mail->ErrorInfo";
    } else {
        echo "<snap class ='sussess'>Message Send Sussessfully!</snap>";
    }   
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
