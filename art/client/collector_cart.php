<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
$q = "select * from tbl_cart c , tbl_shop s , tbl_artist a where c.shop_id = s.shop_id and s.artist_id = a.artist_id and cart_status=0;";
$res = mysqli_query($connection, $q);
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
        <!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">-->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

        <script>
            // AJAX code to check input field values when onblur event triggerd.
            function validate(field, query) //field means id,Query - Textbox value
            {
                var xmlhttp;
                if (window.XMLHttpRequest)
                {
                    // for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else
                {
                    // for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function ()
                {
                    if (xmlhttp.readyState != 4 && xmlhttp.status == 200)
                    {
                        document.getElementById(field).innerHTML = "Validating..";
                    } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById(field).innerHTML = xmlhttp.responseText;
                    } else
                    {
                        document.getElementById(field).innerHTML = "Error Occurred. <a href='index.php'>Reload Or Try Again</a> the page.";
                    }
                }
                xmlhttp.open("GET", "collector_cart_price_ajax.php?field=" + field + "&query=" + query, false);
                xmlhttp.send();
            }
        </script>

    </head>
    <body>
        <?php include './collector_header.php' ?>
        <div style="margin-top: 7.5em;">
            <hr>
            <center>
                <p style="font-size:60px;color: #542c6b;font-family: serif;">Cart <i class="ion-android-cart"></i>
                    <label style="font-size:30px;color: #542c6b;font-family: serif;"><?php echo "( " . $no . " )" ?></label>
                </p>

            </center>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <form method="post">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Artwork</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                        <th> </th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    <?php
                                    $amt = 0;
                                    $p = array();
                                    while ($r = mysqli_fetch_assoc($res)) {
                                        ?>
                                        <tr>
                                            <td class="col-sm-8 col-md-6">
                                                <div class="media">
                                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" src="<?php echo $r['artfile'] ?>" style="width: 72px; height: 72px;"> </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="#"><?php echo $r['arttitle'] ?></a></h4>
                                                        <h5 class="media-heading"> by <a href="#"><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></a></h5>
                                                        <span>Status: </span><span class="text-success"><strong><?php echo $r['artcategory'] ?></strong></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                                <input type="number" class="form-control" style="padding:5px;" value="<?php echo $r['qty'] ?>" min="1" max="5" onchange="validate('<?php echo $r['cart_id'] ?>', this.value)">
                                            </td>
                                            <?php $_SESSION['shipcost'] = $r['shipcost']; ?>
                                            <td class="col-sm-1 col-md-1 text-center"><strong><?php echo $r['price'] + $r['shipcost']; ?></strong></td>
                                            <td class="col-sm-1 col-md-1 text-center" id="<?php echo $r['cart_id'] ?>">
                                                <strong>
                                                    <?php
                                                    $p[] = ($r['price'] + $_SESSION['shipcost']) * $r['qty'];
                                                    echo ($r['price'] + $_SESSION['shipcost']) * $r['qty'];
                                                    ?>
                                                </strong>
                                            </td>
                                            <td class="col-sm-1 col-md-1">
                                                <a href="collector_cart.php?cart_id=<?php echo $r['cart_id'] ?>"> <input type="button" class="btn btn-danger" name="btn_remove" value="REMOVE"/></a>
                                            </td>
                                            <?php
                                            if (isset($_REQUEST['cart_id'])) {
                                                $cart_id = $_REQUEST['cart_id'];
                                                $remove = "delete from tbl_cart where cart_id='$cart_id'";
                                                $resremove = mysqli_query($connection, $remove);
                                                // header("location:collector_cart.php");
                                                //header("Location: #"); 
                                                //echo $r['cart_id'];
                                            }
                                            ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td><h3 class="text-center">Total Amount</h3></td>
                                        <?php
                                        for ($i = 0; $i < sizeof($p); $i++) {
                                            $amt = $amt + $p[$i];
                                        }
                                        ?>
                                        <!--<td><h3 class="text-center"><?php //echo $amt . " INR";          ?></h3></td>-->
                                        <td class="col-sm-1 col-md-1 text-center" id="<?php echo $r['cart_id'] ?>">
                                            <h3 class="text-center">
                                                <?php
                                                echo $amt . " INR";
                                                ?>
                                            </h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>   </td>
                                        <td>
                                            <button type="submit" class="btn" style="background-color: #755588" formaction="collector_shop.php">
                                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                                            </button>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn" style="background-color: #755588" name="btn_checkout">
                                                Checkout <span class="glyphicon glyphicon-play"></span>
                                            </button></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <?php
                            $_SESSION['amount'] = $amt;

                            if (isset($_POST['btn_checkout'])) {
                                $q = "select customer_id from tbl_customer where customer_username = '" . $_SESSION['signin_username'] . "'";
                                $res_q = mysqli_query($connection, $q);
                                while ($r = mysqli_fetch_assoc($res_q)) {
                                    $customer_id = $r['customer_id'];
                                }

                                $cnt = 0;
                                $cart_qty = 0;
                                $err = 0;

                                $q = "select count(*) from tbl_cart where customer_id = '$customer_id' and cart_status = 0;";
                                $res_q = mysqli_query($connection, $q);
                                while ($r = mysqli_fetch_row($res_q)) {
                                    $cnt = $r[0];
                                }

                                $shop_id = $cart_qty = $shop_qty = array();
                                if ($cnt > 0) {
                                    $q = "select * from tbl_cart c , tbl_shop s , tbl_artist a where c.shop_id = s.shop_id and s.artist_id = a.artist_id and cart_status=0;";
                                    $res_q = mysqli_query($connection, $q);
                                    while ($r = mysqli_fetch_assoc($res_q)) {
                                        $shop_id[] = $r['shop_id'];
                                        $cart_qty[] = $r['qty'];
                                        $arttitle[] = $r['arttitle'];
                                    }
                                    for ($a = 0; $a < sizeof($shop_id); $a++) {
                                        $q = "select available_copies from tbl_shop where shop_id=$shop_id[$a];";
                                        $res_q = mysqli_query($connection, $q);
                                        while ($r = mysqli_fetch_assoc($res_q)) {
                                            $shop_qty[] = $r['available_copies'];
                                            if ($shop_qty[$a] < $cart_qty[$a]) {
                                                $err = 1;
//                                            echo "<script>swal('Opps.!', '$shop_qty[$a] Artwork Available In Stock for $arttitle[$a] .!', 'error');</script>";
                                            } else {
                                                //header("Location: PayUMoney_form.php");
                                            }
                                            if ($err == 1) {
                                                echo "<script>swal('Opps.!', 'Stock Is Not Available .!', 'error');</script>";
                                                //echo "<script>swal('Opps.!', '$shop_qty[$a] Artwork Available In Stock for $arttitle[$a] .!', 'error');</script>";
                                            } else {
                                                header("Location: PayUMoney_form.php");
                                            }
                                        }
                                    }
                                    for ($a = 0; $a < sizeof($shop_id); $a++) {
                                        
                                    }
                                } else {
                                    echo "<script>swal('Opps.!', 'Cart Is Empty .!', 'error');</script>";
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>
<?php ob_flush(); ?>