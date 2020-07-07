<?php
ob_start();
session_start();
include '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
$sql = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
        . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
        . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
        . "and shop.artist_id = artist.artist_id and artist.artist_username = '" . $_SESSION['signin_username'] . "'"
        . "order by shoporder.shoporder_id desc";
$result_sql = mysqli_query($connection, $sql);
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

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="addons/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="addons/Magnific-Popup/magnific-popup.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="addons/revolution/css/settings.css">
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- ambani -->
        <!-- Bootstrap Core CSS -->
        <link href="../css/jquery.datatable.css" rel="stylesheet" type="text/css"/>

        <!-- MetisMenu CSS -->

        <!--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
        <link href="css/datatable.min.css" rel="stylesheet" type="text/css"/>

        <style>
            html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
        </style>
    </head>
    <body>
        <?php include './artist_header.php'; ?>
        <div>
            <div style="margin-top: 7.5em;">
                <hr>
                <center>
                    <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Orders</h1> 
                </center>

                <hr>

                <?php //include './artist_orders-left-column.php'; ?>
                <center>
                    <div style="width:80%;">
                        <div align="right">
                            <input class="form-control" ID="myInput" type="text" placeholder="Search..." style="width: 20%;">
                            <br/>
                        </div>
                        <table id="mytable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order Id</th>
                                    <th>Customer</th>
                                    <th>Artwork</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <?php while ($r = mysqli_fetch_assoc($result_sql)) { ?>
                                <tr class="mytr">
                                    <td><?php echo $r['shoporder_id']; ?></td>
                                    <td><?php echo $r['customer_username']; ?></td>
                                    <td>
                                        <img src="<?php echo $r['artfile']; ?>" alt="Image Not Found..." 
                                             style="height: 200px"/>
                                        <hr/>
                                        <?php echo $r['arttitle']; ?>
                                        <hr/>
                                    </td>
                         <td><?php echo $r['shop_zipcode'] . " - " . $r['shop_city']; ?></td>
                                    <td><?php echo $r['shop_date']; ?></td>
                                    <td><?php echo $r['shop_time']; ?></td>
                                    <td><?php echo $r['qty']; ?></td>
                                    <td><?php echo ($r['price']+$r['shipcost'])*$r['qty'] ; ?></td>
                                    <td><?php echo $r['shop_orderstatus']; ?></td>
                                </tr> 
                            <?php } ?>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </center>   
            </div>
            <!-- Metis Menu Plugin JavaScript -->
            <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
            <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
            <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
            <script src="js/datatable.min.js" type="text/javascript"></script>
         <!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
            <script src="js/datatable.bootstrap.min.js" type="text/javascript"></script>


            <?PHP ?>
        </div>
        <br/>

        <?php include './footer.php'; ?>
        <!--             Footer 
                    <footer class="w3-container w3-theme-d3 w3-padding-16">
                        <h5>Footer</h5>
                    </footer>
        
                    <footer class="w3-container w3-theme-d5">
                        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
                    </footer>-->
            <script>
                $(document).ready(function () {
                    $("#myInput").on("keyup", function () {
                        var value = $(this).val().toLowerCase();
                        $("#mytable .mytr").filter(function () {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                    });
                });
            </script>
    </body>
</html>
