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
        <meta charset="UTF-8">
        <title></title>
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
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="90" style="background-color:#755588">
                            <span class="skill"><i class="val">90%</i></span>
                        </div>
                    </div>
                </center>
                <hr>
                <div>
                    <center>
                        <h2>Shipping Address</h2>
                        <p>Tell us where your artwork will be picked up</p>
                        <br/>
                        <label>Zipcode</label>
                        <div class="wrap-input100">
                            <input type="number" min="1" minlength="6" maxlength="6" name="zipcode" class="input100" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>
                        <label>Street Adress</label>
                        <div class="wrap-input100">
                            <input type="text" name="streetaddress" class="input100" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>
                        <label>City</label>
                        <?php
                        $q = "select * from tbl_city where city_status='active' order by city_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none; width: 50%;" name="city">
                                <option class="input100" value="selected">--Select City--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['city_name'] . ">";
                                    echo $row['city_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>
                        <label>State</label>
                        <?php
                        $q = "select * from tbl_state order by state_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none; width: 50%;" name="state">
                                <option class="input100" value="selected">--Select State--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['state_name'] . ">";
                                    echo $row['state_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                        <hr>
                        <label>Country</label>
                        <?php
                        $q = "select * from tbl_country order by country_name";
                        ?>
                        <div class="wrap-input100" >
                            <select class="input100" style="outline:none; width: 50%;" name="country">
                                <option class="input100" value="selected">--Select Ccuntry--</option>
                                <?php
                                foreach ($connection->query($q) as $row) {
                                    echo "<option class='input100' value=" . $row['country_name'] . ">";
                                    echo $row['country_name'];
                                    echo "</option>";
                                }
                                ?>
                            </select>
                            <span class="focus-input100" style="width: 50%; margin-left:25%;"></span>
                        </div>
                    </center>
                </div>
                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts-6.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>
            <?php
            if (isset($_POST['btn_next'])) {
                if (empty($_POST['streetaddress']) && empty($_POST['city']) && empty($_POST['state']) && empty($_POST['country'])) {
                    echo "<script>swal('Opps.!', 'Empty Fields Are Not Allowed.!', 'error');</script>";
                } else if (!empty($_POST['zipcode'])) {
                    if (!empty($_POST['streetaddress'])) {
                        if ($_POST['city'] != 'selected') {
                            if ($_POST['state'] != 'selected') {
                                if ($_POST['country'] != 'selected') {
                                    $_SESSION['zipcode'] = $_POST['zipcode'];
                                    $_SESSION['streetaddress'] = ucwords($_POST['streetaddress']);
                                    $_SESSION['city'] = ucwords($_POST['city']);
                                    $_SESSION['state'] = ucwords($_POST['state']);
                                    $_SESSION['country'] = ucwords($_POST['country']);

                                    header("Location: artist_uploadarts-8.php");
                                } else {
                                    echo "<script>swal('Opps.!', 'Please Enter Country', 'error');</script>";
                                }
                            } else {
                                echo "<script>swal('Opps.!', 'Please Enter State', 'error');</script>";
                            }
                        } else {
                            echo "<script>swal('Opps.!', 'Please Enter City', 'error');</script>";
                        }
                    } else {
                        echo "<script>swal('Opps.!', 'Please Enter Street Address.!', 'error');</script>";
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Please Enter Zipcode.!', 'error');</script>";
                }
            }
            ?>
        </form>
    </body>
</html>
