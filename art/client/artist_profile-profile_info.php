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
                                                        <h2>Profile Information</h2>
                                                        <p>Update your Profile Information</p>
                                                        <h4>Links</h4>
                                                        <p>We'll add icons with links to any of the below sites that you provide.</p>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-4" style="text-align: center;">
                                                                <h5>
                                                                    Google+ :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Twitter :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Facebook :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Instagram :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Personal Website :
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-7" style="text-align: left;">
                                                                <input type="text" name="googleplus" value="<?php echo $r['artist_googleplus'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;" 
                                                                       placeholder=""/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="twitter" value="<?php echo $r['artist_twitter'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="facebook" value="<?php echo $r['artist_facebook'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="instagram" value="<?php echo $r['artist_instagram'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="website" value="<?php echo $r['artist_website'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"
                                                                       placeholder="e.g http://yourwebsite.com"/>
                                                            </div>
                                                        </div>
                                                        <hr/>

                                                        <h4>Personal Information</h4>
                                                        <p>Share with us here about who you are, where you've studied, and any upcoming or past exhibitions.</p>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-4" style="text-align: center;">
                                                                <h5>
                                                                    About Me :
                                                                </h5>
                                                                <br/>
                                                                <br/>
                                                                <br/>
                                                                <h5>
                                                                    Education :
                                                                </h5>
                                                                <br/>
                                                                <br/>
                                                                <br/>
                                                            </div>
                                                            <div class="col-md-7" style="text-align: left;">
                                                                <textarea name="about" class="w3-border w3-padding" style="width: 100%;">
                                                                    <?php echo $r['artist_about'] ?>
                                                                </textarea>
                                                                <br/>
                                                                <br/>
                                                                <textarea name="education" class="w3-border w3-padding" style="width: 100%;">
                                                                    <?php echo $r['artist_education']; ?>
                                                                </textarea>
                                                                <br/>
                                                                <br/>
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
        <br/><br/>
        <?php
        if (isset($_POST['btn_save'])) {
            $googleplus = $_POST['googleplus'];
            $twitter = $_POST['twitter'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $website = $_POST['website'];
            $about = $_POST['about'];
            $education = $_POST['education'];
            $exhibition = $_POST['exhibition'];

            $update = "update tbl_artist set artist_googleplus = '$googleplus' , artist_twitter = '$twitter' ,"
                    . "artist_facebook = '$facebook' , artist_instagram = '$instagram' , artist_website = '$website' ,"
                    . "artist_about = '$about' , artist_education = '$education' "
                    . "where artist_username = '" . $_SESSION['signin_username'] . "'";
            if (mysqli_query($connection, $update)) {
                echo "<script>swal('Done.!', 'Details Update Successfully .!', 'success');</script>";
                header("Location: artist_profile-profile_info.php");
            } else {
                echo "Error: " . $update . "<br>" . mysqli_error($connection);
                //echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
            }
        }
        ?>
    </body>
</html>
