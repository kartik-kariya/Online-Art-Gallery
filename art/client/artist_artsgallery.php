<?php
session_start();
$uname = $_SESSION['signin_username'];

if(!empty($uname)) {
    
} else{
    header("Location: signin.php");
}
?>
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
        <title>Arts Gallery</title>
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

        <!-- Main gallery stylesheet -->    
        <link href="css/gallerycss/gallerykube.css" rel="stylesheet" type="text/css"/>
        <link href="css/gallerycss/gallerystyle.css" rel="stylesheet" type="text/css"/>
        <link href="css/gallerycss/galleryswipebox.css" rel="stylesheet" type="text/css"/>

        <style>
            a{
                cursor: pointer;
                font-size: 15px;
                font-weight: bold; 
            }
        </style>
    </head>

    <body>
        <?php
        include('./artist_header.php');
        ?>
        <!--titleblock section-->
        <section class="photobooth_grid_gallery photobooth_masonry_gallery" style="margin-top: 8em; margin-bottom: 2%;">
            <hr>
            <div class="row">
                <div class="col col-12   photobooth_content">
                    <h1 style="font-size:70px; font-family: serif; color: #542c6b; font-weight: bold;">Gallery</h1>
                    <hr>
                    <div class="photobooth_masonry_gallery_element">
                        <div class="photobooth_isotope">
                            <div class="grid1">
                                <?php
                                include_once '../connection.php';
                                $q = "select * from tbl_artsgallery where status='active'";
                                $result = mysqli_query($connection, $q);

                                while ($r = mysqli_fetch_assoc($result)) {
                                    //echo $r['file'] . "<br>";
                                    ?>

                                    <div class="grid-item grid-item--width2">
                                        <?php echo"<a href='{$r['file']}'  class='swipebox'  >" ?>
                                        <div class="photobooth_grayscale_img">	
                                            <?php echo "<img src='{$r['file']}'  alt title='portfolio1' >" ?>
                                        </div>
                                        <?php echo "</a>" ?>				
                                    </div>
                                <?php } ?>
                            </div>
                        </div>	

                        <a class="grid_load_more photobooth_load_more photobooth_button" href="javascript:void(0)">Load More</a>
                    </div>

                </div> 
            </div>

        </section>

        <?php
        include('footer.php');
        ?>

    <script src="js/gallery/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script>
    <script src="js/gallery/isotope.pkgd.min.js" type="text/javascript"></script>   
    <script src="http://pixel-mafia.com/demo/html-templates/photobooth/js/jquery.swipebox.js"></script> 	
    <script src="js/gallery/swipebox.js" type="text/javascript"></script>
    <script src="js/gallery/index.js" type="text/javascript"></script>

</body>
</html>
