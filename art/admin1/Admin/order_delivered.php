<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
$_SESSION['status'] = "4";

include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
include('link.php');
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
    </head>
    <body>
        <div class="block-content collapse in">
            <div class="span12">
                <form class="form-horizontal">
                    <fieldset>
                        <legend>Delivered Oreders</legend>
                        <!-----Middle Content --->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Sale Department</div>
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
                                            $sel = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
                                                    . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
                                                    . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
                                                    . "and shop.artist_id = artist.artist_id and "
                                                    . "shoporder.shop_orderstatus='Delivered'";
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
                        </div>


                        <!-----Middle Content End--->

                    </fieldset>
                </form>

            </div>
        </div>
        <?php
        include('js_link.php');
        ?>
    </body>
</html>
