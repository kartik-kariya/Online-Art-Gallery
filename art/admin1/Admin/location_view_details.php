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
        $update = "update tbl_city set city_status = '$sta' where city_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Location Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Location Details</div>
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
                                                            <!--<th>Artist ID</th>-->
                                                            <th>Country Name</th>
                                                            <th>State Name</th>
                                                            <!--<th>Edit</th>-->
                                                            <th>City Name</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sel = "select * from tbl_country c,tbl_state s,tbl_city ct where c.country_id = s.country_id and s.state_id=ct.state_id";
                                                        $res = mysqli_query($conn, $sel);
                                                        while ($row = mysqli_fetch_row($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
                                                                <td><?php echo $row[1] ?></td>
                                                                <td><?php echo $row[3] ?></td>
                                                                <td><?php echo $row[6] ?></td>
                                                                <td>
                                                                    <?php
                                                                    if ($row[8] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="location_view_details.php?id=<?php echo $row[5] ?>&status=<?php echo $row[8] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="location_view_details.php?id=<?php echo $row[5] ?>&status=<?php echo $row[8] ?>&btnAD=1">De-active</a>
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
