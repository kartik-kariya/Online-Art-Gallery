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
        <title>Artist Profile</title>
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


        <!-- REVOLUTION JS FILES -->
        <script src="addons/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="addons/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <style>
            .hr{
                border:solid black 2px;
            }
        </style>
    </head>

    <body>
        <div id="page_wrapper">
            <!-- Responsive menu start -->

            <ul class="cg__resMenu">
                <li class="cg__resMenu-back">
                    <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="index.php#" class="cg__resMenu-backLink">Back</a>

                <li><a href="visitor_artists.php"><span>Back</span></a></li>
            </ul>

            <!-- Responsive menu end -->

            <header id="header" class="site-header site-header--absolute">
                <div class="container siteheader-container large-container">
                    <div class="fxb-col fxb-basis-auto">
                        <div class="fxb-row site-header-row site-header-main ">
                            <!-- Logo column -->
                            <div class="fxb-col fxb fxb-start-x fxb-center-y fxb-basis-auto fxb-grow-0 fxb-sm-half ">
                                <div id="logo-container" class="logo-container">
                                    <h1 class="site-logo logo " id="logo">
                                        <a href="" class="site-logo-anch">
                                                <!-- <img class="logo-img site-logo-img" src="img-assets/logo.png" width="40" height="40" alt="Agency" title="Agency"> -->
                                        </a>
                                    </h1>
                                </div>
                            </div>
                            <!-- Right column with navigation -->
                            <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-col-right site-header-main-right">
                                <div class="fxb-col fxb fxb-end-x fxb-center-y fxb-basis-auto fxb-sm-half site-header-main-right-top">

                                    <!-- menu trigger -->
                                    <div class="sh-component menu-wrapper">

                                        <div class="cg__menuWrapper">
                                            <div class="cg__mainMenu-trigger">
                                                <a href="" class="cg__menuBurger">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                            </div><!--/.cg__mainMenu-trigger-->

                                            <ul class="cg__mainMenu clearfix">
                                                <li><a href="visitor_artists.php"><span>Back</span></a></li>

                                            </ul><!--/.cg__mainMenu-->  

                                        </div><!--/.cg__menuWrapper-->

                                    </div>

                                </div>
                            </div><!--end right column-->
                        </div><!--end flex row-->
                    </div>
                </div>
            </header>
            <div class="sh-component menu-wrapper">



            </div>
            <div class="ag-subheader">

                <div class="media-wrapper">
                    <div class="media-container media-header">
                        <div class="container-overlay">
                            <div class="bg-source bg-source--image" style="background-image: url('./arts_files/Cover_Photos/ArtistProfile.jpg');background-size: cover">
                            </div>
                            <div class="bg-source img-overlay">
                            </div>
                        </div>


                        <?php
                        include_once '../connection.php';
                        if (isset($_GET['profile'])) {
                            $q = "select * from tbl_artists where artist_id= '" . $_GET['profile'] ."'";
                        }
                        $result = mysqli_query($connection, $q);

                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <div class="media-container-title txt-center">
                                <center>
                                    <?php echo"<img class ='img-circle'  src='{$r['profile_image']}'  style='height: 300px;width: 300px;' >" ?>
                                    <?php echo "<h2 class='txt-grey-transparent'>{$r['fname']}" . " " . "{$r['lname']}</h2>" ?>
                                    <h3 class="txt-grey-transparent">ARTIST
                                    </h3>
                                </center>
                            </div>
                        </div>
                    </div>


                    <div class="ag-mask">
                        <div class="skew-mask">
                        </div>
                    </div>
                </div><!--end subheader-->


                <div class="ag-mask">
                    <div class="skew-mask">
                    </div>
                </div>
            </div><!--end subheader-->
            <!--titleblock section-->
            <section class="sidermargins pb-100 pt-80">
                <br/>
                <br/>
                <div>
                <?php } ?>
                <center>
                    <section class="sidermargins pb-160 sec-portfolio"   style="margin-top: 50px">
                        <hr>
                        <h2>My PortFolio</h2>
                        <hr>
                    </section>

                    <section style="pointer-events: none;margin: 0;">           
                        <div class="container large-container large-container_grid">
                            <div class="row">
                                <div class="grid ag-gridGallery-jstrigger " data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                                    <?php
                                    $q = "select * from tbl_artsgallery";
                                    $result = mysqli_query($connection, $q);

                                    while ($r = mysqli_fetch_assoc($result)) {
                                        ?>

                                        <div class="row">
                                            <div class="grid-item grid-item--width2 gallery-item">
                                                <div class="grid-item-wrapper">
                                                    <?php echo"<a class='portfolio-link'  href='{$r['file']}'></a>" ?>
                                                    <div class="ag-gridGallery__img-container">
                                                        <?php echo "<img src='{$r['file']}'" ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    </section> 
                                </div>
                                </center>
                            </div>
                        </div>
                        <section>
                            <center>
                                <?php
                                $q = "select * from tbl_artist where Id=$_GET[profile]";

                                $result = mysqli_query($connection, $q);

                                while ($r = mysqli_fetch_assoc($result)) {
                                    echo"<img class ='img-circle'  src='{$r['Qr']}.png'  style='height: 200px;width: 200px;' >";
                                }
                                ?>
                            </center>
                        </section>
                    </section>
                    <?php
                    include('footer.php');
                    ?>
                    <a href="about.php" class="totop">TOP</a> <!--/.totop -->
                    </body>
                    `</html>
