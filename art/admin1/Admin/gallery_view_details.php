<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include('../connection.php');
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
        $update = "update tbl_artsgallery set status = '$sta' where artgallery_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Gallery Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Gallery Details</div>
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
                                                            <th>Image</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sel = "select * from tbl_artsgallery";
                                                        $res = mysqli_query($conn, $sel);
                                                        while ($row = mysqli_fetch_row($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++; ?></td>
                                                                <td><?php
                                                                    echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$row[1]'/>";
                                                                    ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row[2] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="gallery_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[2] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="gallery_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[2] ?>&btnAD=1">De-active </a>
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
