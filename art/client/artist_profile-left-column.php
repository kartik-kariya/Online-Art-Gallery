<?php
ob_start();
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
    </head>
    <body>  
        <?php
        //echo $_SESSION['signin_username'];
        $q = "select * from tbl_artist where artist_username = '" . $_SESSION['signin_username'] . "'";
        $res_q = mysqli_query($connection, $q);
        $city = $state = $country = "";
        ?>
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <?php while ($r = mysqli_fetch_assoc($res_q)) { ?>
                        <br>
                        <p class="w3-center"><img src="<?php echo $r['artist_profileimage'] ?>" class="w3-circle" style="height:200px;width:200px" alt="<?php echo $r['artist_profileimage'] ?>" Image Not Found"></p>
                        <h3 class="w3-center"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></h3>
                        <center><h5>Artist</h5></center>
                        <hr>
                        <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> <?php echo $r['artist_education'] ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> 
                            <?php
                            $q2 = "select city_name from tbl_city where city_id = '" . $r['artist_city'] . "'";
                            $q3 = "select state_name from tbl_state where state_id = '" . $r['artist_state'] . "'";
                            $q4 = "select country_name from tbl_country where country_id = '" . $r['artist_country'] . "'";
                            

                            $res_q2 = mysqli_query($connection, $q2);
                            while ($r = mysqli_fetch_assoc($res_q2)) {
                                $city = $r['city_name'];
                            }
                            $res_q3 = mysqli_query($connection, $q3);
                            while ($r = mysqli_fetch_assoc($res_q3)) {
                                $state = $r['state_name'];
                            }
                            $res_q4 = mysqli_query($connection, $q4);
                            while ($r = mysqli_fetch_assoc($res_q4)) {
                                $country = $r['country_name'];
                            }

                            echo $city . " , " . $state . " , " . $country;
                            ?>
                        </p>
                        <!--<p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> <?php //echo $r['artist_dob'] ?></p>-->
                        <hr>
                        <center>
                            <a href="artist_profile-account_info.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Account Information
                                </h4>
                            </a>
                            <a href="artist_profile-profile_info.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Profile Information
                                </h4>
                            </a>
                            <a href="artist_profile-profile_image.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Profile Image
                                </h4>
                            </a>
<!--                            <a href="artist_profile-address_identification.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Address Information
                                </h4>
                            </a>-->
                            <a href="artist_profile-artwork.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Artworks
                                </h4>
                            </a>
                        </center>
    <!--                    <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
                        <div id="Demo1" class="w3-hide w3-container">
                            <p>Some text..</p>
                        </div>-->
                        <br/>
                        <br/>
                    <?php } ?>
                </div>
            </div>
            <br>
            <br>
            <!-- End Left Column -->
        </div>        
        <?php ob_flush(); ?>
    </body>
</html>
