<?php
ob_start();
session_start();
include_once '../connection.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>About Us</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Animation -->
        <script src="js/wow.js" type="text/javascript"></script>
        <link href="css/animate_2.css" rel="stylesheet" type="text/css"/>

        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <?php
        if (empty($_SESSION['signin_username'])) {
            //echo 'visitor';
            require_once('./visitor_header.php');
        } else {
            if ($_SESSION['signin_user'] == "artist") {
                //echo 'artist';
                require_once('./artist_header.php');
            } elseif ($_SESSION['signin_user'] == "collector") {
                //echo 'collector';
                require_once('./collector_header.php');
            }
        }
        ?>
        <!--titleblock section-->
        <section class="sidermargins pb-100 pt-80" style="margin-top: 1%; ">
            <hr/>
            <center><h1 style="font-size:80px; font-family: serif; color: #542c6b;">About Us</h1></center>
            <hr/>
            <div class="container large-container" style="margin-top: 8%;">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="column-wrapper" style="">
                            <div class="media-container media-container--contact fancy-background wow rubberBand" style="">

                                <div class="title-wrapper" style="padding:20px;">
                                    <div class="title-block title-block--contact">
                                        <h5 class="title-block__subtitle txt-grey-transparent" style="font-size: 15px;text-align: left;padding:3%;">
                                            -> Vision Arts is the world’s leading online art gallery, connecting people with art and artists they love.
                                            <hr/>
                                            -> Vision Arts offers an unparalleled selection of paintings, drawings, sculpture and photography in a range of prices, and it provides artists from around the world with an expertly curated environment in which to exhibit and sell their work.                                        
                                            <hr/>
                                            -> Vision Arts Inc. ("Vision Arts," "we" or "our") provides a service for selling and purchasing original works of art and commercially exploiting digital images of works of art (the "Service", collectively the "Services") through our website, accessible at www.Visionarts.com (the "Site"). 
                                        </h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>


    <?php
    include('./footer.php');
    ob_flush();
    ?>

</div><!-- /.#page_wrapper -->

<a href="about.php" class="totop">TOP</a> <!--/.totop -->
</body>
</html>
