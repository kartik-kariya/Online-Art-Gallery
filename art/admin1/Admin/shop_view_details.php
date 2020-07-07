<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Shop Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Shop Details</div>
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
                                                            <th>Art Title</th>
                                                            <th>Art Category</th>
                                                            <th>Art Subject</th>
                                                            <th>Information</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sel = "select * from tbl_shop";
                                                        $res = mysqli_query($conn, $sel);
                                                        while ($row = mysqli_fetch_row($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
                                                                <td><?php echo $row[2]; ?></td>
                                                                <td><?php echo $row[4]; ?></td>
                                                                <td><?php echo $row[5]; ?></td>
                                                                <td>
                                                                    <a href = "#myAlert<?php echo $i ?>" data-toggle = "modal" class = "btn btn-primary">Info</a>

                                                                    <div id = "myAlert<?php echo $i ?>" class = "modal hide">
                                                                        <div class = "modal-header">
                                                                            <button data-dismiss = "modal" class = "close" type = "button">&times;
                                                                            </button>
                                                                            <h3>Details</h3>
                                                                        </div>
                                                                        <div class = "modal-body">
                                                                            <table cellpadding = "0" cellspacing = "0" border = "0" class = "table table-striped table-bordered" id = "example">
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Artist Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        $q = "select * from tbl_artist where artist_id=$row[1]";
                                                                                        $res1 = mysqli_query($conn, $q);
                                                                                        while ($row1 = mysqli_fetch_array($res1)) {
                                                                                            $abc = $row1[1] ." ". $row1[2];
                                                                                        }
                                                                                        echo $abc;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Title
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[2]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art File
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$row[3]  '/>"; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Category
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[4]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Subject
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[5]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Year Of Creation
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[6]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Original
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[7]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Mediums
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[8]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Materials
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[9]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Styles
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[10]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Height
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[12]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Width
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[13]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Art Description
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[14]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Street Address
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[16]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        City
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        echo $row[17];
//                                                                                        $q = "select city_name from tbl_city where city_id=$row[16]";
//                                                                                        $a = mysqli_query($conn, $q);
//                                                                                        while ($row1 = mysqli_fetch_row($a)) {
//                                                                                            $mcn = $row1[0];
//                                                                                        }
//                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        State
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        echo $row[18];
//                                                                                        $q = "select state_name from tbl_state where state_id=$row[17]";
//                                                                                        $a = mysqli_query($conn, $q);
//                                                                                        while ($row1 = mysqli_fetch_row($a)) {
//                                                                                            $mcn = $row1[0];
//                                                                                        }
//                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Country
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        echo $row[19];
//                                                                                        $q = "select country_name from tbl_country where country_id=$row[18]";
//                                                                                        $a = mysqli_query($conn, $q);
//                                                                                        while ($row1 = mysqli_fetch_row($a)) {
//                                                                                            $mcn = $row1[0];
//                                                                                        }
//                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Price
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[20]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Shipping Cost
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[21]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Date
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[22]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Time
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[23]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a data-dismiss="modal" class="btn btn-primary" href="#">Ok</a>
                                                                            <!--<a data-dismiss="modal" class="btn btn-primary" href="#">Confirm</a>-->
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
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
