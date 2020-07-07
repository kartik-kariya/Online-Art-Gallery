<?php
session_start();
ob_start();
include '../connection.php';
include('libs/phpqrcode/qrlib.php');
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <html>
        <head>
            <title>Artist Sign Up</title>
            <meta charset="UTF-8">
            <!--===============================================================================================-->	
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
            <!--===============================================================================================-->	
            <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/bootstrap/js/popper.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/tilt/tilt.jquery.min.js"></script>
            <script src="js/sweetalert.min.js" type="text/javascript"></script>
        </head>
        <body>
            <?php
            $err = 0;
            $profileimg = $idimg = "";
            if (isset($_POST['btn_signup'])) {
                if (!empty($_FILES['profile_image']['name'])) {
                    $userdir = "./arts_files/Artist/" . $_SESSION['signupusername'] . "/";
                    if (!is_dir($userdir)) {
                        mkdir($userdir);
                    }
                    $imgdir = "";
                    $imgdir = $userdir . "Profile-Image";
                    if (!is_dir($imgdir)) {
                        mkdir($imgdir);
                    }
                    $target_dir = $imgdir . "/";
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir);
                    }

                    $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["profile_image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (isset($_POST["btn_signup"])) {
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
                        if ($check !== false) {
                            //echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "<script type='text/javascript'>alert('File is not an image.')</script>";
                            $err = 1;
                            //echo "File is not an image.";                                
                            $uploadOk = 0;
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
                            //echo "Sorry, file already exists.";
                            $uploadOk = 0;
                        }

                        // Check file size
                        if ($_FILES["profile_image"]["size"] > 100000000) {
                            echo "<script type='text/javascript'>alert('Sorry, your file is too large.')</script>";
                            $err = 1;
                            //echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                        }

                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                            $err = 1;
                            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                            $uploadOk = 0;
                        }

                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.Try Again.')</script>";
                            $err = 1;
                            //echo "Sorry, your file was not uploaded.";
                        }
                        // if everything is ok, try to upload file
                        else {
                            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {


                                //echo $_SESSION['artfile'];
                                //echo "The file " . basename($_FILES["profile_image"]["name"]) . " has been uploaded.";
                            } else {
                                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.Try Again.')</script>";
                                $err = 1;
                                //echo "Sorry, there was an error uploading your file.";
                            }
                            $profileimg = $target_file;
                            //echo $profileimg;
                        }
                    }
                    if (!empty($_FILES['idproof']['name'])) {

                        $userdir = "./arts_files/Artist/" . $_SESSION['signupusername'] . "/";
                        if (!is_dir($userdir)) {
                            mkdir($userdir);
                        }
                        $idproofdir = "";
                        $idproofdir = $userdir . "Id-Proof";
                        if (!is_dir($idproofdir)) {
                            mkdir($idproofdir);
                        }
                        $target_dir = $idproofdir . "/";
                        if (!is_dir($target_dir)) {
                            mkdir($target_dir);
                        }

                        $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["idproof"]["name"]);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                        if (isset($_POST["btn_signup"])) {
                            // Check if image file is a actual image or fake image
                            $check = getimagesize($_FILES["idproof"]["tmp_name"]);
                            if ($check !== false) {
                                //echo "File is an image - " . $check["mime"] . ".";
                                $uploadOk = 1;
                            } else {
                                echo "<script type='text/javascript'>alert('File is not an image.')</script>";
                                //echo "File is not an image.";                                
                                $uploadOk = 0;
                                $err = 1;
                            }

                            // Check if file already exists
                            if (file_exists($target_file)) {
                                echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
                                //echo "Sorry, file already exists.";
                                $uploadOk = 0;
                            }

                            // Check file size
                            if ($_FILES["idproof"]["size"] > 100000000) {
                                echo "<script type='text/javascript'>alert('Sorry, your file is too large.')</script>";
                                //echo "Sorry, your file is too large.";
                                $uploadOk = 0;
                                $err = 1;
                            }

                            // Allow certain file formats
                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                                //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                $uploadOk = 0;
                            }

                            // Check if $uploadOk is set to 0 by an error
                            if ($uploadOk == 0) {
                                echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.Try Again.')</script>";
                                $err = 1;
                                //echo "Sorry, your file was not uploaded.";
                            }
                            // if everything is ok, try to upload file
                            else {
                                if (move_uploaded_file($_FILES["idproof"]["tmp_name"], $target_file)) {
                                    //echo $_SESSION['artfile'];
                                    //echo "The file " . basename($_FILES["idproof"]["name"]) . " has been uploaded.";
                                } else {
                                    echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.Try Again.')</script>";
                                    $err = 1;
//echo "Sorry, there was an error uploading your file.";
                                }
                                $idimg = $target_file;
                                //echo "<br>" . $idimg;
                            }
                        }

                        if (!empty($_POST['legalname'])) {

                            $qrimg = "";
                            //$qrvalue = $_POST['qrcode'];

                            $qrdir = $userdir . "QRCODE/";
                            //echo $qrdir;
                            if (!is_dir($qrdir)) {
                                mkdir($qrdir);
                            }
                            $codeContents = urlencode($_SESSION['signupusername']);
                            QRcode::png($_SESSION['signupusername'], $qrdir . $_SESSION['signupusername'] . '.png', QR_ECLEVEL_L, 5);
                            $qrimg = $qrdir . $_SESSION['signupusername'] . '.png';

                            $firstname = $_SESSION['signupfirstname'];
                            $lastname = $_SESSION['signuplastname'];
                            $username = $_SESSION['signupusername'];
                            $password = $_SESSION['signuppassword'];
                            $email_id = $_SESSION['signupemailid'];
                            $contact_number = $_SESSION['signupcontactnumber'];
                            $city = $_SESSION['signupcity'];
                            $state = $_SESSION['signupstate'];
                            $country = $_SESSION['signupcountry'];
                            $zipcode = $_SESSION['signupzipcode'];
                            $qrcode = $codeContents;
                            $profile_image = $profileimg;
                            $idproof = $idimg;
                            $legalname = $_POST['legalname'];
                            $artist_status = "deactive";
                            $artist_verification = "pending";

                            $country_id = 0;
                            $state_id = 0;
                            $city_id = 0;

                            $country = "select country_id from tbl_country where country_name = '$country'";
                            $res_country = mysqli_query($connection, $country);
                            while ($r = mysqli_fetch_assoc($res_country)) {
                                $country_id = $r['country_id'];
                            }

                            $state = "select state_id from tbl_state where state_name = '$state' and country_id = '$country_id'";
                            $res_state = mysqli_query($connection, $state);
                            while ($r = mysqli_fetch_assoc($res_state)) {
                                $state_id = $r['state_id'];
                            }

                            $city = "select city_id from tbl_city where city_name = '$city' and state_id = '$state_id'";
                            $res_city = mysqli_query($connection, $city);
                            while ($r = mysqli_fetch_assoc($res_city)) {
                                $city_id = $r['city_id'];
                            }

                            if ($err == 0) {
                                $insert = "insert into tbl_artist values('' , '$firstname' , '$lastname' , '$username' , '$password',"
                                        . "'$email_id' , '$contact_number' , '' , '$city_id' , '$qrimg' , '$qrcode' , '$profile_image' , '$idproof' , "
                                        . "'$legalname' , '' ,'$state_id' ,'$country_id' , '$zipcode' , '' , '' , '' , '' , '' , '' , '' , '$artist_status' ,"
                                        . "'$artist_verification');";

                                if (mysqli_query($connection, $insert)) {
                                    include './signupartist-mail.php';
                                    echo "<script>swal('Done.!', 'Registration Done .!', 'success');</script>";
                                } else {
                                    echo "Error: " . $insert . "<br>" . mysqli_error($connection);
                                    //echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
                                }
                            }
                        } else {
                            echo "<script>swal('Opps.!', 'Please Enter Your Legal Name .!', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Please Enter Id Proof .!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Please Enter Profile Image .!', 'error');</script>";
                }
            }
            ?>

            <div class="limiter">
                <div class="container-login100">
                    <div class="wrap-login100">
                        <div class="login100-pic js-tilt" style="padding-top:190px;" data-tilt>
                            <a href="visitor_home.php" class="site-logo-anch">
                                <img  src="arts_files/images/logo3.jpg" width="220" height="220" alt="Vision"style="margin-top: 25%;"> 
                            </a>                        
                        <!--<img src="arts_files/Signup/img-02.png" alt="IMG">-->
                        </div>

                        <form class="login100-form" method="post" enctype="multipart/form-data">
                            <span class="login100-form-title">
                                <h2 style="color: #755588">SIGN UP</h2>
                            </span>
                            <hr>
                            <!--                            <div class="wrap-input100">
                                                            <input class="input100" type="text" name="qrcode" placeholder="QR Code Value">
                                                            <span class="focus-input100"></span>
                                                        </div>                                                -->

                            <center><label class="login100-form-text" style="font-weight: bold;">Profile Image</label></center>
                            <div class="wrap-input100">
                                <input class="input100" type="file" name="profile_image" placeholder="Profile_Image">
                                <span class="focus-input100"></span>
                            </div>                                                
                            <hr/>
                            <center><label class="login100-form-text" style="font-weight: bold;">Agreement</label></center>
                            <p class="login100-form-text" style="font-weight: bold;">
                                In order to prevent fraud and protect our artists and buyers we must receive a copy of a government issued photo ID (i.e. passport or drivers license) before your work can be displayed for sale. You may black out your ID number.
                                Rest assured that we will protect the image that you send us can only be viewed by our administrative team.</p>
                            <center><label class="login100-form-text" style="font-weight: bold;">Identification Proof</label></center>
                            <div class="wrap-input100">
                                <input class="input100" type="file" name="idproof" placeholder="Government Issued Identification">
                                <span class="focus-input100"></span>
                            </div>                       

                            <div class="wrap-input100">
                                <input class="input100" type="text" name="legalname" placeholder="Enter Legal Name">
                                <span class="focus-input100"></span>
                            </div>                                                                            
                            <p class="login100-form-text" style="font-weight: bold;">
                                Enter your LEGAL name above what is on your government issued ID. We won't make this information public.
                            </p>

                            <div class="container-login100-form-btn">
                                <input type="submit" name="btn_signup" class="login100-form-btn"  value="SIGN UP"/>
                            </div>
                            <hr/>
                            <center><a href="signupartist.php">Back</a>
                                <div class="text-center p-t-12" style="padding:1;">
                                    <a class="txt2" href="signin.php">
                                        Back To Login
                                    </a>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    </html>
