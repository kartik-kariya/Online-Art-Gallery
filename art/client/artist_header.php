<?php
ob_start();
if(session_id() == '') {
    session_start();
}
?>
<div id="page_wrapper">
    <!-- Responsive menu start -->
    <form method="post" style="margin: 0px; padding: 0px;">
    <ul class="cg__resMenu">
        <li class="cg__resMenu-back">
            <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="visitor_home.php" class="cg__resMenu-backLink">Back</a>
        </li>
        <li><a class="active" href="artist_home.php"><span>Home</span></a></li>
        <li><a href="artist_artsgallery.php"><span>Gallery</span></a>
        <li><a href="artist_shop.php"><span>Shop</span></a></li>
        <!--<li><a href=""><span>Auction</span></a></li>-->
        <li><a href= "artist_orders-orders.php"><span>Orders</span></a></li>
        <li><a href= "artist_uploadarts.php"><span>Upload Arts</span></a></li>
        <li><a href= "artist_praofile-profile_image.php"><span><?php echo $_SESSION['signin_username']?></span></a></li>        
        <li><a href="session_destroy.php"><span>Sign Out</span></a></li>
    </ul>
    </form>
    <!-- Responsive menu end -->
    <form method="post" style="margin: 0px; padding: 0px;">
    <header id="header" class="site-header site-header--absolute" style="padding-bottom:0%; ">
        <div class="container siteheader-container large-container">
            <div class="fxb-col fxb-basis-auto">
                <div class="fxb-row site-header-row site-header-main ">
                    <!-- Logo column -->
                    <div class="fxb-col fxb fxb-start-x fxb-center-y fxb-basis-auto fxb-grow-0 fxb-sm-half ">
                        <div id="logo-container" class="logo-container">
                            <h1 class="site-logo logo " id="logo">
                                <a href="artist_home.php" class="site-logo-anch">
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
                                        <a href="artist_home.php" class="cg__menuBurger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div><!--/.cg__mainMenu-trigger-->

                                    <ul class="cg__mainMenu clearfix">

                                        <li><a class="active" href="artist_home.php"><span>Home</span></a></li>
                                        <li><a href="artist_artsgallery.php"><span>Gallery</span></a>
                                        <li><a href="artist_shop.php"><span>Shop</span></a></li>
                                        <!--<li><a href=""><span>Auction</span></a></li>-->
                                        <li><a href= "artist_orders-orders.php"><span>Orders</span></a></li>
                                        <li><a href= "artist_uploadarts.php"><span>Upload Arts</span></a></li>
                                        <li><a href= "artist_profile-profile_image.php"><span><?php echo $_SESSION['signin_username']?></span></a></li>                                        
                                        <li><a href="session_destroy.php"><span>Sign Out</span></a></li>
                                    </ul><!--/.cg__mainMenu-->
                                </div><!--/.cg__menuWrapper-->                                    
                            </div>                            
                        </div>
                    </div><!--end right column-->
                </div><!--end flex row-->
            </div>
        </div>      
    </header>
</form>
<?php
if(isset($_POST['signout'])){
    include './session_destroy.php';
}

ob_flush();
?>