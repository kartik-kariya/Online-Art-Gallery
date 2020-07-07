<?php
ob_start();
session_start();
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
include_once '../connection.php';
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
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="65" style="background-color:#755588">
                            <span class="skill"><i class="val">65%</i></span>
                        </div>
                    </div>
                </center>
                <hr>

                <div>
                    <center>
                        <h2>Dimensions</h2>
                        <p>It's very important to provide accurate dimensions as collectors need to know the exact size 
                            of artwork before purchasing it.</p>
                        <p>If your work is a flat work on paper, we recommend to provide .1 as the depth.</p>
                        <br/>
                        <label>Height</label>
                        <div class="wrap-input100">
                            <input type="number" min="1" name="height" class="input100" style="width: 12%;">inches
                            <span class="focus-input100" style="width: 12%;margin-left:44%;"></span>
                        </div>
                        <br/>
                        <label>Width</label>
                        <div class="wrap-input100">
                            <input type="number"min="1" name="width" class="input100" style="width: 12%;">inches
                            <span class="focus-input100" style="width: 12%;margin-left:44%;"></span>
                        </div>
                        <!--                        <br/>
                                                <label>Depth</label>
                                                <input type="number" name="depth" class="input100" style="width: 12%;">
                                                inches-->
                    </center>
                </div>

                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-4.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>
            <?php
            if (isset($_POST['btn_next'])) {
                if (!empty($_POST['height'])) {
                    if (!empty($_POST['width'])) {
                        $_SESSION['height'] = $_POST['height'];
                        $_SESSION['width'] = $_POST['width'];
//                                $_SESSION['depth'] = $_POST['depth'];

                        header("Location: artist_uploadarts-6.php");
                    } else {
                        echo "<script>swal('Opps.!', 'Please Enter The Width Of Arts .!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Please Enter The Height Of Arts .!', 'error');</script>";
                }
            }

            ob_flush();
            ?>
        </form>
    </body>
</html>
