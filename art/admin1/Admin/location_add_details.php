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
if (isset($_POST['btnAdd']) && !empty($_POST['btnAdd'])) {
    $cid = 0;
    $result = mysqli_query($conn, "select country_id from tbl_country where country_name='$_POST[txtCountryName]'");
   // echo "affected rows :" . mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row["country_id"];
        }
    } else {
        $q = "insert into tbl_country (country_name) values('$_POST[txtCountryName]')";
        mysqli_query($conn, $q);

        $result = mysqli_query($conn, "select country_id from tbl_country where country_name='$_POST[txtCountryName]'");


        while ($row = mysqli_fetch_assoc($result)) {
            $cid = $row["country_id"];
        }
    }

    $sid = 0;
    $result = mysqli_query($conn, "select state_id from tbl_state where state_name='$_POST[txtStateName]' and country_id=$cid");

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $sid = $row["state_id"];
        }
    } else {
     //   echo "inserting state" . $cid;
        $q = "insert into tbl_state (state_name,country_id) values('$_POST[txtStateName]',$cid)";
        mysqli_query($conn, $q);
        $result = mysqli_query($conn, "select state_id from tbl_state where state_name='$_POST[txtStateName]' and country_id=$cid");
        while ($row = mysqli_fetch_assoc($result)) {
            $sid = $row["state_id"];
        }
    }

    $ctid = 0;
    $result = mysqli_query($conn, "select city_id from tbl_city where city_name='$_POST[txtCityName]' and state_id=$sid");
    if (mysqli_num_rows($result) > 0) {
        echo "City Already Exists";
    } else {
        $cstatus = "active";
       // echo "inserting city" . $sid;
        $q = "insert into tbl_city (city_name,state_id,city_status) values('".$_POST['txtCityName']."',$sid,'$cstatus')";
        mysqli_query($conn, $q);
    }




//                    if(empty($_POST['txt_name']))
//                    {
//                        echo "Name can not be empty";
//                    }
//                    else
//                    {
//                        $n=$_POST['txt_name'];
//                        $q="insert into stud (name) values('$n')";
//
//                        $result= mysqli_query($c,$q);
//                        header('location:succesful.php');
//                    }
//                                echo $n;
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Add Location</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Location</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" class="form-horizontal" method="post">
                                <fieldset>


                                    <!--                                    <div class="alert alert-success">
                                                                            <button class="close" data-dismiss="alert"></button>
                                
                                                                        </div>-->

                                    <!--<div class="alert alert-success hide">
                                            <button class="close" data-dismiss="alert"></button>
                                            Your form validation is successful!
                                    </div>-->
                                    <div class="control-group">
                                        <label class="control-label">Country Name</label>
                                        <div class="controls">
                                            <input type="text" name="txtCountryName" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">State Name</label>
                                        <div class="controls">
                                            <input type="text" name="txtStateName" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">City Name</label>
                                        <div class="controls">
                                            <input type="text" name="txtCityName" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>

                                        <div class="form-actions">
                                            <input type="submit" name="btnAdd" class="btn btn-primary" value="Add"/>
                                            <input type="reset" class="btn" value="Cancel"/>
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
