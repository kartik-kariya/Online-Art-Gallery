<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
?>

<?php
if (isset($_GET['btnAD'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if ($status == 'active') {
            $sta = 'deactive';
        } else {
            $sta = 'active';
        }
        $update = "update tbl_customer set customer_status = '$sta' where customer_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Customer Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Customer Details</div>
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
                                                            <!--<th>Customer ID</th>-->
                                                            <th>User Name</th>
                                                            <th>Customer Name</th>
                                                            <th>Information</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sel = "select * from tbl_customer";
                                                        $res = mysqli_query($conn, $sel);
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
                                                                <!--<td><?php // echo $row[0];    ?></td>-->
                                                                <td><?php echo $row[3]; ?></td>
                                                                <td><?php echo $row[1] . " " . $row[2]; ?></td>
    <!--                                                            <td>
                                                                   <a href="#myAlert<?php // echo "a" . $i             ?>" data-toggle="modal" class="btn btn-primary">Edit</a>

                                                                   <div id="myAlert<?php // echo "a" . $i             ?>" class="modal hide">
                                                                       <form method="post">
                                                                           <div class="modal-header">
                                                                               <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                               <h3>Customer Details Update</h3>
                                                                           </div>
                                                                           <div class="modal-body">
                                                                               <p>Customer Id : <input type="text" name="txt_subcatid" value="<?php // echo $row['sub_catid']                     ?>" readonly="true"></p>
                                                                               <p>Customer First Name : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                               <p>Customer Last Name : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                               <p>E-mail Id : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                               <p>Contact Number : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                               <p>City : <select><option></option></select></p>
                                                                               <p>Address : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                               <p>Favourites : <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']                     ?>"></p>
                                                                           </div>
                                                                           <div class="modal-footer">
                                                                               <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                                                                               <input type="submit" name="btn_update" class="btn btn-primary" value="Update">
                                                                           </div>
                                                                       </form>
                                                                   </div>
                                                               </td>-->
                                                                <td>
                                                                    <a href="#myAlert<?php echo $i ?>" data-toggle="modal" class="btn btn-primary">Info</a>

                                                                    <div id="myAlert<?php echo $i ?>" class="modal hide">
                                                                        <div class="modal-header">
                                                                            <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                            <h3>Details</h3>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                                                                                <tr>
                                                                                <center>
                                                                                    <?php
                                                                                    echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$row[8]'/>";
                                                                                    ?>
                                                                                </center>
                                                                                </tr>
                                                                                <br/>
                                                                                <br/>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Customer First Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[1]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Customer Last Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[2]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        E-mail Id
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[5]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Contact Number
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[6]; ?>
                                                                                    </td>
                                                                                </tr>
<!--                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        City
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
//                                                                                        $q = "select city_name from tbl_city where city_id=$row[7]";
//                                                                                        $a = mysqli_query($conn, $q);
//                                                                                        while ($row1 = mysqli_fetch_row($a)) {
//                                                                                            $mcn = $row1[0];
//                                                                                        }
//                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>-->
    <!--                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Address
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                <?php //echo $row[8]; ?>
                                                                                    </td>
                                                                                </tr>-->
<!--                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Date Of Birth
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php //echo $row[8]; ?>
                                                                                    </td>
                                                                                </tr>-->
<!--                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Favourites
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php //echo $row[9]; ?>
                                                                                    </td>
                                                                                </tr>-->
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Customer Status
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[9]; ?>
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
                                                                <td>
                                                                    <?php
                                                                    if ($row[9] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="customer_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[9] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="customer_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[9] ?>&btnAD=1">De-active </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
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
