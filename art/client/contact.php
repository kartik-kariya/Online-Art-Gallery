<?php
ob_start();
session_start();
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
        <!--Start of Zendesk Chat Script-->
        <script type="text/javascript">
            window.$zopim || (function (d, s) {
                var z = $zopim = function (c) {
                    z._.push(c)
                }, $ = z.s =
                        d.createElement(s), e = d.getElementsByTagName(s)[0];
                z.set = function (o) {
                    z.set.
                            _.push(o)
                };
                z._ = [];
                z.set._ = [];
                $.async = !0;
                $.setAttribute("charset", "utf-8");
                $.src = "https://v2.zopim.com/?5aX5okNHljtICYNQrzS111YkOf8aNv4I";
                z.t = +new Date;
                $.
                        type = "text/javascript";
                e.parentNode.insertBefore($, e)
            })(document, "script");
        </script>
        <!--End of Zendesk Chat Script-->

        <meta charset="UTF-8">
        <title>Contact Us</title>
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

        <script src="js/sweetalert.min.js" type="text/javascript"></script>
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
        <section class="sidermargins pb-100 pt-80" style="margin-top: 1%;">
            <hr/>
            <center><h1 style="font-size:80px; font-family: serif; color: #542c6b;">Contact Us</h1></center>
            <hr/>

            <div class="container large-container" style="margin-top: 5%;">
                <div class="row">
                    <div class="col-md-2 col-sm-12 wow slideInLeft" >
                    </div>

                    <div class="col-md-4 col-sm-12 wow slideInLeft">
                        <div class="column-wrapper">
                            <div class="media-container media-container--contact fancy-background">
                                <div class="title-wrapper ">
                                    <div class="title-block title-block--contact">
                                        <h3 class="title-block__subtitle txt-grey-transparent">Member</h3>
                                        <p class="title-block__title txt-light">Kartik Kariya<br>201506100110065<br><a href="../cdn-cgi/l/email-protection.html" class="title-block__title txt-light" >f201506100110065@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12 wow slideInLeft" >
                        <div class="column-wrapper">
                            <div class="media-container media-container--contact fancy-background">
                                <div class="title-wrapper ">
                                    <div class="title-block title-block--contact">
                                        <h3 class="title-block__subtitle txt-grey-transparent">Member</h3>
                                        <p class="title-block__title txt-light">Karan Jariwala<br>201506100110070<br><a href="../cdn-cgi/l/email-protection.html" class="title-block__title txt-light" >f201506100110070@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-12 wow slideInLeft" >
                    </div>

                </div>
            </div>
            <br/>
            <hr/>

            <!--google maps-->
            <div class="container custom_width custom_width-contact ">
                <div class="row gutter-0">
                    <div class="col-md-6 col-sm-6 pd-no">
                        <div class="media-container media-container--contactimg">
                            <iframe src="https://snazzymaps.com/embed/51645" width="100%" height="400px" style="border:none;"></iframe>
                        </div>

                    </div>	
                    <div class="col-md-6 col-sm-6 pd-no" style="padding-left:15px;">
                        <div class="media-container media-container--contactimg">
                            <form method="post">
                                <div class="form-group wow slideInLeft">
                                    <input type="text" name="name" id="text_field" class="ag-form-input form-control"
                                           placeholder="Your Name"/>
                                    <!--<label for="text_field">Text Field</label>-->
                                </div>
                                <div class="form-group wow slideInRight">
                                    <input type="email" id="email" name="email" class="ag-form-input form-control" 
                                           placeholder="Email"/>
                                    <!--<label for="text_area">Text Area:</label>-->
                                </div>
                                <div class="form-group wow slideInLeft">
                                    <textarea id="text_area" name="message" class="ag-form-input form-control fancy-textarea"
                                              col="40" rows="6" placeholder="Share your idea"></textarea>
                                    <!--<label for="text_area">Text Area:</label>-->
                                </div>
                                <div class="form-group txt-center wow jello">
                                    <button type="submit" name="btn_submit" class="ag_btn btn btn-lined lined-dark btn--square hg-submitcontact">Send Message</button>
                                </div>

                                <?php
                                if (isset($_POST['btn_submit'])) {
                                    echo "<script>swal('Good Job.!', 'Your Message Sent.!', 'success');</script>";
                                    if (!empty($_POST['name'])) {
                                        if (!empty($_POST['email'])) {
                                            if ($_POST['message']) {
                                                $name = $email = $message = "";

                                                date_default_timezone_set("Asia/Kolkata");
                                                $date = $time = "";
                                                $date = date('d-m-Y');

                                                $name = $_POST['name'];
                                                $email = $_POST['email'];
                                                $message = $_POST['message'];
                                                
                                                $q = "INSERT INTO tbl_contact values ('' , '$name' , '$email' , '$message' , 0 , '$date')";
                                                if(mysqli_query($connection, $q)) {
                                                    echo "<script>swal('Good Job.!', 'Your Message Sent.!', 'success');</script>";
                                                } else {
                                                    echo "<script>swal('Opps.!', 'Something Went Wrong , Try Again .!', 'error');</script>";
                                                }
                                            } else {
                                                echo "<script>swal('Opps.!', 'Please Enter Message .!', 'error');</script>";
                                            }
                                        } else {
                                            echo "<script>swal('Opps.!', 'Please Enter Your Email-Id .!', 'error');</script>";
                                        }
                                    } else {
                                        echo "<script>swal('Opps.!', 'Please Enter Your Name .!', 'error');</script>";
                                    }
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end google maps-->
        </section>

        <?php
        include('./footer.php');
        ob_flush();
        ?>

    </body>
</html>
