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
        $update = "update tbl_blog set blog_status = '$sta' where blog_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>

<?php
if (isset($_POST['btnUpdate'])) {
    $id = $_POST['txtBlogId'];
    $xyz = $_POST['txtBlogUserName'];
    $ii = $_POST['txtBlogDescription'];
    $q1 = "update tbl_blog set blog_username='$xyz',blog_description='$ii' where blog_id='$id'";
    mysqli_query($conn, $q1) or die("Blog Not Updated Sucessfully..!!");
}
//header("location:arts_main_view_category.php");
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Blog Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Blog Details</div>
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
                                                            <th>Blog ID</th>
                                                            <th>Blog User Name</th>
                                                            <!--<th>Blog Description</th>-->
                                                            <th>Edit</th>
                                                            <th>Information</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sel = "select * from tbl_blog";
                                                        $res = mysqli_query($conn, $sel);
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
                                                                <td><?php echo $row[0]; ?></td>
                                                                <td><?php echo $row[1]; ?></td>
                                                                <td>
                                                                    <a href="#myAlert<?php echo "a" . $i ?>" data-toggle="modal" class="btn btn-info">Edit</a>

                                                                    <div id="myAlert<?php echo "a" . $i ?>" class="modal hide">
                                                                        <form method="post">
                                                                            <div class="modal-header">
                                                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                                <h3>Blog Details Update</h3>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p>Blog Id : <input type="text" name="txtBlogId" class="span6 m-wrap" value="<?php echo $row[0]; ?>" readonly="true"></p>
                                                                                <p>Blog User Name : <input type="text" name="txtBlogUserName" class="span6 m-wrap" value="<?php echo $row[1]; ?>"></p>
                                                                                <p>Blog Description : <input type="text" name="txtBlogDescription" class="span6 m-wrap" value="<?php echo $row[2]; ?>"></p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <!--<a data-dismiss="modal" class="btn" href="#">Cancel</a>-->
                                                                                <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update">
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
                                                                                    <?php
                                                                                    $temp = $row[4];
                                                                                    echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$temp'/>";;
                                                                                    ?>
                                                                                </tr>
<!--                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog ID    
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <?php// echo $row[0]; ?>
                                                                                    </td>
                                                                                </tr>-->
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog User Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[1]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog Description
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[2]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog Date
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[5]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog Time
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[6]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Blog Status
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[3]; ?>
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
                                                                    if ($row[3] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="blog_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[3] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="blog_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[3] ?>&btnAD=1">De-active </a>
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
            ?>

    </body>
</html>
