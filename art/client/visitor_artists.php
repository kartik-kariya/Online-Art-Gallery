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
        <title>Artists Team</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- team stylesheet -->
        <link href="css/gallerycss/photographerteambox.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('.search-box input[type="text"]').on("keyup input", function () {
                    /* Get input value on change */
                    var inputVal = $(this).val();
                    var resultDropdown = $(this).siblings(".result");
                    if (inputVal.length) {
                        $.get("backend-search.php", {term: inputVal}).done(function (data) {
                            // Display the returned data in browser
                            resultDropdown.html(data);
                        });
                    } else {
                        resultDropdown.empty();
                    }
                });

                // Set search input value on click of result item
                $(document).on("click", ".result p", function () {
                    $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
                    $(this).parent(".result").empty();
                });
            });

            //Scroll;

            $(document).ready(function () {
                $("#click").click(function () {
                    $("#sug").show(1000);
                    $('html, body').animate({
                        scrollTop: $("#sug").offset().top
                    }, 1000);

                });
            });
        </script>
        <style>
            /* Formatting search box */
            .search-box{
                width:100%;
                position: relative;
                display: inline-block;
                outline: none;
                border:none;
                background: #fff;
                color: #999;
                padding:6.5px 10px;
                font-size: 15px;
                float: left;
            }
            .search-box input[type="text"]{
                width:100%;
                padding: 18px 13px;
                font-size: 20px;
                transition: 1s;
                border: 2px solid #fff;
            }

            .search-box input[type=text]:focus {
                border-left: 3px solid #000;
                transition: 1s;
            }
            .input-group-btn input[type="submit"]{
                background: #542c6b;;
                transition: 1s;
                padding: 15px 30px;
                border: none;
            }
            .input-group-btn input[type="submit"]:hover{
                background: #565656;
                transition: 1s;
            }
            .result{
                position: absolute;        
                z-index: 999;
                top: 100%;
                left: 0;

            }
            .result{
                width: 100%;
                box-sizing: border-box;
            }
            /* Formatting result items */
            .result p{
                background: #fff;
                margin: 0;
                border-top:2px solid #DD443F; 
                padding: 7px 10px;  
                cursor: pointer;
            }
            .result p:hover{
                background: #f2f2f2;
            }
            .agileits_search form{
                border: none;
            }

            /* FontAwesome for working BootSnippet :> */

            @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            #team {
                background: #fff !important;
            }

            .btn-primary:hover,
            .btn-primary:focus {
                background-color: #108d6f;
                border-color: #108d6f;
                box-shadow: none;
                outline: none;
            }

            .btn-primary {
                color: #fff;
                background-color: #007b5e;
                border-color: #007b5e;
            }

            section {
                padding: 0px 0;
            }

            #team .card {
                border: solid 2px;
                background: #222;
                padding: 30px;
            }

            .image-flip:hover .backside,
            .image-flip.hover .backside {
                -webkit-transform: rotateY(0deg);
                -moz-transform: rotateY(0deg);
                -o-transform: rotateY(0deg);
                -ms-transform: rotateY(0deg);
                transform: rotateY(0deg);
                border-radius: .25rem;
            }

            .image-flip:hover .frontside,
            .image-flip.hover .frontside {
                -webkit-transform: rotateY(180deg);
                -moz-transform: rotateY(180deg);
                -o-transform: rotateY(180deg);
                transform: rotateY(180deg);
            }

            .mainflip {
                -webkit-transition: 1s;
                -webkit-transform-style: preserve-3d;
                -ms-transition: 1s;
                -moz-transition: 1s;
                -moz-transform: perspective(1000px);
                -moz-transform-style: preserve-3d;
                -ms-transform-style: preserve-3d;
                transition: 1s;
                transform-style: preserve-3d;
                position: relative;
            }

            .frontside {
                position: relative;
                -webkit-transform: rotateY(0deg);
                -ms-transform: rotateY(0deg);
                z-index: 2;
                margin-bottom: 30px;
            }

            .backside {
                position: absolute;
                top: 0;
                left: 0;
                background: white;
                -webkit-transform: rotateY(-180deg);
                -moz-transform: rotateY(-180deg);
                -o-transform: rotateY(-180deg);
                -ms-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
                -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
                -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
                box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
            }

            .frontside,
            .backside {
                -webkit-backface-visibility: hidden;
                -moz-backface-visibility: hidden;
                -ms-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-transition: 1s;
                -webkit-transform-style: preserve-3d;
                -moz-transition: 1s;
                -moz-transform-style: preserve-3d;
                -o-transition: 1s;
                -o-transform-style: preserve-3d;
                -ms-transition: 1s;
                -ms-transform-style: preserve-3d;
                transition: 1s;
                transform-style: preserve-3d;
            }

            .frontside .card,
            .backside .card {
                min-height: 400px;
                min-width: 300px;
            }

            .backside .card a {
                font-size: 25px;
                color: #007b5e !important;
            }

            .frontside .card .card-title,
            .backside .card .card-title {
                color: #007b5e !important;
            }

            .frontside .card .card-body img {
                width: 250px;
                height: 250px;
                border-radius: 50%;
            }            
        </style>
    </head>

    <body>
        <?php
        include('./visitor_header.php');
        ?>
        <!--titleblock section-->
        <section  class="sidermargins pb-100 pt-80" style="margin: 0; margin-top:1em; margin-bottom: 0; padding-bottom: 0;">
            <hr>
            <form method="post">
                <div class="row">
                    <div class="col col-12">
                        <center>
                            <h1 style="font-size:60px; color: #542c6b; font-family: serif;">Artists</h1> 
                            <hr/>
                            <div class="wrap-input100">
                                <input class="input100" ID="myInput" type="text" placeholder="Search..." style="width: 50%;">
                                <span class="focus-input100" style="width: 50%; margin-left: 25%;"></span>
                            </div>
                        </center>
                        <hr>
                    </div>
                </div>
                <!--                <div class="container">
                                    <div class="form-group" style="margin: 0;">
                                        <div class="input-group">
                                            <div class="search-box " >
                                                <input class="form-control" name="fname" type="text" id="search" placeholder="Search Here..." style="height:15%;border:solid black 2px;" />
                                                <div class="result"></div>
                                            </div>
                                            <span class="input-group-btn">
                                                <input type="submit"   value="Search" class="btn btn-primary btn-lg" name="submit" value="Search"  style="height: 15%;font-size: 17px;"> 
                                            </span>
                                        </div>
                                    </div>
                                     End of Search Form 
                                </div>-->
                <br />
            </form>
            <!-- Team list -->

            <?php
            include '../connection.php';
            if (empty($_POST['fname'])) {
                $q = "select * from tbl_artist where artist_verification='approved' and artist_status='active'";
            }
            if (isset($_POST['submit'])) {
                if (empty($_POST['fname'])) {
                    $q = "select * from tbl_artist where artist_verification='approved' and artist_status='active'";
                } else {
                    $q = "select * from tbl_artist where artist_firstname='" . $_POST['fname'] . "' "
                            . "and artist_verification='approved' and artist_status='active'";
                }
            }
            $result = mysqli_query($connection, $q);
            ?>
            <!--            <div class="container" >
                            <div class="row">
            <?php
            //while ($r = mysqli_fetch_assoc($result)) {
            ?>
                                            <div class="section-team-holder-block col-xs-4 col-sm-4 col-md-4 col-lg-4"  style="padding: 15px;">
                                                <div class="section-team-list">
                                                    <ul class="list-unstyled clearfix">
                                                        <li class="team-list-item">
                                                            <a href="visitor_home.php">
            <?php //echo"<img class='img-responsive'  src='{$r['profile_image']}'  alt='{$r['profile_image']}'  style='max-width:430px;max-height:540px;width:100%;height:100%;background-size: center; min-height: 222px; min-weight: 177px'>" ?>
                                                            </a>
                                                            <div class="member-list-caption">
                                                                <div class="member-name" >
            <?php
            //echo"<h2> <a style='color:white'> {$r['fname']} {$r['lname']}</a></h2>"
            ?>
                                                                </div>
                    
                                                                <div class="member-position">
                                                                    Artist
                                                                </div>
                                                                <div class="member-position">
                    
                                                                </div>
                    
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> 
            <?php //} ?>
                            </div>
                        </div>-->


        </section>
        <form method="post">
            <section id="team" class="pb-5">
                <div class="container">
                    <div class="row">
                        <!-- Team member -->
                        <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                            <div id="myDiv">  
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="image-flip" ontouchstart="this.classList.toggle('hover');">
                                        <div class="mainflip">
                                            <div class="frontside">
                                                <div class="card" >
                                                    <div class="card-body text-center">
                                                        <p><img class="img-fluid" src="<?php echo $r['artist_profileimage'] ?>" alt="<?php $r['profile_image'] ?>"></p>
                                                        <h4 class="card-title"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></h4>
                                                        <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-arrows"></i></a>                                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="backside">
                                                <div class="card">
                                                    <div class="card-body text-center mt-4">
                                                        <h4 class="card-title" style="padding-top: 30%;"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></h4>
                                                        <p class="card-title">ARTIST</p>
                                                        <a href="<?php echo "http://".$r['artist_website'] ?>"><?php echo $r['artist_website'] ?></a>
                                                        <br/>
                                                        <a href='visitor_artist-profile.php?profile=<?php echo $r['artist_id'] ?>' class="btn btn-xs"><i class="fa fa-arrow-right"></i></a>                                                
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php echo "http://".$r['artist_facebook']?>">
                                                                    <i class="fa fa-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php echo "http://".$r['artist_twitter']?>">
                                                                    <i class="fa fa-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php echo "http://".$r['artist_instagram']?>">
                                                                    <i class="fa fa-instagram"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon text-xs-center" target="_blank" href="<?php echo "http://".$r['artist_googleplus']?>">
                                                                    <i class="fa fa-google"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- ./Team member -->
                    </div>
                </div>
            </section>

            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#myDiv div").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>

        </form>
        <!-- Team -->        
        <?php
        include('footer.php');
        ?>

    </body>
</html>
