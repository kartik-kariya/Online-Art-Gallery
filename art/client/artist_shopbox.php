<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<link href="css/shop/shop.css" rel="stylesheet" type="text/css"/>
<style>
</style>
<script>
    /* Demo purposes only */
    $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
    );
</script>

<div style="margin-top: 7.5em;">
    <hr>
    <form method="post">
        <center>
            <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Shop</h1>
            <hr/>
            <div class="wrap-input100">
                <input class="input100" ID="myInput" type="text" placeholder="Search..." style="width: 50%;">
                <span class="focus-input100" style="width: 50%; margin-left: 25%;"></span>
            </div>
        </center>
    </form>
    <hr>

    <?php
    include_once '../connection.php';
    $q = "select * from tbl_shop s , tbl_artist a where s.artist_id=a.artist_id order by shop_id desc";
    $result = mysqli_query($connection, $q);
    ?>
    <!--    <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
    <?php
    //while ($r = mysqli_fetch_assoc($result)) {
    ?>
                        <div class="col-md-4 column productbox">
                            <center><img src="<?php //echo $r['artfile']              ?>" class="img-responsive"></center>
                            <div class="producttitle"><?php //echo $r['arttitle']              ?></div>
                            <div class="pricetext"><?php //echo $r['fname'] . " " . $r['lname']              ?></div>
                            <div class="productprice">
                                <div class="pull-right" style="padding-top: 1%;"><a href="#" class="login100-form-btn"  style="size: auto; color:#fff;" role="button">ADD TO CART</a></div>
                                <div class="pricetext"><?php //echo $r['price'] . " INR"              ?></div>
                            </div>
                        </div>
    <?php
    //}
    ?>
                </div>
            </div>
            <br/><br/>
        </div>-->

    <div class="container-fluid">
        <div class="row">
            <?php
            while ($r = mysqli_fetch_assoc($result)) {
                ?>  
                <div id="myDiv">
                    <div class="col-sm-3">
                        <figure class="snip1423">
                            <img src="<?php echo $r['artfile'] ?>" alt="Image Not Found" height="250em"/>
                            <figcaption>
                                <p style="font-size: 3px;" hidden><?php echo $r['artkeywords']; ?></p>
                                <h3><?php echo $r['arttitle'] ?></h3>
                                <p><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></p>
                                <h3 class="price" style="font-weight: bold;">
                                    <?php echo $r['price'] + $r['shipcost'] . " INR" ?>
                                </h3>
                            </figcaption>
                            <i class="fa fa-angle-right"></i>
                            <a href="artist_artdetails.php?id=<?php echo $r['shop_id'] ?>"></a>
                        </figure>
                    </div>
                </div>
                <?php
            }
            ob_flush();
            ?>
        </div>
    </div>
</div>
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
<br/>
<br/>
