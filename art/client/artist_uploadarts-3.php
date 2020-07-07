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
        <div style="margin-top: 7.5em;">
            <hr>
            <center>
                <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Upload Arts</h1> 
            </center>

            <hr>
            <center>
                <div class="progress skill-bar " style="width:80%;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="30" style="background-color:#755588">
                        <span class="skill"><i class="val">30%</i></span>
                    </div>
                </div>
            </center>
            <hr>

            <form method='post' enctype="multipart/form-data">
                <div class="container">
                    <center>
                        <div>
                            <h2>Artwork Status</h2>
                            <p style="font-size: 15px;">Let us know how you'd like to sell your artwork?</p>
                        </div>
                        <hr>

                        <h4>Which year did you create this artwork.?</h4>                        
                        <div class="wrap-input100">
                            <input type="number" name="year" min="1" minlength="4" maxlength="4" class="input100" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>

                        <h4>How many copies available for selling.?</h4>
                        <div class="wrap-input100">
                            <input type="number" min="1" name="copies" class="input100" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>
                        
<!--                        <div class="row">
                            <div class="btn btn-group-lg" style="outline:none;" data-toggle="buttons">
                                <label class="btn" style="width: 8em; border:solid 1px;">
                                    <input type="radio" name="original" id="YES" value="YES" autocomplete="off"> Yes
                                </label>
                                &nbsp;
                                <label class="btn" style="width: 8em; border:solid 1px;">
                                    <input type="radio" name="original" id="NO" value="NO" autocomplete="off"> No
                                </label>
                            </div>
                        </div>-->

                        <!--                        <h4>Would you like to make it available for prints?</h4>
                                                <div class="row">
                                                    <div class="btn btn-group-lg" data-toggle="buttons">
                                                        <label class="btn" style="width: 8em; border:solid 1px;">
                                                            <input type="radio" name="prints" id="YES" value="YES" autocomplete="off"> Yes
                                                        </label>
                                                        &nbsp;
                                                        <label class="btn" style="width: 8em; border:solid 1px;">
                                                            <input type="radio" name="prints" id="NO" value="NO" autocomplete="off"> No
                                                        </label>
                                                    </div>
                                                </div>
                        
                                                <hr>-->

                        <h4>Are you the copyright owner of this artwork?</h4>
                        <div class="row">
                            <div class="btn btn-group-lg" data-toggle="buttons">
                                <label class="btn" style="width: 8em; border:solid 1px;">
                                    <input type="radio" name="copyrights" id="YES" value="YES" autocomplete="off"> Yes
                                </label>
                                &nbsp;
                                <label class="btn" style="width: 8em; border:solid 1px;">
                                    <input type="radio" name="copyrights" id="NO" value="NO" autocomplete="off"> No
                                </label>
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-2.php"/>
                            &nbsp;&nbsp;
                            <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                        </div>
                        <hr>
                    </center>
                </div>
                <?php
                if (isset($_POST['btn_next'])) {
                    if (empty($_POST['year']) && empty($_POST['original'])&& empty($_POST['copyrights'])) {
                        echo "<script>swal('Opps.!', 'Empty Fields Are Not Allowed.!', 'error');</script>";
                    } else if (!empty($_POST['year'])) {
                        if (!empty($_POST['copies'])) {
                            if (!empty($_POST['copyrights'])) {
                                if ($_POST['copyrights'] == "NO") {
                                    echo "<script>swal('Sowrie.!', 'If You Want To Upload Artwork Then Its Must Be Your Copyright..', 'error');</script>";
                                } else {
                                    $_SESSION['year'] = $_POST['year'];
                                    $_SESSION['copies'] = $_POST['copies'];
//                                        $_SESSION['prints'] = $_POST['prints'];
                                    $_SESSION['copyrights'] = $_POST['copyrights'];

                                    header("Location: artist_uploadarts-4.php");
                                }
                            } else {
                                echo "<script>swal('Opps.!', 'Please Select that Are you the copyright owner of this artwork.?', 'error');</script>";
                            }
                        } else {
                            echo "<script>swal('Opps.!', 'Please Enter Number Of Available Copies For Selling.!', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Please Enter Year.!', 'error');</script>";
                    }
                }
                ?>
            </form>
        </div>
        <?php
        ob_flush();
        ?>
    </body>
</html>
