<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
include('link.php');

if (isset($_REQUEST['order_code'])) {
    $order_code = $_REQUEST['order_code'];
}
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
                xmlhttp.open("GET", "orderstatus_update_ajax.php?field=" + field + "&query=" + query, false);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <!--/span-->
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->

                <div class="block-content collapse in">
                    <div class="span12">

                        <fieldset>
                            <legend>Order Detail</legend>

                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Customer Name</div>
                                </div>
                                <div class="block-content collapse in">
                                    <div class="span12">

                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Order Id</th>
                                                    <th>Customer</th>
                                                    <th>Address Details</th>
                                                    <th>Artwork</th>
                                                    <th>Date</th>
                                                    <th>Time</th>                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                if ($_SESSION['status'] == "1") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Pending'";
                                                } elseif ($_SESSION['status'] == "2") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Processing'";
                                                } elseif ($_SESSION['status'] == "3") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Dispatched'";
                                                } elseif ($_SESSION['status'] == "4") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Delivered'";
                                                } elseif ($_SESSION['status'] == "5") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Pickedup'";
                                                } elseif ($_SESSION['status'] == "6") {
                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                            . "and shop.artist_id = artist.artist_id and "
                                                            . "shoporder.shop_orderstatus='Cancelled'";
                                                }
                                                $res = mysqli_query($conn, $sel);
                                                while ($row = mysqli_fetch_array($res)) {
                                                    ?>
                                                    <tr align="center">	
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $row['shoporder_id']; ?></td>                                                        
                                                        <td><a href="#customer<?php echo $i ?>" data-toggle="modal" class="btn btn-primary">
                                                                <?php echo $row['customer_firstname'] . " " . $row['customer_lastname'] ?>
                                                            </a>
                                                            <div id="customer<?php echo $i ?>" class="modal hide">
                                                                <div class="modal-header">
                                                                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                    <h3>Details</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                                        <tr>
                                                                        <center>
                                                                            <img width="300" height="300" class="img-circle" src='../../client/<?php echo $row['customer_profileimage']; ?>'/>
                                                                        </center>    
                                                                        </tr>
                                                                        <br/>
                                                                        <br/>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Firstname
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['customer_firstname']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Lastname
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['customer_lastname']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Username
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['customer_username']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Email-Id
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['customer_emailid']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Contact Number
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['customer_contactnumber']; ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                    <br/>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td><a href="#address<?php echo $i ?>" data-toggle="modal" class="btn btn-primary">
                                                                <?php echo $row['shop_zipcode'] ?>
                                                            </a>
                                                            <div id="address<?php echo $i ?>" class="modal hide">
                                                                <div class="modal-header">
                                                                    <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                    <h3>Details</h3>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Street Address
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['shop_streetaddress']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Zipcode
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['shop_zipcode']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                City
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['shop_city']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                State
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['shop_state']; ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td align="center" style="font-weight: bold;">
                                                                                Country
                                                                            </td> 
                                                                            <td align="center">
                                                                                <?php echo $row['shop_country']; ?>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><a href="order_view.php?order_code=<?php echo $row['shoporder_id'] ?>"><input type="button" class="btn btn-info" value="View"></a></td>
                                                        <td><?php echo $row['shop_date']; ?></td>
                                                        <td><?php echo $row['shop_time']; ?></td>                                                    
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                                <div class="block-content collapse in">
                                    <div class="span12">
                                        <form class="form-horizontal">
                                            <fieldset>

                                                <?php
                                                $ro = "";
                                                $s = "select * from tbl_shoporder where shoporder_id='$order_code'";
                                                $r = mysqli_query($conn, $s);
                                                $ro = mysqli_fetch_array($r);
                                                ?>
                                                <!-----Middle Content --->
                                                <div class="block">
                                                    <div class="navbar navbar-inner block-header">
<!--                                                        <div style="float:left"><strong  style="color:#FF0000;margin-left:470px;" id="<?php //echo $ro['cp_code']               ?>">
                                                        <?php
//                                                                if ($ro['shop_orderstatus'] == 'dispatched') {
                                                        ?>
                                                                    <a href="bill.php?cp_code=<?php // echo $ro['shoporder_id']                ?>" class="btn btn-success btn-md" style="float:right;">Bill</a>
                                                        <?php
                                                        //}
                                                        ?>

                                                            </strong>
                                                        </div>-->
                                                        <?php
                                                        if ($ro['shop_orderstatus'] == 'Dispatched') {
                                                            $i = 0;
                                                            $i++;
                                                            ?>
                                                            <div class="muted pull-left" style="float:left">
    <!--                                                                <a href="order_bill.php?order_code=<?php echo $ro['shoporder_id'] ?>" class="btn btn-success btn-md" style="float:right;">Generate Bill</a>-->
                                                                <a href="#bill" data-toggle="modal" class="btn btn-primary">
                                                                    Generate Bill
                                                                </a>
                                                                <div id="bill" class="modal hide">
                                                                    <div class="modal-header">
                                                                        <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                        <center><h3>Billing Details</h3></center>
                                                                    </div>

                                                                    <?php
                                                                    include './order_bill.php';
                                                                    echo $_SESSION['bill'];
                                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                                            . "and shop.artist_id = artist.artist_id and "
                                                                            . "shoporder.shoporder_id ='$order_code'";
                                                                    $res = mysqli_query($conn, $sel);
                                                                    $row = mysqli_fetch_array($res);
                                                                    ?>
                                                                    <br/>
                                                                    <div class="modal-footer">
                                                                        <center>
                                                                            <a class="btn btn-primary" href="order_bill_mail.php?customer=<?php echo $row['customer_emailid'] ?>&order_code=<?php echo $row['shoporder_id'] ?>">Send Mail</a>
                                                                            <a data-dismiss="modal" class="btn btn-primary" href="#">Cancel</a>
                                                                        </center>
                                                                    </div>
                                                                    <hr/>
                                                                    <hr/>
                                                                </div>
                                                                <hr/>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if ($ro['shop_orderstatus'] != 'Cancelled') {
                                                            ?>
                                                            <select id="select01" class="chzn" style="float:right;margin-top:0.4rem;" onChange="validate('<?php echo $ro['shoporder_id'] ?>', this.value)" >
                                                                <option value="" selected="selected">--Select Option--</option>
                                                                <?php
                                                                if ($ro['shop_orderstatus'] == 'Pending') {
                                                                    ?>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Dispatched">Dispatched</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Pickedup">Picked Up</option>
                                                                    <?php
                                                                } else if ($ro['shop_orderstatus'] == 'Processing') {
                                                                    ?>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Dispatched">Dispatched</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Pickedup">Picked Up</option>
                                                                    <?php
                                                                } else if ($ro['shop_orderstatus'] == 'Dispatched') {
                                                                    ?>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <option value="Pickedup">Picked Up</option>
                                                                    <?php
                                                                } else if ($ro['shop_orderstatus'] == 'Delivered') {
                                                                    ?>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Dispatched">Dispatched</option>
                                                                    <option value="Pickedup">Picked Up</option>
                                                                    <?php
                                                                } else if ($ro['shop_orderstatus'] == 'Pickedup') {
                                                                    ?>
                                                                    <option value="Pending">Pending</option>
                                                                    <option value="Processing">Processing</option>
                                                                    <option value="Dispatched">Dispatched</option>
                                                                    <option value="Delivered">Delivered</option>
                                                                    <!--<option value="refunded">Refunded</option>-->
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php
                                                        }
                                                        ?>



                                                    </div>
                                                    <div class="block-content collapse in">
                                                        <div class="span12">
                                                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Order Id</th>
                                                                        <th>Artist</th>
                                                                        <th>Title</th>
                                                                        <th>Image</th>
                                                                        <th>Amount</th>
                                                                        <th>Quantity</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $i = 1;
                                                                    $total = 0;
                                                                    $gt = 0;
                                                                    $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                                            . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                                            . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                                            . "and shop.artist_id = artist.artist_id and "
                                                                            . "shoporder.shoporder_id ='$order_code'";
                                                                    $res = mysqli_query($conn, $sel);
                                                                    while ($row = mysqli_fetch_array($res)) {
                                                                        ?>
                                                                        <tr align="center">
                                                                            <td><?php echo $row['shoporder_id']; ?></td>
                                                                            <td>
                                                                                <a href="#artist<?php echo $i ?>" data-toggle="modal" class="btn btn-primary">
                                                                                    <?php echo $row['artist_firstname'] . " " . $row['artist_lastname'] ?>
                                                                                </a>
                                                                                <div id="artist<?php echo $i ?>" class="modal hide">
                                                                                    <div class="modal-header">
                                                                                        <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                                        <h3>Details</h3>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                                                            <tr>
                                                                                            <center>
                                                                                                <img width="300" height="300" class="img-circle" src='../../client/<?php echo $row['artist_profileimage']; ?>'/>
                                                                                            </center>
                                                                                            </tr>  
                                                                                            <br/>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Firstname
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_firstname']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Lastname
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_lastname']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Usename
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_username']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    E-mail Id
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_email']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Contact Number
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_contactnumber']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Id Proof
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <img width="300" height="300" class="img-circle" src='../../client/<?php echo$row['artist_idproof'] ?>'/>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Legal Name
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_legalname']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Street Address
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_streetaddress']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    City
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_city']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    State
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_state']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td align="center" style="font-weight: bold;">
                                                                                                    Country
                                                                                                </td> 
                                                                                                <td align="center">
                                                                                                    <?php echo $row['artist_country']; ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo $row['arttitle'] ?></td>
                                                                            <td><img style="size:300px; width:250px;" src="../../client/<?php echo $row['artfile'] ?>"></td>
                                                                            <td><?php echo $p = $row['price'] + $row['shipcost'] ?></td>
                                                                            <td><?php echo $qty = $row['qty'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                            <hr>
                                                            <h3 style="text-align:right">Total Amount : Rs.<?php echo $p * $qty; ?></h3>
                                                            <?php
                                                            if ($_SESSION['status'] != "5" && $_SESSION['status'] != "6") {
                                                                ?>
                                                                <a href="order_cancel.php?shop_orderid=<?php echo $ro['shoporder_id'] ?>" class="btn btn-danger btn-md" style="float:left;">Cancel Order</a>
                                                                <hr>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!-----Middle Content End--->

                                            </fieldset>
                                        </form>

                                    </div>
                                </div>
                                <!-- /block -->
                            </div>
                    </div>        
                    <?php
                    include('js_link.php');
                    ?>
                    </body>
                    </html>
