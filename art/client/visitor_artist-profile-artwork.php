<?php
ob_start();
session_start();

include_once '../connection.php';
$q = "select * from tbl_artist where artist_id = '" . $_SESSION['profile'] . "'";

$city = $state = $country = "";

if ($res_q = mysqli_query($connection, $q)) {
    
} else {
    echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
}

$artist_uname = "";
$q2 = "select artist_username from tbl_artist where artist_id = '" . $_SESSION['profile'] . "'";
$res_q2 = mysqli_query($connection, $q2);
while ($r = mysqli_fetch_assoc($res_q2)) {
    $artist_uname = $r['artist_username'];
}

$select = "select * from tbl_artist a, tbl_shop s where a.artist_id = s.artist_id and artist_username = '" . $artist_uname . "'";
if ($selectres = mysqli_query($connection, $select)) {
    
} else {
    echo "Error: " . $select . "<br>" . mysqli_error($connection);
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
        <link href="css/shop/shop.css" rel="stylesheet" type="text/css"/>


        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>

    </head>
    <body>
        <?php include './visitor_header.php'; ?>
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
                        <!-- Middle Column -->
                        <div class="w3-col m12">
                            <div class="w3-row-padding">
                                <div class="w3-col m12">
                                    <div class="w3-card w3-round w3-white" style="padding:50px;">
                                        <div class="w3-container w3-padding">
                                            <br>
                                            <?php while ($r = mysqli_fetch_assoc($res_q)) { ?>
                                                <p class="w3-center"><img src="<?php echo $r['artist_profileimage'] ?>" class="w3-circle" style="height:400px;width:400px" alt="<?php echo $r['artist_profileimage'] ?> Image Not Found"></p>
                                                <h3 class="w3-center"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></h3>
                                                <div>
                                                    <center><h5>Artist</h5>
                                                        <hr/>
                                                        <?php echo $r['artist_about'] ?>
                                                        <hr/>
                                                        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $r['artist_education'] ?></p>
                                                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php echo $r['artist_dob'] ?></p>
                                                        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> 
                                                            <?php
                                                            $q2 = "select city_name from tbl_city where city_id = '" . $r['artist_city'] . "'";
                                                            $q3 = "select state_name from tbl_state where state_id = '" . $r['artist_state'] . "'";
                                                            $q4 = "select country_name from tbl_country where country_id = '" . $r['artist_country'] . "'";

                                                            $res_q4 = mysqli_query($connection, $q4);
                                                            while ($r = mysqli_fetch_array($res_q4)) {
                                                                $country = $r['country_name'];
                                                            }
                                                            $res_q3 = mysqli_query($connection, $q3);
                                                            while ($r = mysqli_fetch_array($res_q3)) {
                                                                $state = $r['state_name'];
                                                            }
                                                            $res_q2 = mysqli_query($connection, $q2);
                                                            while ($r = mysqli_fetch_array($res_q2)) {
                                                                $city = $r['city_name'];
                                                            }

                                                            echo $city . " , " . $state . " , " . $country;
                                                            ?>
                                                        </p>
                                                        <hr>
                                                    </center>
                                                <?php } ?>
                                            </div>  

                                            <div>
                                                    <center>
                                                        <div>
                                                            <a href="visitor_artist-profile.php?profile=<?php echo $_GET['profile']?>">
                                                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 40%;">
                                                                    Profile Information
                                                                </h4>
                                                            </a>
                                                            <a href="visitor_artist-profile-artwork.php?profile=<?php echo $_GET['profile']?>">
                                                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 40%;">
                                                                    Artwork
                                                                </h4>
                                                            </a>
                                                        </div>
                                                    </center>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-left: 2em;">
                                                            <?php
                                                            while ($r = mysqli_fetch_assoc($selectres)) {
                                                                ?>  
                                                                <figure class="snip1423">
                                                                    <img src="<?php echo $r['artfile'] ?>" alt="Image Not Found" height="250em"/>
                                                                    <figcaption>
                                                                        <h3><?php echo $r['arttitle'] ?></h3>
                                                                        <p><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></p>
                                                                        <div class="price">
                                                <!--                            <s>$24.00</s>$19.00-->
                                                                            <?php echo $r['price']  + $r['shipcost']. " INR" ?>
                                                                        </div>
                                                                    </figcaption>
                                                                    <i class="fa fa-angle-right"></i>
                                                                    <!--<a href="visitor_home.php"></a>-->
                                                                </figure>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
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
    </body>
</html>
