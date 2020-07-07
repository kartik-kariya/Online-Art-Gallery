<?php
include '../connection.php';
?>
<div class="container-fluid">
<div class="row-fluid">
    <div class="span3" id="sidebar">
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
            <!--<li>
                <a href="index.html"><i class="icon-chevron-right"></i> Dashboard</a>
            </li>-->

<!--            <li>
                <a href="#"><span class="badge badge-warning pull-right">

                    </span> Logs</a>
            </li>-->
            <li>
                <a href="order_customer_order.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Pending'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Pending Orders</a>
            </li>
            <li>
                <a href="order_notified.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Processing'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Processing Orders</a>
            </li>
            <li>
                <a href="order_dispatched.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Dispatched'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Dispatched Orders</a>
            </li>
            <li>
                <a href="order_delivered.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Delivered'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Delivered Orders</a>
            </li>
            <li>
                <a href="order_pickedup.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Pickedup'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Pickedup Orders</a>
            </li>
            <li>
                <a href="order_cancelled.php"><span class="badge badge-warning pull-right">
                        <?php
                        $i = 0;
                        $sel = "select * from tbl_shoporder where shop_orderstatus='Cancelled'";
                        $res = mysqli_query($conn, $sel);
                        while (mysqli_fetch_array($res)) {
                            $i++;
                        }
                        echo $i;
                        ?>							
                    </span>Cancelled Orders</a>
            </li>
        </ul>
    </div>

