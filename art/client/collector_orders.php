<?php
ob_start();
session_start();
include_once '../connection.php';
if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
$sql = "SELECT * from tbl_shoporder shoporder , tbl_cart cart , tbl_customer customer , "
        . "tbl_shop shop , tbl_artist artist where shoporder.cart_id = cart.cart_id "
        . "and cart.customer_id = customer.customer_id and cart.shop_id = shop.shop_id "
        . "and shop.artist_id = artist.artist_id and customer.customer_username = '" .
        $_SESSION['signin_username'] . "' order by shoporder.shoporder_id desc";
$result_sql = mysqli_query($connection, $sql);
?>

<?php
//
//session_start();
//
//$e = $_SESSION['email'];
//include_once 'connection.php';
//$q = "select Id from userdata where Email='$e'";
//$r = mysqli_query($c, $q);
//while ($result = mysqli_fetch_row($r))
//{
//    $i = $result[0];
//}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Customer Orders</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <link href="css/datatable.min.css" rel="stylesheet" type="text/css"/>
        <!-- CSS assets -->
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/datatable.min.js" type="text/javascript"></script>

        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">


        <!-- ambani -->
        <!-- Bootstrap Core CSS -->
        <link href="../css/jquery.datatable.css" rel="stylesheet" type="text/css"/>

        <!-- MetisMenu CSS -->

        <!--<link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">-->
        <link href="css/datatable.min.css" rel="stylesheet" type="text/css"/>



        <script>
            $(document).ready(function () {
                $('#table_id').DataTable();
            });

        </script>

    </head>
    <body>
        <?php
        include('collector_header.php');
        ?>
        <div style="margin-top: 7.5em;">
            <hr>
            <center>
                <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Orders</h1> 
            </center>
            <hr>
            <section class="sidermargins pb-100 pt-80">
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
                                    <th>Artist</th>
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
                                    <td><?php echo $r['artist_firstname']." ".$r['artist_lastname']; ?></td>
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
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </center>   


                <!-- Metis Menu Plugin JavaScript -->
                <script src="js/plugins/bootstrap.min.js" type="text/javascript"></script>
                <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
                <!--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>-->
                <script src="js/datatable.min.js" type="text/javascript"></script>
             <!--<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
                <script src="js/datatable.bootstrap.min.js" type="text/javascript"></script>
                </form>
                <?PHP ?>
            </section>
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

        </div>
        <?php
        include './footer.php';
        ?>
    </body>
</html>
