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
<!--ADD MEDIUM-->
        $(document).ready(function () {

        var maxField = 6; //Input fields increment limitation
                var addButton = $('.add_a_button'); //Add button selector
                var wrapper = $('.addtags'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="text" name="artmediums[]" style="width: 50%;"><br>'; //New input field html 
                            var x = 1; //Initial field counter is 1
                            $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                    x++; //Increment field counter
                            $(wrapper).append(fieldHTML); // Add field html  
    }
        });
    $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                        e.preventDefault();
                        $(this).parent('form-group').remove(); //Remove field html
                        x--; //Decrement field counter
                    });

                });
        
<!--ADD MATERIAL-->
        $(document).ready(function () {

        var maxField = 6; //Input fields increment limitation
                var addButton = $('.add_a_button2'); //Add button selector
                var wrapper = $('.addtags2'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="text" name="artmaterials[]" style="width: 50%;"><br>'; //New input field html 
                            var x = 1; //Initial field counter is 1
                            $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                    x++; //Increment field counter
                            $(wrapper).append(fieldHTML); // Add field html  
    }
        });
    $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                        e.preventDefault();
                        $(this).parent('form-group').remove(); //Remove field html
                        x--; //Decrement field counter
                    });

                });


<!--ADD STYLE-->
        $(document).ready(function () {

        var maxField = 6; //Input fields increment limitation
                var addButton = $('.add_a_button3'); //Add button selector
                var wrapper = $('.addtags3'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="text" name="artstyles[]" style="width: 50%;"><br>'; //New input field html 
                            var x = 1; //Initial field counter is 1
                            $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                    x++; //Increment field counter
                            $(wrapper).append(fieldHTML); // Add field html  
    }
        });
    $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                        e.preventDefault();
                        $(this).parent('form-group').remove(); //Remove field html
                        x--; //Decrement field counter
                    });

                });
                
<!--ADD KEYWORD-->
        $(document).ready(function () {

        var maxField = 6; //Input fields increment limitation
                var addButton = $('.add_a_button4'); //Add button selector
                var wrapper = $('.addtags4'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="text" name="artkeywords[]" style="width: 50%;"><br>'; //New input field html 
                            var x = 1; //Initial field counter is 1
                            $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                    x++; //Increment field counter
                            $(wrapper).append(fieldHTML); // Add field html  
    }
        });
    $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                        e.preventDefault();
                        $(this).parent('form-group').remove(); //Remove field html
                        x--; //Decrement field counter
                    });

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
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="50" style="background-color:#755588">
                            <span class="skill"><i class="val">50%</i></span>
                        </div>
                    </div>
                </center>
                <hr>
                <div>
                    <center>
                        <h2>Mediums , Materials & Styles</h2>
                        <p>Tell us more about your artwork</p>
                    </center>
                </div>            
                <br/>
                <div>
                    <center>
                        <h4>Select 1-5 Mediums</h4>
                        <div class="addtags">
                            <div class="wrap-input100">
                                <div>
                                    <a href="javascript:void(0);" class="add_a_button btn login100-form-btn" title="Add field" style="width: 10em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add One</span></a>
                                </div>
                            </div>                           
                        </div>
                    </center>
                </div>
                <br/>
                <div>
                    <center>
                        <h4>Select 1-5 Materials</h4>
                        <div class="addtags2">
                            <div class="wrap-input100">
                                <div>
                                    <a href="javascript:void(0);" class="add_a_button2 btn login100-form-btn" title="Add field" style="width: 10em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add One</span></a>
                                </div>
                            </div>                           
                        </div>
                    </center>
                </div>
                <br/>
                <div>
                    <center>
                        <h4>Select 1-5 Styles</h4>
                        <div class="addtags3">
                            <div class="wrap-input100">
                                <div>
                                    <a href="javascript:void(0);" class="add_a_button3 btn login100-form-btn" title="Add field" style="width: 10em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add One</span></a>
                                </div>
                            </div>                           
                        </div>
                    </center>
                </div>
                <hr>
                <div>
                    <center>
                        <h2>Keywords</h2>
                        <p>Tagging your artwork with keywords allow collectors find your artwork easily.</p>
                    </center>
                </div>
                <br/>
                <div>
                    <center>
                        <h4>Select 1-5 Keywords</h4>
                        <div class="addtags4">
                            <div class="wrap-input100">
                                <div>
                                    <a href="javascript:void(0);" class="add_a_button4 btn login100-form-btn" title="Add field" style="width: 10em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add One</span></a>
                                </div>
                            </div>                           
                        </div>
                    </center>
                </div>

                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-3.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>
            <?php
            if(isset($_POST['btn_next'])){
                if(!empty($_POST['artmediums'])){
                    if(!empty($_POST['artmaterials'])){
                        if(!empty($_POST['artstyles'])){
                            if(!empty($_POST['artkeywords'])){
                                $_SESSION['artmediums'] = implode(",", $_POST['artmediums']);
                                $_SESSION['artmaterials'] = implode(",", $_POST['artmaterials']);
                                $_SESSION['artstyles'] = implode(",", $_POST['artstyles']);
                                $_SESSION['artkeywords'] = implode(",", $_POST['artkeywords']);

                                header("Location: artist_uploadarts-5.php");
//                                echo $_SESSION['artmediums'];
//                                echo "<br>".$_SESSION['artmaterials'];
//                                echo "<br>".$_SESSION['artstyles'];
//                                echo "<br>".$_SESSION['artkeywords'];
                            } else {
                                echo "<script>swal('Opps.!', 'Please Add Minimum One Keyword .!', 'error');</script>";
                            }
                        } else {
                            echo "<script>swal('Opps.!', 'Please Add Minimum One Style .!', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Please Add Minimum One Material .!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Please Add Minimum One Medium .!', 'error');</script>";
                }
            }
            
            ob_flush();
            ?>
        </form>
    </body>
</html>
