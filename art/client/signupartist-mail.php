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
        $firstname = $_SESSION['signupfirstname'];
        $lastname = $_SESSION['signuplastname'];
        $uname = $_SESSION['signupusername'];
        $email = $_SESSION['signupemailid'];

//        $mail = new PHPMailer();
//        $mail->IsSmtp();
//        $mail->SMTPDebug = 0;
//        $mail->SMTPAuth = true;
//        $mail->SMTPSecure = 'ssl';
//
//        $mail->SMTPOptions = array(
//            'ssl' => array(
//                'verify_peer' => false,
//                'verify_peer_name' => false,
//                'allow_self_signed' => true
//            )
//        );
//
//        //$mail ->Host = "tls.gmail.com";
//        $mail->Host = 'smtp.gmail.com';
//        //$mail->Host = 'tls://smtp.gmail.com';
//        $mail->Port = 465; // or 587
//        $mail->IsHTML(true);
//        $mail->Username = "vision6570@gmail.com";
//        $mail->Password = "7874485660";
//        $mail->SetFrom("vision6570@gmail.com");
//        $mail->Subject = "Artist Registration";
//        $mail->Body = "<h2>Dear $firstname" . " " . $lastname . ",<br>You are registerd as Artist with $username. <br> You will be approved within 24 hours.<br>If any query contact us with our Email(vision6570@gmail.com) or Phone Number(7874485660).</h2>";
//        $mail->AddAddress($email);

        require './mailerClass/PHPMailerAutoload.php';
        include ('../connection.php');

        $from = "Vision Art Gallery";
        $subject = "Artist Registration";
        $message = "<h2>Dear $firstname" . " " . $lastname . ",<br>You are registerd as Artist in Vision Arts Gallery with Username "."$uname".".<br> You will be approved within 24 hours.<br>If any query contact us with our Email(vision6570@gmail.com) or Phone Number(7874485660).</h2>";
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
        $mail->AddAddress($email);
        if (!$mail->Send()) {
            
        } else {
            
        }
        ?>
    </body>
</html>
