<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}

$select = "select * from tbl_artist a, tbl_shop s where a.artist_id = s.artist_id and artist_username = '" . $_SESSION['signin_username'] . "'";
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
        <link href="css/shop/shop.css" rel="stylesheet" type="text/css"/>


        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>

        <script>
            /* Demo purposes only */
            $(".hover").mouseleave(
                    function () {

                        $(this).removeClass("hover");
                    }
            );
        </script>

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
                                            <center>
                                                <form method="post">
                                                    <h2>Artwork</h2>
                                                    <hr/>
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
                                                                                <?php echo $r['price'] + $r['shipcost'] . " INR" ?>
                                                                            </div>
                                                                        </figcaption>
                                                                        <i class="fa fa-angle-double-right"></i>
                                                                        <a href="artist_artdetails.php?id=<?php echo $r['shop_id'] ?>"></a>
                                                                    </figure>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <br/>
                                                    <br/>

                                                </form>
                                            </center>
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
