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
        <div class="w3-col m3">
            <!-- Profile -->
            <div class="w3-card w3-round w3-white">
                <div class="w3-container">
                    <hr>
                    <center>
                        <a href="artist_orders-orders.php">
                            <h4 class="w3-button w3-margin-bottom" style="background-color: #755588;color: #fff;width: 100%;">
                                Pending Orders
                            </h4>
                        </a>
                    </center>
<!--                    <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
                    <div id="Demo1" class="w3-hide w3-container">
                        <p>Some text..</p>
                    </div>-->
                    <br/>
                    <br/>
                </div>
            </div>
            <br>
            <br>
            <!-- End Left Column -->
        </div>        
        <?php ob_flush(); ?>
    </body>
</html>
