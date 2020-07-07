<?php
ob_start();
session_start();
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
include_once '../connection.php';

$q = "select artist_id from tbl_artist where artist_username = '" . $_SESSION['signin_username'] . "'";
$res = mysqli_query($connection, $q);
$aid = "";
while ($r = mysqli_fetch_assoc($res)) {
    $aid = $r['artist_id'];
}
//echo $aid;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Upload Arts</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/sweetalert.min.js" type="text/javascript"></script>
    </head>
    <style>
        label{
            font-family: serif;
            font-size: 25px;
        }
        /*PROGRESS BAR*/
        .progress {
            height: 30px;
        }
        .progress .skill {
            font: normal 12px "Open Sans Web";
            line-height: 35px;
            padding: 0;
            margin: 0 0 0 20px;
            text-transform: uppercase;
        }
        .progress .skill .val {
            float: right;
            font-style: normal;
            margin: 0 20px 0 0;
        }

        .progress-bar {
            text-align: left;
            transition-duration: 3s;
        }
    </style>
    <script>
        //        PROGERSS BAR
        $(document).ready(function () {
            $('.progress .progress-bar').css("width",
                    function () {
                        return $(this).attr("aria-valuenow") + "%";
                    }
            )
        });

    </script>
    <body>
        <?php
        include('./artist_header.php');
        ?>
        <form method='post' enctype="multipart/form-data">
            <div style="margin-top: 7.5em;">
                <hr>
                <center>
                    <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Upload Arts</h1> 
                </center>

                <hr>

                <center>
                    <div class="progress skill-bar " style="width:80%;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="background-color:#755588">
                            <span class="skill"><i class="val">100%</i></span>
                        </div>
                    </div>
                </center>
                <hr>
                <div>
                    <center>
                        <h2>Pricing</h2>
                        <p>Price your artwork.</p>
                        <p>Remember : Your Profit Margin Is 50%.</p>
                        <br/>
                        <label>Price of artwork</label>
                        <input type="text" name="price" class="input100" style="width: 50%;">
                        <hr>
                        <label>Shipping Cost</label>
                        <input type="text" name="shipcost" class="input100" style="width: 50%;">
                        <label>[Paid by customer]</label>
                    </center>
                </div>
                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-7.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_submit" class="login100-form-btn"  value="Submit" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>
            <?php
            if (isset($_POST['btn_submit'])) {
                if (!empty($_POST['price'])) {
                    if (!empty($_POST['shipcost'])) {
                        $arttitle = $_SESSION['arttitle'];
                        $artfile = $_SESSION['artfile'];
                        $artcategory = $_SESSION['category'];
                        $artsubject = $_SESSION['subject'];
                        $year = $_SESSION['year'];
                        $copies = $_SESSION['copies'];
//                        echo $prints = $_SESSION['prints'];
//                        $copyrights = $_SESSION['copyrights'];
                        $artmediums = ucwords($_SESSION['artmediums']);
                        $artmaterials = ucwords($_SESSION['artmaterials']);
                        $artstyles = ucwords($_SESSION['artstyles']);
                        $artkeywords = ucwords($_SESSION['artkeywords']);
                        $height = $_SESSION['height'];
                        $width = $_SESSION['width'];
//                        echo $depth = $_SESSION['depth'];
                        $description = $_SESSION['description'];
                        $zipcode = $_SESSION['zipcode'];
                        $streetaddress = $_SESSION['streetaddress'];
                        $city = $_SESSION['city'];
                        $state = $_SESSION['state'];
                        $country = $_SESSION['country'];
                        $price = $_POST['price'];
                        $shipcost = $_POST['shipcost'];

                        date_default_timezone_set("Asia/Kolkata");
                        $date = $time = "";
                        $date = date('d-m-Y');
                        $time = date('g:i a');

                        $q = "insert into tbl_shop values('' , '$aid' , '$arttitle' , '$artfile' , '$artcategory' , '$artsubject' , '$year' , '$copies' , "
                                . "'$artmediums' , '$artmaterials' , '$artstyles' , '$artkeywords' , '$height' , '$width' , "
                                . "'$description' , '$zipcode' , '$streetaddress' , '$city' , '$state' , '$country' , '$price' , "
                                . "'$shipcost' , '$date' , '$time')";
                        //$res = mysqli_query($connection, $q) or die("ERROR...");
                        if (mysqli_query($connection, $q)) {
                            $profit = ($price * 65) / 100;
                            $totamt = $price + $shipcost;
                            echo "<script>swal('Done.!', 'Artwork uploaded Succesdfully .! "
                            . "Your Profit = $profit "
                            . "Total_Price = $totamt', 'success');</script>";
                        } else {
                            echo "Error: " . $q . "<br>" . mysqli_error($connection);
                            //echo "<script>swal('Opps.!', 'Something Went Wrong .!', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Please Enter The Ship Cost .!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Please Enter The Price Of Artwork .!', 'error');</script>";
                }
            }

            ob_flush();
            ?>
        </form>
    </body>
</html>
