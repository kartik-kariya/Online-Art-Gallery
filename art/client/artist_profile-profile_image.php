<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="addons/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="addons/Magnific-Popup/magnific-popup.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="addons/revolution/css/settings.css">
        <script src="js/sweetalert.min.js" type="text/javascript"></script>



        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>
    </head>
    <body>
        <?php include './artist_header.php'; ?>
        <div>
            <div style="margin-top: 7.5em;">
                <hr>
                <center>
                    <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Profile</h1> 
                </center>

                <hr>

                <!-- Page Container -->
                <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
                    <!-- The Grid -->
                    <div class="w3-row">
                        <!-- Left Column -->
                        <?php include './artist_profile-left-column.php'; ?>
                        <!-- Middle Column -->
                        <div class="w3-col m9">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <div class="w3-card w3-round w3-white" style="padding:50px;">
                                        <div class="w3-container w3-padding">
                                            <form method="post" enctype="multipart/form-data">
                                                <center>
                                                    <h2>Profile Image</h2>
                                                    <p>Update your Profile Image</p>
                                                    <h4>Select an image to upload</h4>
                                                    <input type="file" name="profile_image" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                    <input type="submit" name="btn_save" value="Save" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                </center>
                                                <?php
                                                if (isset($_POST['btn_save'])) {
                                                    if (!empty($_FILES['profile_image']['name'])) {
                                                        $userdir = "";
                                                        $userdir = "./arts_files/Artist/" . $_SESSION['signin_username'] . "/";
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

                                                        if (isset($_POST["btn_save"])) {
                                                            // Check if image file is a actual image or fake image
                                                            $check = getimagesize($_FILES["profile_image"]["tmp_name"]);
                                                            if ($check !== false) {
                                                                //echo "File is an image - " . $check["mime"] . ".";
                                                                $uploadOk = 1;
                                                            } else {
                                                                echo "<script type='text/javascript'>alert('File is not an image.')</script>";
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
                                                                //echo "Sorry, your file is too large.";
                                                                $uploadOk = 0;
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
                                                                //echo "Sorry, your file was not uploaded.";
                                                            }
                                                            // if everything is ok, try to upload file
                                                            else {
                                                                if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                                                                    //echo $_SESSION['artfile'];
                                                                    //echo "The file " . basename($_FILES["profile_image"]["name"]) . " has been uploaded.";
                                                                    
                                                                    $profileimg = $target_file;
                                                                    $q = "update tbl_artist set artist_profileimage = '$profileimg' where artist_username = '".$_SESSION['signin_username']."'";
                                                                    if(mysqli_query($connection , $q)){
                                                                        //echo "<script>swal('Good Job.!', 'Profile Image Update Successfully .!', 'success');</script>";
                                                                        header("Location: artist_profile-profile_image.php");                                                                        
                                                                    } else {
                                                                        echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
                                                                    }
                                                                } else {
                                                                    echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.Try Again.')</script>";
                                                                    //echo "Sorry, there was an error uploading your file.";
                                                                }
                                                                //echo $profileimg;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                        
                                                    }
                                                    ?>                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Middle Column -->
                            </div>
                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- End Page Container -->
                </div>
            </div>
            <br>

            <?php include './footer.php'; ?>
        <!--             Footer 
                    <footer class="w3-container w3-theme-d3 w3-padding-16">
                        <h5>Footer</h5>
                    </footer>
        
                    <footer class="w3-container w3-theme-d5">
                        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                    </footer>-->

        <script>
            // Accordion
            function myFunction(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                    x.previousElementSibling.className += " w3-theme-d1";
                } else {
                    x.className = x.className.replace("w3-show", "");
                    x.previousElementSibling.className =
                            x.previousElementSibling.className.replace(" w3-theme-d1", "");
                }
            }

            // Used to toggle the menu on smaller screens when clicking on the menu button
            function openNav() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>
    </body>
</html>
