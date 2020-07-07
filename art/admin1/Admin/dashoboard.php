<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
include('../connection.php');
//include('link.php');
include('top_header.php');
include('left_menu.php');
?>
<!DOCTYPE html>
<html class="no-js">

    <head>
        <title>Dashboard</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>

        <div class="row-fluid">
            <div class="span8">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Statistics</div>
                        <div class="pull-right"><span class="badge badge-warning"></span>

                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_category";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Categories</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_customer";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Customers</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_artist";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Artists</span>

                            </div>
                        </div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_subject";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Subject</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_blog";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Blogs</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_shop";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Shop</span>

                            </div>
                        </div>
                        </div>
                    <div class="block-content collapse in">
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_artsgallery";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Gallery</span>

                            </div>
                        </div>
                        <div class="span4">
                            <?php
                            $q = "select count(*) from tbl_contact where status='0'";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_row($res)) {
                                $a = $row[0];
                            }
                            ?>
                            <div class="chart" data-percent="<?php echo $a; ?>">
                                <?php
                                echo $a;
                                ?>
                            </div>
                            <div class="chart-bottom-heading"><span class="label label-primary">Inbox</span>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /block -->
            </div>
        </div>
    <center>
        <?php
        include('footer.php');
//include('js_link.php');
        ?>
    </center>
    <!--/.fluid-container-->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="assets/scripts.js"></script>
    <script>
        $(function () {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
    </script>
</body>
</html>