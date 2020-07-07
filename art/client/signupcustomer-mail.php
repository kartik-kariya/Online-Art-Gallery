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
        require './mailerClass/PHPMailerAutoload.php';
        $firstname = $_SESSION['signupcustomer_fname'];
        $lastname = $_SESSION['signupcustomer_lname'];
        $username = $_SESSION['signupcustomer_uname'];
        $email = $_SESSION['signupcustomer_mail'];

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
        $mail->Subject = "Artist Registration";
        $mail->Body = "<h2>Dear $firstname" . " " . $lastname . ",<br>You are registerd as Customer in Vision Arts Gallery with Username $username. <br> You are able to Login and purchase your favourites Artworks.<br>If any query contact us with our Email(vision6570@gmail.com) or Phone Number(7874485660).</h2>";
        $mail->AddAddress($email);
        if (!$mail->Send()) {
        } else {
        }
        ?>
    </body>
</html>
