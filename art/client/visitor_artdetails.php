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
<?php
$art = $_GET['id'];
$q = "select * from tbl_shop s , tbl_artist a where s.artist_id = a.artist_id and shop_id = " . $art = $_GET['id'];
$result = mysqli_query($connection, $q);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/artdetails/art_details.css" rel="stylesheet" type="text/css"/>
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
        <link rel="stylesheet" type="text/css" href="css/main.css">

        <!--category stylesheets-->
        <link rel="stylesheet" href="css/categorystyle.css" />

    </head>
    <style class="cp-pen-styles"></style>
    <body>                
        <?php include './visitor_header.php'; ?>
        <section aria-label="Main content" role="main" class="product-detail" style="margin-top:5.4em;">
            <hr>
            <div itemscope itemtype="http://schema.org/Product">
                <meta itemprop="url" content="http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
                <meta itemprop="image" content="//cdn.shopify.com/s/files/1/1047/6452/products/product_grande.png?v=1446769025">
                <div class="shadow">
                    <div class="_cont detail-top">
                        <div class="cols">
                            <div class="left-col">
                                <div class="thumbs">
                                    <!--                                    <a class="thumb-image active" href="extra_img/Template/architecture/furniture/202-320-sct_1.jpg" data-index="0">
                                                                            <span><img src="extra_img/Template/architecture/furniture/202-320-sct_1.jpg" alt=""/></span>
                                                                        </a>
                                                                        
                                                                        <a class="thumb-image" href="//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_1024x1024.jpg?v=1447104179" data-index="1">
                                                                            <span><img src="extra_img/Template/architecture/furniture/202-320-sct_1.jpg" alt=""/></span>
                                                                        </a>
                                                                        <a class="thumb-image" href="//cdn.shopify.com/s/files/1/1047/6452/products/tricko2_1024x1024.jpg?v=1447104180" data-index="2">
                                                                            <span><img src="extra_img/Template/architecture/furniture/202-320-sct_1.jpg" alt=""/></span>
                                                                        </a>
                                                                        <a class="thumb-image" href="//cdn.shopify.com/s/files/1/1047/6452/products/tricko3_1024x1024.jpg?v=1447104182" data-index="3">
                                                                            <span><img src="extra_img/Template/architecture/furniture/202-320-sct_1.jpg" alt=""/></span>
                                                                        </a>-->
                                </div>
                                <div class="big">
                                    <?php while ($r = mysqli_fetch_assoc($result)) { ?>
                                        <span id = "big-image" class = "img" quickbeam = "image" style = "background-image: url('<?php echo $r['artfile'] ?>')" data-src = "//cdn.shopify.com/s/files/1/1047/6452/products/product_1024x1024.png?v=1446769025"></span>
                                        <div id = "banner-gallery" class = "swipe">
                                            <div class = "swipe-wrap">

                                                <div style = "background-image: url('<?php echo $r['artfile'] ?>')"></div>

                                                <div style = "background-image: url('<?php echo $r['artfile'] ?>')"></div>

                                                <div style = "background-image: url('<?php echo $r['artfile'] ?>')"></div>

                                                <div style = "background-image: url('<?php echo $r['artfile'] ?>')"></div>
                                            </div>
                                        </div>
                                        <!--<div class = "detail-socials">
                                        <div class = "social-sharing" data-permalink = "http://html-koder-test.myshopify.com/products/tommy-hilfiger-t-shirt-new-york">
                                        <a target = "_blank" class = "share-facebook" title = "Share"></a>
                                        <a target = "_blank" class = "share-twitter" title = "Tweet"></a>
                                        <a target = "_blank" class = "share-pinterest" title = "Pin it"></a>
                                        </div>
                                        </div> -->

                                    </div>
                                </div>
                                <div class="right-col">
                                    <h2 itemprop="name"><?php echo $r['arttitle'] ?></h2>
                                    <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <meta itemprop="priceCurrency" content="INR">
                                        <link itemprop="availability" href="https://schema.org/InStock">
                                        <div class="price-shipping">
                                            <div class="price" id="price-preview" quickbeam="price" quickbeam-price="800"style="color:#755588">
                                                <?php echo $r['price'] + $r['shipcost'] . " INR" ?>
                                            </div>                                            
                                            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Including shipping</p>
                                        </div>
                                        <div class="swatches" style="margin-bottom: 0;">
                                            <div class="swatch clearfix" data-option-index="0">
                                                <h1>ARTIST</h1>
                                                <a href="#" style="text-decoration: none;font-size: 3em;"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></a><br>
                                                <h4 style="padding-top:10px;">COUNTRY</h4>
                                            </div>
                                        </div>
                                        <br>
                                        <h1 class="header" style="margin-bottom: 0;"><?php echo $r['artcategory'] ?></h1>
                                        <div class="swatches" style="margin-top: 0;margin-bottom: 0;">
                                            <div class="swatch clearfix" data-option-index="0">
                                                <h1 class="header">SIZE :- <a><?php echo $r['height'] . " H    x   " . $r['width'] . " W " ?></a><br></h1>

                                            </div>
                                        </div>
                                        <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
                                        <form id="AddToCartForm" method="post">
                                            <div class="btn-and-quantity-wrap">
                                                <div class="btn-and-quantity">
                                                    <!--<div class="spinner">
                                                        <span class="btn minus" data-id="2721888517"></span>
                                                        <input type="text" id="updates_2721888517" name="quantity" value="1" class="quantity-selector">
                                                        <input type="hidden" id="product_id" name="product_id" value="2721888517">
                                                        <span class="q">Qty.</span>
                                                        <span class="btn plus" data-id="2721888517"></span>
                                                        </div>-->
                                                    <div class="container-login100-form-btn">
                                                        <input type="submit" name="btn_addtocart" class="login100-form-btn"  value="ADD TO CART" style="width: 12em"/>
                                                        &nbsp;&nbsp;
                                                        <!--<input type="submit" name="btn_buynow" class="login100-form-btn"  value="BUY NOW" style="width: 12em"/>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="jumbotron">
                        <div class="container" style="background-color: #FFFFFF; padding:3em;">
                            <center><h2>ART DESCRIPTION</h2></center>
                        </div>
                        <br/>
                        <div class="container" style="background-color: #FFFFFF; padding:5em;">
                            <h3 style="font-size: 20px;"><?php echo $r["artcategory"] . " : " . $r["artmediums"] . " ON " . $r["artmaterials"] ?></h3>
                            <br/>
                            <h3 style="font-size: 20px;"><?php echo "Mediums :- " . $r["artmediums"] ?></h3>
                            <br/>
                            <h3 style="font-size: 20px;"><?php echo "Materials :- " . $r["artmaterials"] ?></h3>
                            <br/>
                            <h3 style="font-size: 20px;"><?php echo "Styles :- " . $r["artstyles"] ?></h3>
                            <br/>
                            <h3 style="font-size: 20px;"><?php echo "Keywords :- " . $r["artkeywords"] ?></h3>
                            <br/>
                            <h3 style="font-size: 20px;"><?php echo $r["description"] ?></h3>
                        </div>
                    </div>
                <?php } ?>

                <!--            <aside class="related">
                                <div class="_cont">
                                    <h2>You might also like</h2>
                                    <div class="collection-list cols-4" id="collection-list" data-products-per-page="4">
                                        <a class="product-box">
                                            <span class="img">
                                                <span style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/tricko1_70d2887b-ec6a-4bcb-a93b-7fd1783e6445_grande.jpg?v=1447530130')" class="i first"></span>
                                                <span class="i second" style="background-image: url('//cdn.shopify.com/s/files/1/1047/6452/products/product_030f9fc5-f253-4dca-a43a-fe2b719d0704_grande.png?v=1447530130')"></span>
                                            </span>
                                            <span class="text">
                                                <strong>Tony Hunfinger T-Shirt New York 2</strong>
                                                <span>
                                                    From $800.00
                                                </span>
                                                <div class="variants">
                                                    <div class="variant">
                                                        <div class="var m available">
                                                            <div class="t">M</div>
                                                        </div>
                                                        <div class="var l available">
                                                            <div class="t">L</div>
                                                        </div>
                                                        <div class="var xl available">
                                                            <div class="t">XL</div>
                                                        </div>
                                                        <div class="var xxl available">
                                                            <div class="t">XXL</div>
                                                        </div>
                                                    </div>
                                                    <div class="variant">
                                                        <div class="var color blue available">
                                                            <div class="c" style="background-color: blue;"></div>
                                                        </div>
                                                        <div class="var color red available">
                                                            <div class="c" style="background-color: red;"></div>
                                                        </div>
                                                        <div class="var color yellow available">
                                                            <div class="c" style="background-color: yellow;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="more-products" id="more-products-wrap">
                                        <span id="more-products" data-rows_per_page="1">More products</span>
                                    </div>
                                </div>
                            </aside>-->
            </div>

        </section>

        <!-- Quickbeam cart-->
        <?php
        if (isset($_POST['btn_addtocart']) || isset($_POST['btn_buynow'])) {
            header("Location: signin.php");
//                if(!empty($_SESSION['username'])){
//                    
//                } else {
//                    header("Location: signin.php");
//                }
        }
        ?>
        <?php
        include('footer.php');
        ?>
    </body>
</html>
