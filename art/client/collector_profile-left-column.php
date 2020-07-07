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
        $q = "select * from tbl_customer where customer_username = '" . $_SESSION['signin_username'] . "'";
        $res_q = mysqli_query($connection, $q);
        $city = $state = $country = "";
        ?>
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <?php while ($r = mysqli_fetch_assoc($res_q)) { ?>
                        <br>
                        <p class="w3-center"><img src="<?php echo $r['customer_profileimage'] ?>" class="w3-circle" style="height:200px;width:200px" alt="<?php echo $r['artist_profileimage'] ?>" Image Not Found"></p>
                        <h3 class="w3-center"><?php echo $r['customer_firstname'] . " " . $r['customer_lastname'] ?></h3>
                        <center><h5>Customer</h5></center>
                        <hr>
                        <center>
                            <a href="collector_profile-account_info.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Account Information
                                </h4>
                            </a>
                            <a href="collector_profile-profile_image.php">
                                <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                    Profile Image
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
