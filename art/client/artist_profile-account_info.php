<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}

$select = "select * from tbl_artist where artist_username = '" . $_SESSION['signin_username'] . "'";
if ($selectres = mysqli_query($connection, $select)) {
    
} else {
    echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
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
                                            <?php while ($r = mysqli_fetch_assoc($selectres)) { ?>
                                                <center>
                                                    <form method="post">
                                                        <h2>Account Information</h2>
                                                        <p>Update your Account Information</p>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-4" style="text-align: center;">
                                                                <h5>
                                                                    Firstname :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Lastname :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Username :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    New Password :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Confirm Password :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Email-Id :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Contact Number :
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-7" style="text-align: left;">
                                                                <input type="text" name="firstname" value="<?php echo $r['artist_firstname'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="lastname" value="<?php echo $r['artist_lastname'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="username" value="<?php echo $r['artist_username'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;" readonly="true"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="password" name="password" value="<?php $password = $r['artist_password'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="password" name="confirm_password" value="<?php ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="email" name="email" value="<?php echo $r['artist_email'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="contactnumber" value="<?php echo $r['artist_contactnumber'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                            </div>
                                                        </div>
                                                        <hr/>
                                                        <input type="submit" name="btn_save" value="Save" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                    </form>
                                                </center>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['btn_save'])) {
            $err = 0;
            if (!empty($_POST['firstname'])) {
                $firstname = $_POST['firstname'];
            } else {
                echo "<script>swal('Opps.!', 'Please Enter Firstname .!', 'error');</script>";
                $err = 1;
            }
            if (!empty($_POST['lastname'])) {
                $lastname = $_POST['lastname'];
            } else {
                echo "<script>swal('Opps.!', 'Please Enter Lastname .!', 'error');</script>";
                $err = 1;
            }
            if (!empty($_POST['password'])) {
                if (!empty($_POST['confirm_password'])) {
                    if (strlen($_POST['password']) >= 8) {
                        if ($_POST['password'] == $_POST['confirm_password']) {
                            $password = $_POST['password'];
                        } else {
                            echo "<script>swal('Opps.!', 'Password Not Matched .!', 'error');</script>";
                            $err = 1;
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Minimum Password Length Is 8 Character.!', 'error');</script>";
                        $err = 1;
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Confirm Password Cannot Be Empty .!', 'error');</script>";
                    $err = 1;
                }
            }
            if (!empty($_POST['email'])) {
                $email = $_POST['email'];
            } else {
                echo "<script>swal('Opps.!', 'Please Enter Email-Id .!', 'error');</script>";
                $err = 1;
            }
            if (!empty($_POST['contactnumber'])) {
                if ((strlen($_POST['contactnumber']) == 10) && ($_POST['contactnumber'][0] == "9" || $_POST['contactnumber'][0] == "8" || $_POST['contactnumber'][0] == "7" || $_POST['contactnumber'][0] == "6")) {
                    $contact_number = $_POST['contactnumber'];
                } else {
                    echo "<script>swal('Opps.!', 'Invalid Contact Number .!', 'error');</script>";
                    $err = 1;
                }
            } else {
                echo "<script>swal('Opps.!', 'Please Enter Contact Number .!', 'error');</script>";
                $err = 1;
            }

            if ($err == 0) {
                $update = "update tbl_artist set artist_firstname = '$firstname' , artist_lastname = '$lastname',"
                        . "artist_password = '$password' , artist_email = '$email' , artist_contactnumber = '$contact_number'"
                        . "where artist_username = '" . $_SESSION['signin_username'] . "'";
                if (mysqli_query($connection, $update)) {
                    echo "<script>swal('Done.!', 'Details Update Successfully .!', 'success');</script>";
                    header("Location: artist_profile-account_info.php");
                } else {
                    echo "Error: " . $update . "<br>" . mysqli_error($connection);
                    //echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
                }
            }
        }
        ?>
    </body>
</html>
