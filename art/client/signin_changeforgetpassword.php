<?php
include '../connection.php';
session_start();
$email = "";

if (!isset($_GET["txt_newpassword"]) && !isset($_GET["txt_cnfspassword"]))
{
    $_SESSION['email'] = $_GET['email'];
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Change Password</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
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
        <link href="css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/loginutil.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
        <!--===============================================================================================-->
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>

        <div class="limiter">

            <div class="container-login100">
                <div class="login100-pic js-tilt" data-tilt>
                                <a href="visitor_home.php" class="site-logo-anch">
                                         <img  src="arts_files/images/logo3.jpg" width="220" height="220" alt="Vision"style="margin-top: 5%;"> 
                                </a>                        
                    <!--<img src="arts_files/Signin/img-01.png" alt="Login Image | Not Found"/>-->
                </div>

                <form class="login100-form validate-form" style= "margin-left: 50px;" method="get">

                        <span class="login100-form-title">
                            <h2 style="color: #755588; font-size:30px;">Change <br> Password</h2>
                        </span>
                    <hr>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="password" name="txt_newpassword" id="txt_newpassword"    placeholder="Enter New Password"    >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" style="margin-top:10px;" >
                        <input class="input100" type="password" name="txt_cnfpassword" id="txt_cnfpassword"    placeholder="Enter Confirm Password"    >
                        <span class="error"></span>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="btn_submit" value="Submit" class="login100-form-btn">


                    </div>
                    <center class="error">
                        <br/>
                    </center>
                    <div class="text-center p-t-12">


                        <a class="txt2" href="signin.php">
                            <h5>Back to Login</h5></a><br/>
                            <a class="txt2" href="visitor_home.php"></a>
                    </div>

                    <?php
                    if (isset($_GET['btn_submit'])) {

                        $np = $_GET['txt_newpassword'];
                        $cp = $_GET['txt_cnfpassword'];

                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "art";
                        $c = new mysqli($servername, $username, $password, $dbname);

                        if ($connection->connect_error) {
                            die("Connection failed: " . $c->connect_error);
                        }

                        if ($_GET["txt_newpassword"] == $_GET["txt_cnfpassword"]) {

                            $q = "select customer_emailid from tbl_customer where customer_emailid='$email'";
                            $r = mysqli_query($c, $q);
                            $q2 = "select artist_email from tbl_artist where artist_email='$email'";
                            $r2 = mysqli_query($c, $q2);

                            if (mysqli_num_rows($r) > 0 || mysqli_num_rows($r2) > 0) {
                                if (mysqli_num_rows($r) > 0) {
                                    $q = "UPDATE tbl_customer SET customer_password='$cp' WHERE customer_emailid='$email'";
                                    $r3 = mysqli_query($c, $q);
                                    if ($r3 == 1) {
                                        echo "<script>swal('Good!', 'Password Changed Successfully!', 'success');</script>";
                                    } else {
                                        echo "<script>swal('Opps!', 'Password Not Changed , Try Again !', 'error');</script>";
                                    }
                                } else if (mysqli_num_rows($r2) > 0) {
                                    $q = "UPDATE tbl_artist SET artist_password='$cp' WHERE artist_email='$email'";
                                    $r3 = mysqli_query($c, $q);
                                    if ($r3 == 1) {
                                        echo "<script>swal('Good!', 'Password Changed Successfully!', 'success');</script>";
                                    } else {
                                        echo "<script>swal('Opps!', 'Password Not Changed , Try Again !', 'error');</script>";
                                    }
                                }
                            } else {
                                echo "<script>swal('Opps!', 'Invalid Email-Id', 'error');</script>";
                            }
                        } else {
                            echo "<script>swal('Opps!', 'Password Not Matched', 'error');</script>";
                        }
                    }
                    ?>
                </form>
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