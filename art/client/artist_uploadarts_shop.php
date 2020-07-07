<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../connection.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Upload Arts</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <style>
            label{
                font-family: serif;
                font-size: 25px;
            }
        </style>
        <script>
            $(document).ready(function () {
                var maxField = 4; //Input fields increment limitation
                var addButton = $('.add_a_button'); //Add button selector
                var wrapper = $('.addtags'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="file" name="artextraimages[]" style="width: 50%;"><br>'; //New input field html 
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
    </head>
    <body>
        <?php
        include('./artist_header.php');
        include_once '../connection.php';
        ?>
        <div style="margin-top: 7.5em;">
            <hr>
            <center>
                <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Shop Details</h1> 
            </center>
            <hr>
            <div>
                <center>
                    <form method='post'>
                        <hr>

                        <label>Enter Price</label>
                        <div class="wrap-input100">
                            <input class="input100" type="number" name="artprice" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%; "></span>
                        </div>

                        <hr>

                        <label>Extra Images</label>
                        <div class="addtags">
                            <div class="wrap-input100">
                                <div>
                                    <a href="javascript:void(0);" class="add_a_button btn login100-form-btn" title="Add field" style="width: 11em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add Images</span></a>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <hr>
                        <div class="container-login100-form-btn">
                            <input type="submit" name="btn_submit" class="login100-form-btn"  value="Submit" style="width: 12em"/>
                        </div>
                        <hr>
                        <hr>
                    </form>
                </center>
            </div>
            <?php
            if (isset($_POST['btn_submit'])) {
                if (!empty($_POST['artprice'])) {
                    $q = "select max(art_id) from tbl_arts";
                    $res = mysqli_query($connection, $q);
                    while ($r = mysqli_fetch_row($res)) {
                        $id = $r[0];
                    }
                    
                    $artprice = $_POST['artprice'];
                    
                    if(!empty($_POST['artextraimages'])) {
                        $artextraimages = implode("'&&'", $_POST['artextraimages']);
                    } else{
                        $artextraimages = "";
                    }
                    
                        $insert = $connection->prepare("INSERT INTO tbl_shop(price , extra_images , art_id) VALUES(?,?,?)");
                        $insert->bind_param("ssi", $artprice, $artextraimages, $id);
                        $insert->execute();
                    
                    
                } else {
                    echo "<script>alert('Please Enter Price...')</script>";
                }
            }
            ?>
    </body>
</html>
