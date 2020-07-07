<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
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
        <title>Category</title>
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
        <!-- LOAD JQUERY LIBRARY-->

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />

        <style>
            .productbox {
                background-color:#ffffff;
                padding:10px;
                margin-bottom:10px;
                -webkit-box-shadow: 0 8px 6px -6px  #999;
                -moz-box-shadow: 0 8px 6px -6px  #999;
                box-shadow: 8px 10px 8px -6px #999;
            }

            .producttitle {
                font-weight:bold;
                padding:8px 0 8px 0;
        	font-size:1.8em;
            }

            .productprice {
                border-top:1px solid #dadada;
                padding-top:5px;
            }

            .pricetext {
                font-weight:bold;
                font-size:1.3em;
            }
        </style>
    </head>

    <body>
        <?php
        include('./collector_header.php');
        ?>
        <div class="ag-mask">
            <div class="skew-mask">
            </div>
        </div>
        <?php
        include './collector_shopbox.php';
        ?>
        <?php
        include('footer.php');
        ?>

    </div><!-- /.#page_wrapper -->
</body>
</html>