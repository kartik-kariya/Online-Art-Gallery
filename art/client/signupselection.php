<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Sign Up</title>
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

    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" style="padding-top:0;" data-tilt>
                                <a href="visitor_home.php" class="site-logo-anch">
                                         <img  src="arts_files/images/logo3.jpg" width="220" height="220" alt="Vision"style="margin-top: 20%;"> 
                                </a>                        
<!--                        <img src="arts_files/Signin/img-01.png" alt="IMG" style="padding-top: 35%;">-->
                    </div>

                    <form class="login100-form validate-form" method="post" >
                        <span class="login100-form-title">
                            <h3>Who Are You.?</h3>
                        </span>
                        
                        <hr/>

                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_artist" class="login100-form-btn"  value="ARTIST" formaction="signupartist.php"/>

                            <span class="login100-form-title">
                                <hr/>   
                                <h3 style="color: #000">OR</h3>
                                <hr/>
                            </span>                            
                            <input type="submit" name="btn_customer" class="login100-form-btn"  value="CUSTOMER" formaction="signupcustomer.php"/>
                        </div>
                        <hr>
                        <div class="text-center p-t-12" style="padding:0;">
                            <a class="txt2" href="signin.php">
                                Back
                            </a>
                        </div>                    
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

    </body>
</html>
