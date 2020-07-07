<?php
ob_start();
session_start();
include_once '../connection.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign In</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                                <a href="visitor_home.php" class="site-logo-anch">
                                         <img  src="arts_files/images/logo3.jpg" width="220" height="220" alt="Vision"style="margin-top: 10%;"> 
                                </a>                        
                        <!--<img src="arts_files/Signin/img-01.png" alt="IMG">-->
                    </div>

                    <form class="login100-form validate-form" method="get">

                        <span class="login100-form-title">
                            <h2 style="color: #755588; font-size:20px;">Reset <br> Password</h2>
                        </span>
                        <hr>
                        <div class="wrap-input100" >
                            <input class="input100" type="email" name="txt_email" placeholder="Email Id">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_submit" class="login100-form-btn"  value="Submit"/>
                        </div>
                        <hr/>
                        <div class="text-center p-t-12" style="padding:0;">
                            <a class="txt2" href="signin.php">
                                Back To Signin
                            </a>
                        </div>
                        <hr>
                        <?php
                        if (isset($_GET['btn_submit'])) {
                            if (!empty($_GET['txt_email'])) {
                                $email = $_GET['txt_email'];
                                include 'mailerClass/PHPMailerAutoload.php';
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
                                $mail->Subject = "Forget Password";
                                $mail->Body = "http://php.fun/art/client/signin_changeforgetpassword.php?email=" . $email;
                                $mail->AddAddress($_GET['txt_email']);

                                if (!$mail->Send()) {
                                    echo "<script>swal('Opps!', 'Mail Not Sent', 'error');</script>";
                                    //echo "Mail Not Sent";
                                    echo "$mail->ErrorInfo";
                                } else {
                                    echo "<script>swal('Good job!', 'Mail Sent', 'success');</script>";
                                    // echo "Mail Sent";
                                }
                            } else {
                                echo "<script>swal('Opps!', 'Empty Field Not Allowed', 'error');</script>";
                            }
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>




        <!--===============================================================================================-->	
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/tilt/tilt.jquery.min.js"></script>
        <script >
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>
<?php ob_flush(); ?>
    </body>
</html>
