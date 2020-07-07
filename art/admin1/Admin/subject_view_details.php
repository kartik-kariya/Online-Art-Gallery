<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include('../connection.php');
ob_start();
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
        $update = "update tbl_subject set subject_status = '$sta' where subject_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>

<?php
if (isset($_POST['btnUpdate'])) {
    $xyz = $_POST['txtMainCategoryName'];
    $ii = $_POST['txtMainCategoryId'];
    $q1 = "update tbl_subject set subject_name='$xyz' where subject_id='$ii'";
    mysqli_query($conn, $q1) or die("Subject Not Updated Sucessfully..!!");
}
//header("location:arts_main_view_category.php");
?>




<!DOCTYPE html>
<html>

    <head>
        <title>View Subject</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Subject</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" method="post">
                                <fieldset>

                                    <!--
                                                                        <div class="alert alert-success">
                                                                            <button class="close" data-dismiss="alert"></button>
                                    
                                                                        </div>
                                    
                                                                        <div class="alert alert-success hide">
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
                                                            <th>Subject ID</th>
                                                            <th>Subject Name</th>
                                                            <th>Edit</th>
                                                            <th>Information</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $q = "select * from tbl_subject";
                                                        $tmp = mysqli_query($conn, $q);
                                                        while ($row = mysqli_fetch_array($tmp)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
                                                                <td><?php echo $row[0]; ?></td>
                                                                <!--<td><?php //echo $row['category_id']                                   ?></td>-->
                                                                <td><?php echo $row[1]; ?></td>
                                                                <td>
                                                                    <a href="#myAlert<?php echo "a" . $i ?>" data-toggle="modal" class="btn btn-info">Edit</a>

                                                                    <div id="myAlert<?php echo "a" . $i ?>" class="modal hide">
                                                                        <form method="post">
                                                                            <div class="modal-header">
                                                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                                <center><h3>Subject Update</h3></center>
                                                                            </div>
                                                                            <center>
                                                                                <table>
                                                                                    <div class="modal-body">
                                                                                        <tr><td>Subject Id : </td><td><input type="text" name="txtMainCategoryId" class="span6 m-wrap" value="<?php echo $row[0]; ?>" readonly="true"></td></tr>
                                                                                        <tr><td>Subject Name : </td><td><input type="text" name="txtMainCategoryName" class="span6 m-wrap" value="<?php echo $row[1]; ?>"></td></tr>
                                                                                    </div>
                                                                                </table>
                                                                            </center>
                                                                            <br/><br/>
                                                                            <div class="modal-footer">
                                                                                <!--<a data-dismiss="modal" class="btn" href="#">Cancel</a>-->
                                                                                <center><input type="submit" name="btnUpdate" class="btn btn-primary" value="Update"></center>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </td>
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
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Subject ID    
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <?php echo $row[0]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Subject Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[1]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Subject Status
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[2]; ?>
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
                                                                    if ($row[2] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="subject_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[2] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="subject_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[2] ?>&btnAD=1">De-active </a>
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
                                </fieldset>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('footer.php');
            include('js_link.php');
            ob_flush();
            ?>

    </body>
</html>
