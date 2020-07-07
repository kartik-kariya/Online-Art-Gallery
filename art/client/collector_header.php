<?php
ob_start();
include '../connection.php';
if(session_id() == '') {
    session_start();
}
//echo $_SESSION['username'];
$customer_id = $no = "";
$q = mysqli_query($connection, "select customer_id from tbl_customer where customer_username ='" . $_SESSION['signin_username'] . "'");
while ($r = mysqli_fetch_assoc($q)) {
    $customer_id = $r['customer_id'];
}

$cart = mysqli_query($connection, "select count(*) from tbl_cart where customer_id=$customer_id and cart_status=0");
while ($r = mysqli_fetch_row($cart)) {
    $no = $r[0];
}
//echo $no . $customer_id;
?>
<style>
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
</style>

<div id="page_wrapper">
    <!-- Responsive menu start -->

    <ul class="cg__resMenu">
        <li class="cg__resMenu-back">
            <span class="cg__resMenu-backIcon glyphicon glyphicon-chevron-left"></span><a href="visitor_home.php" class="cg__resMenu-backLink">Back</a>
        </li>
        <li><a class="active" href="collector_home.php"><span>Home</span></a></li>
        <li><a href="collector_artsgallery.php"><span>Gallery</span></a>
        <li><a href="collector_artists.php"><span>Artists</span></a>
        <li><a href="collector_shop.php"><span>Shop</span></a></li>
        <li><a href="collector_orders.php"><span>Orders</span></a></li>
        <li><a href= "collector_profile-account_info.php"><span><?php echo $_SESSION['signin_username']?></span></a></li>
        <!--<li><a href=""><span>Auction</span></a></li>-->
        <li><a href="session_destroy.php"><span>Sign Out</span></a></li>
        <li><a href="collector_cart.php">Cart <i class="ion-android-cart"><?php echo "( ".$no." )"?></i></a></li>
    </ul>
    <!-- Responsive menu end -->

    <header id="header" class="site-header site-header--absolute" style="padding-bottom:0%; ">
        <div class="container siteheader-container large-container">
            <div class="fxb-col fxb-basis-auto">
                <div class="fxb-row site-header-row site-header-main ">
                    <!-- Logo column -->
                    <div class="fxb-col fxb fxb-start-x fxb-center-y fxb-basis-auto fxb-grow-0 fxb-sm-half ">
                        <div id="logo-container" class="logo-container">
                            <h1 class="site-logo logo " id="logo">
                                <a href="collector_home.php" class="site-logo-anch">
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
                                        <a href="collector_home.php" class="cg__menuBurger">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div><!--/.cg__mainMenu-trigger-->

                                    <ul class="cg__mainMenu clearfix">

                                        <li><a class="active" href="collector_home.php"><span>Home</span></a></li>
                                        <li><a href="collector_artsgallery.php"><span>Gallery</span></a>
                                        <li><a href="collector_artists.php"><span>Artists</span></a>
                                        <li><a href="collector_shop.php"><span>Shop</span></a></li>
                                        <li><a href="collector_orders.php"><span>Orders</span></a></li>
                                        <li><a href= "collector_profile-account_info.php"><span><?php echo $_SESSION['signin_username']?></span></a></li>
                                        <!--<li><a href=""><span>Auction</span></a></li>-->
                                        <li><a href="session_destroy.php" name="link_signin"><span>Sign Out</span></a></li>
                                        <li><a href="collector_cart.php">Cart <i class="ion-android-cart"><?php echo "( ".$no." )"?></i></a></li>
                                    </ul><!--/.cg__mainMenu-->

                                </div><!--/.cg__menuWrapper-->

                            </div>

                        </div>
                    </div><!--end right column-->
                </div><!--end flex row-->
            </div>
        </div>
    </header>
    <?php    
    ob_flush(); 
    ?>