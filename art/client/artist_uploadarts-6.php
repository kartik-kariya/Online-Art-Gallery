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

        <script src="tinymce/js/tinymce/tinymce.min.js" type="text/javascript"></script>        
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
//        TINYMCE
        tinymce.init({
        selector: "textarea",
                themes: "modern",
                plugins: [
                        "advlist autolink lists link image charmap print preview anchor",
                        "searchreplace visualblocks code fullscreen",
                        "insertdatetime media table contextmenu paste moxiemanager"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
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
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80" style="background-color:#755588">
                            <span class="skill"><i class="val">80%</i></span>
                        </div>
                    </div>
                </center>
                <hr>

                <div>
                    <center>
                        <h2>Description</h2>
                        <p>Collectors tend to appreciate works more if they know the “story” behind them, 
                            so be sure to write <br/>informative artwork descriptions. Great descriptions not only provide useful information 
                            <br/>(e.g. physical texture, whether hanging hardware is included, quality of materials), <br/>but they also answer 
                            questions like:.</p>
                        <br/>
                        <h4>What/who inspired the work?</h4>
                        <h4>What do you hope its viewers will feel/think?</h4>
                        <h4>Why did you choose the medium, subject matter, style?</h4>
                        <br/>
                        <textarea name="description" id="pageBody" class="input100" style="width: 50%; height: 12em;" placeholder="Enter Text Here..."></textarea>
                        <br/>   
                    </center>
                </div>
                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-5.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>            
            <?php
            if (isset($_POST['btn_next'])) {
                $des = "";
                $des = $_POST['description'];

                $_SESSION['description'] = $des;
                $len = strlen($des);

                if ($len < 50) {
                    echo "<script>swal('Opps.!', 'Please Enter Minimum 50 Words Of Description .!', 'error');</script>";
                } else {
                    header("Location: artist_uploadarts-7.php");
                }
            }

            ob_flush();
            ?>
        </form>
    </body>
</html>
