<?php
ob_start();
include_once '../connection.php';
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
//require 'claviska/SimpleImage.php';
        include('libs/phpqrcode/qrlib.php');

        if (isset($_POST['btn_next']) && !empty($_POST['btn_next'])) {
            $firstname = $lastname = $username = $password = $email_id = $contact_number = $city = $address = $dob = $qualification = $interest = $about_me = $img = $image = $name = $tmp_name = $error = $qrcode = "";

            if (!empty($_POST['firstname'])) {
                if (!empty($_POST['lastname'])) {
                    if (!empty($_POST['username'])) {
                        if (!empty($_POST['password'])) {
                            if (!empty($_POST['confirm_password'])) {
                                if (!empty($_POST['email_id'])) {
                                    if (!empty($_POST['contact_number'])) {
                                        if ($_POST['city'] != 'selected') {
                                            if ($_POST['state'] != 'selected') {
                                                if ($_POST['country'] != 'selected') {
                                                    if (!empty($_POST['zipcode'])) {
                                                        if (strlen($_POST['zipcode']) == 6) {
                                                            $firstname = ucwords($_POST['firstname']);
                                                            $lastname = ucwords($_POST['lastname']);
                                                            $username = $_POST['username'];
                                                            if (strlen($_POST['password']) >= 8) {
                                                                if ($_POST['password'] != $_POST['confirm_password']) {
                                                                    echo "<script>swal('Opps.!', 'Password Not Matched .!', 'error');</script>";
                                                                } else {
                                                                    if (strlen($_POST['contact_number']) == 10 && ($_POST['contact_number'][0] == "9" || $_POST['contact_number'][0] == "8" || $_POST['contact_number'][0] == "7" || $_POST['contact_number'][0] == "6")) {
                                                                        $password = ucwords($_POST['password']);
                                                                        $email_id = strtolower($_POST['email_id']);
                                                                        $contact_number = ucwords($_POST['contact_number']);
                                                                        $city = ucwords($_POST['city']);
                                                                        $state = ucwords($_POST['state']);
                                                                        $country = ucwords($_POST['country']);
                                                                        $zipcode = $_POST['zipcode'];

                                                                        $q = "select artist_username from tbl_artist where artist_username='$username'";
                                                                        $r = mysqli_query($connection, $q);

                                                                        if (mysqli_num_rows($r) > 0) {
                                                                            echo "<script>swal('Opps.!', 'Username Already Exist .!', 'error');</script>";
                                                                            //echo "<script type='text/javascript'>alert('Username Already Registered')</script>";
                                                                        } else {
                                                                            $q = "select customer_username from tbl_customer where customer_name='$username'";
                                                                            $r = mysqli_query($connection, $q);

                                                                            if (mysqli_num_rows($r) > 0) {
                                                                                echo "<script>swal('Opps.!', 'Username Already ExistCity .!', 'error');</script>";
                                                                                //echo "<script type='text/javascript'>alert('Username Already Registered')</script>";
                                                                            } else {
                                                                                $_SESSION['signupfirstname'] = $firstname;
                                                                                $_SESSION['signuplastname'] = $lastname;
                                                                                $_SESSION['signupusername'] = $username;
                                                                                $_SESSION['signuppassword'] = $password;
                                                                                $_SESSION['signupemailid'] = $email_id;
                                                                                $_SESSION['signupcontactnumber'] = $contact_number;
                                                                                $_SESSION['signupcity'] = $city;
                                                                                $_SESSION['signupstate'] = $state;
                                                                                $_SESSION['signupcountry'] = $country;
                                                                                $_SESSION['signupzipcode'] = $zipcode;

                                                                                header("Location: signupartist-2.php");
                                                                            }
                                                                        }
                                                                    } else {
                                                                        echo "<script>swal('Opps.!', 'Invalid Contact Number.!', 'error');</script>";
                                                                    }
                                                                }
                                                            }
                                                        } else {
                                                            echo "<script>swal('Opps.!', 'Invalid Zipcode.!', 'error');</script>";
                                                        }
                                                    } else {
                                                        echo "<script>swal('Opps.!', 'Enter Zipcode.!', 'error');</script>";
                                                    }
                                                } else {
                                                    echo "<script>swal('Opps.!', 'Enter Country .!', 'error');</script>";
                                                }
                                            } else {
                                                echo "<script>swal('Opps.!', 'Enter State .!', 'error');</script>";
                                            }
                                        } else {
                                            echo "<script>swal('Opps.!', 'Enter City .!', 'error');</script>";
                                        }
                                    } else {
                                        echo "<script>swal('Opps.!', 'Enter Contact Number .!', 'error');</script>";
                                    }
                                } else {
                                    echo "<script>swal('Opps.!', 'Enter Email-Id .!', 'error');</script>";
                                }
                            } else {
                                echo "<script>swal('Opps.!', 'Enter ConfirmPassword .!', 'error');</script>";
                            }
                        } else {
                            echo "<script>swal('Opps.!', 'Enter Password .!', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Enter Username .!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Enter Lastname.!', 'error');</script>";
                }
            } else {
                echo "<script>swal('Opps.!', 'Enter Firstname.!', 'error');</script>";
                //echo "<script type='text/javascript'>alert('Empty Fields Not Allowed')</script>";
            }
        }

//        $firstname = $_POST['firstname'];
//        $lastname = $_POST['lastname'];
//        $username = $_POST['username'];
//
//        if (strlen($_POST['password']) >= 8) {
//            if ($_POST['password'] != $_POST['confirm_password']) {
//                echo "<script type='text/javascript'>alert('Password Not Matched')</script>";
//            } else {
//                if (strlen($_POST['contact_number']) == 10 && ($_POST['contact_number'][0] == "9" || $_POST['contact_number'][0] == "8" || $_POST['contact_number'][0] == "7")) {
//                    $password = $_POST['password'];
//                    $email_id = $_POST['email_id'];
//                    $contact_number = $_POST['contact_number'];
//                    $city = $_POST['city'];
//                    $address = $_POST['address'];
//                    $dob = $_POST['dob'];
//                    $qualification = $_POST['qualification'];
//                    $interest = "";
//                    $about_me = $_POST['about_me'];
//                    $qrcode = $_POST['qrcode'];
//
//                    if (!empty($_FILES['ProfileImage'])) {
//                        $target_dir = "./arts_files/Artist_ProfileImages/" . $username . "/";
//                        if (!is_dir($target_dir)) {
//                            mkdir($target_dir);
//                        }
//                        $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["ProfileImage"]["name"]);
//                        $uploadOk = 1;
//                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//
//                        if (isset($_POST["btn_signup"])) {
//// Check if image file is a actual image or fake image
//                            $check = getimagesize($_FILES["ProfileImage"]["tmp_name"]);
//                            if ($check !== false) {
//                                //echo "File is an image - " . $check["mime"] . ".";
//                                $uploadOk = 1;
//                            } else {
//                                echo "<script type='text/javascript'>alert('File is not an image.')</script>";
//                                //echo "File is not an image.";                                
//                                $uploadOk = 0;
//                            }
//                        }
//// Check if file already exists
//                        if (file_exists($target_file)) {
//                            echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
//                            //echo "Sorry, file already exists.";
//                            $uploadOk = 0;
//                        }
//// Check file size
//                        if ($_FILES["ProfileImage"]["size"] > 10000000) {
//                            echo "<script type='text/javascript'>alert('Sorry, your file is too large.')</script>";
//                            //echo "Sorry, your file is too large.";
//                            $uploadOk = 0;
//                        }
//// Allow certain file formats
//                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//                            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
//                            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                            $uploadOk = 0;
//                        }
//// Check if $uploadOk is set to 0 by an error
//                        if ($uploadOk == 0) {
//                            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.')</script>";
//                            //echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//                        } else {
//                            if (move_uploaded_file($_FILES["ProfileImage"]["tmp_name"], $target_file)) {
//                                //echo "The file " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
//                            } else {
//                                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
//                                //echo "Sorry, there was an error uploading your file.";
//                            }
//                        }
//
//                        $dir = $target_dir . "QRCODE/";
//                        //echo $dir;
//                        if (!is_dir($dir)) {
//                            mkdir($dir);
//                        }
//
//                        $codeContents = urlencode($qrcode);
//                        QRcode::png($qrcode, $dir . $email_id . '.png', QR_ECLEVEL_L, 5);
//                    } else {
//                        $target_file = "";
//                    }
//
////                    if (isset($_FILES['ProfileImage']['name'])) {
////                        $name = $_FILES['ProfileImage']['name'];
////                        $tmp_name = $_FILES['ProfileImage']['tmp_name'];
////                        $error = $_FILES['ProfileImage']['error'];
////
////                        if (!empty($name)) {
////                            $location = 'arts_files/Artist_ProfileImages/' . $username . '/';
////                            mkdir($location);
////                            if (move_uploaded_file($tmp_name, $location . $name)) {
////                                $image = new \claviska\SimpleImage();
////                                $image
////                                        ->fromFile($location . $_FILES["ProfileImage"]["name"])
////                                        ->resize(430, 540)
////                                        ->toFile(($location . $_FILES["ProfileImage"]["name"]), 'image/png');
////                            }
////                        } else {
////                            echo 'please choose a file';
////                        }
////                    }
//
//                    $q = "select uname from tbl_artists where uname='$username'";
//                    $r = mysqli_query($connection, $q);
//                    if (mysqli_num_rows($r) > 0) {
//                        echo "<script type='text/javascript'>alert('Username Already Registered')</script>";
//                    } else {
//                        $q = "select uname from tbl_customer where uname='$username'";
//                        $r = mysqli_query($connection, $q);
//                        if (mysqli_num_rows($r) > 0) {
//                            echo "<script type='text/javascript'>alert('Username Already Registered')</script>";
//                        } else {
//                            header("Location: signupartist-2.php");
////                            $q = "INSERT INTO  tbl_artists VALUES ('', '$firstname' , '$lastname' , '$username' , '$password' , '$email_id' , '$contact_number' , '$city' , '$address' , '$dob' , '$interest' , '$qualification' , '$about_me' , '$target_file' , '$codeContents')";
////                            $r = mysqli_query($connection, $q);
//                        }
//                    }
//                } else {
//                    echo "<script type='text/javascript'>alert('Invalid Contact Number')</script>";
//                }
//            }
//        } else {
//            echo "<script type='text/javascript'>alert('password length must be greater then 6')</script>";
//        }
//    } else {
//        echo "<br>".$_POST['firstname'];
//        echo "<br>".$_POST['lastname'];
//        echo "<br>".$_POST['username'];
//        echo "<br>".$_POST['password'];
//        echo "<br>".$_POST['confirm_password'];
//        echo "<br>".$_POST['email_id'];
//        echo "<br>".$_POST['contact_number'];
//        echo "<br>".$_POST['city'];
//        echo "<br>".$_POST['address'];
//        echo "<br>".$_POST['dob'];
//        echo "<br>".$_POST['qualification'];
//        echo "<br>".$_POST['about_me'];
//        echo "<script type='text/javascript'>alert('Empty Fields Not Allowed')</script>";
//    }
//}
        ?>	
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-pic js-tilt" data-tilt>
                                <a href="visitor_home.php" class="site-logo-anch">
                                         <img  src="arts_files/images/logo3.jpg" width="220" height="220" alt="Vision"style="margin-top: 70%;"> 
                                </a>                        
                        <!--<img src="arts_files/Signup/img-02.png" alt="IMG">-->
                    </div>

                    <form class="login100-form validate-form" method="post" enctype="multipart/form-data">
                        <span class="login100-form-title">
                            <h2 style="color: #755588">SIGN UP</h2>
                        </span>
                        <hr>
                        <div class="wrap-input100" >
                            <input class="input100" type="text" name="firstname" placeholder="Firstname">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100" >
                            <input class="input100" type="text" name="lastname" placeholder="Lastname">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100" >
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 ">
                            <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password">
                            <span class="focus-input100"></span>
                        </div>                        

                        <div class="wrap-input100">
                            <input class="input100" type="email" name="email_id" placeholder="Email Id">
                            <span class="focus-input100"></span>
                        </div>                        

                        <div class="wrap-input100">
                            <input class="input100" type="text" name="contact_number" placeholder="Contact Number">
                            <span class="focus-input100"></span>
                        </div>                        

                        <?php
                        $q = "select * from tbl_city where city_status='active' order by city_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none;" name="city">
                                <option class="input100" value="selected">--Select City--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['city_name'] . ">";
                                    echo $row['city_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100"></span>
                        </div>
                        <?php
                        $q = "select * from tbl_state order by state_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none;" name="state">
                                <option class="input100" value="selected">--Select State--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['state_name'] . ">";
                                    echo $row['state_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100"></span>
                        </div>
                        <?php
                        $q = "select * from tbl_country order by country_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none;" name="country">
                                <option class="input100" value="selected">--Select Ccuntry--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['country_name'] . ">";
                                    echo $row['country_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100">
                            <input class="input100" type="number" min="1" name="zipcode" placeholder="Zipcode">
                            <span class="focus-input100"></span>
                        </div>                        

                        <!--                        <div class="wrap-input100">
                                                    <select class="input100" style="outline:none;" name="city">
                                                        <option class="input100">
                                                            Surat
                                                        </option>
                                                        <option class="input100">
                                                            Vadodara
                                                        </option>
                                                    </select>
                                                    <span class="focus-input100"></span>
                                                </div>                        -->

                        <!--                        <div class="wrap-input100">
                                                    <input class="input100" type="text" name="address" placeholder="Address">
                                                    <span class="focus-input100"></span>
                                                </div>                        
                        
                                                <div class="wrap-input100" >
                                                    <input class="input100" type="date" name="dob" placeholder="Date Of Birth">
                                                    <span class="focus-input100"></span>
                                                </div>           
                        
                                                <div class="wrap-input100">
                                                    <input  type="text" class="input100"  name="qualification" placeholder="Qulification">
                                                    <span class="focus-input100"></span>
                                                </div>                        -->

                        <!--                        <?php
                        //$q = "select * from tbl_subcategory order by subcategory_name";
                        ?>
                                                <div class="wrap-input100 validate-input" >
                                                    <table>
                        <?php //foreach ($connection->query($q) as $row) {          ?>                                                        
                                                            <tr>
                                                                <td>
                                                                    <label class="checkbox-inline">
                                                                        <span class="col-2"></span>
                                                                        <input type="checkbox" name="interest[]" value="<?php //echo $row['subcategory_name']                    ?>" >                                    
                        <?php //echo $row['subcategory_name'];           ?>
                                                                    </label>
                                                                </td> 
                                                            </tr>   
                        <?php //}           ?>
                                                    </table>
                                                </div>-->

                        <!--                        <div class="wrap-input100">
                                                    <span class="col-2"></span>                            
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="interest[]" value="Option 1">Option 1
                                                    </label>
                                                    <span class="col-2"></span>
                                                    <label class="checkbox-inline">
                                                        <input type="checkbox" name="interest[]" value="Option 2">Option 2
                                                    </label>
                                                </div>                        -->

                        <!--                        <div class="wrap-input100">
                                                    <input class="input100" type="text" name="about_me" placeholder="About Me">
                                                    <span class="focus-input100"></span>
                                                </div>                        -->

                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_next" class="login100-form-btn"  value="NEXT"/>
                        </div>

                        <div class="text-center p-t-12" style="padding:1;">
                            <a class="txt2" href="signin.php">
                                Back To Signin
                            </a>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
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

