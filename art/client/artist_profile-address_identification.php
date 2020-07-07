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
                                                        <h2>Address Information</h2>
                                                        <p>Update your Address Information</p>
                                                        <hr/>
                                                        <div class="row">
                                                            <div class="col-md-4" style="text-align: center;">
                                                                <h5>
                                                                    Street Address :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    City :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    State :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Country :
                                                                </h5>
                                                                <br/>
                                                                <h5>
                                                                    Zip/Postal code :
                                                                </h5>
                                                            </div>
                                                            <div class="col-md-7" style="text-align: left;">
                                                                <input type="text" name="streetaddress" value="<?php echo $r['artist_streetaddress'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;" 
                                                                       placeholder=""/>
                                                                <br/>
                                                                <br/>
                                                                <?php
                                                                $q2 = "select city_name from tbl_city where city_id = '" . $r['artist_city'] . "'";
                                                                $res_q2 = mysqli_query($connection, $q2);
                                                                while ($r = mysqli_fetch_assoc($res_q2)) {
                                                                    $city = $r['city_name'];
                                                                }
                                                                ?>
                                                                <input type="text" name="city"  value="<?php echo $city; ?>" class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <?php
                                                                $q2 = "select state_name from tbl_state where state_id = '" . $r['artist_state'] . "'";
                                                                $res_q2 = mysqli_query($connection, $q2);
                                                                while ($r = mysqli_fetch_assoc($res_q2)) {
                                                                    $state = $r['state_name'];
                                                                }
                                                                ?>
                                                                <input type="text" name="state" value="<?php echo $state ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <?php
                                                                $q2 = "select country_name from tbl_country where country_id = '" . $r['artist_country'] . "'";
                                                                $res_q2 = mysqli_query($connection, $q2);
                                                                while ($r = mysqli_fetch_assoc($res_q2)) {
                                                                    $country = $r['country_name'];
                                                                }
                                                                ?>
                                                                <input type="text" name="Country" value="<?php echo $country ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                                <input type="text" name="zipcode" value="<?php echo $r['artist_zipcode'] ?>" 
                                                                       class="w3-border w3-padding" style="width: 100%;"/>
                                                                <br/>
                                                                <br/>
                                                            </div>
                                                        </div>
                                                        <input type="submit" name="btn_save" value="Save" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                        <hr/>
                                                        <!--
                                                                                                                <h4>Government Issued Identification</h4>
                                                                                                                <p>In order to pay you for art sales we need a digital copy of your government issued identification. This will help us ensure that your commissions are paid out in a timely manner.</p>
                                                                                                                <p>n order to prevent fraud and protect our artists and buyers we must receive a copy of a government issued photo ID (i.e. passport or drivers license) before your work can be displayed for sale. You may black out your ID number.</p>
                                                                                                                <p>Rest assured that we will protect the image that you send us and can only be viewed by our administrative team.</p>
                                                                                                                <hr/>
                                                                                                                <div class="row">
                                                                                                                    <div class="col-md-4" style="text-align: center;">
                                                                                                                        <h5>
                                                                                                                            Upload Id :
                                                                                                                        </h5>
                                                                                                                        <br/>
                                                                                                                        <br/>
                                                                                                                        <br/>
                                                                                                                        <h5>
                                                                                                                            Enter Legal Name :
                                                                                                                        </h5>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-7" style="text-align: left;">
                                                                                                                        <input type="file" name="profile_image" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                                                                                        <br/>
                                                                                                                        <br/>
                                                                                                                        <input type="text" name="zipcode" value="<?php //echo $r['artist_legalname']    ?>" 
                                                                                                                               class="w3-border w3-padding" style="width: 100%;"/>
                                                                                                                        <br/>
                                                                                                                        <p>Enter your LEGAL name above what is on your government issued ID. We won't make this information public.</p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <input type="submit" name="btn_save" value="Save" class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;"/>
                                                                                                                <br/>
                                                                                                                <hr/>                                                        -->
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
    </body>
</html>
