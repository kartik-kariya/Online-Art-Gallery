<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Auction Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Auction Details</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" class="form-horizontal" method="post">
                                <fieldset>

                                    <!--
                                                                        <div class="alert alert-success">
                                                                            <button class="close" data-dismiss="alert"></button>
                                    
                                                                        </div>-->

                                    <!--<div class="alert alert-success hide">
                                            <button class="close" data-dismiss="alert"></button>
                                            Your form validation is successful!
                                    </div>-->
                                    <div class="control-group">



                                        <div class="block-content collapse in">
                                            <div class="span12">

                                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Auction ID</th>
                                                            <th>XYZ</th>        
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
//                                                    $sel = "select * from sub_category";
//                                                    $res = mysqli_query($conn, $sel);
//                                                    while ($row = mysqli_fetch_array($res)) {
                                                        ?>
                                                        <tr align="center">	
                                                            <td><?php echo $i++ ?></td>
                                                            <td><?php // echo $row['sub_catid']           ?></td>
                                                            <td><?php //echo $row['category_id']           ?></td>
                                                        </tr>
                                                        <?php
                                                        //  }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>


                        </div>
                    </div>
                </div>
            </div>


            <?php
            include('footer.php');
            include('js_link.php');
            ?>

    </body>
</html>
