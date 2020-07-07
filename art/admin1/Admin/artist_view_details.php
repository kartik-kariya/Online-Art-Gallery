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
        $update = "update tbl_artist set artist_status = '$sta' where artist_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>

<?php
if (isset($_GET['btnAP'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $status = $_GET['status'];

        if ($status == 'pending') {
            $sta = 'approved';
        } else {
            $sta = 'approved';
        }
        $update = "update tbl_artist set artist_verification = '$sta' where artist_id = '$id'";
        mysqli_query($conn, $update);
//        header("location:arts_main_view_category.php");
    }
}
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Artist Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">View Artist Details</div>
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
                                                            <th>User Name</th>
                                                            <th>Artist Name</th>
                                                            <!--<th>Edit</th>-->
                                                            <th>Information</th>
                                                            <th>Status</th>
                                                            <th>Verification</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $q = "select * from tbl_artist";
                                                        $res = mysqli_query($conn, $q);
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            ?>
                                                            <tr align="center">	
                                                                <td><?php echo $i++ ?></td>
    <!--                                                                <td><?php //echo $row[0];            ?></td>-->
                                                                <td><?php echo $row[3] ?></td>
                                                                <td><?php echo $row[1] . " " . $row[2]; ?></td>
    <!--                                                                <td>
                                                                    <a href="#myAlert<?php //echo "a" . $i               ?>" data-toggle="modal" class="btn btn-primary">Edit</a>

                                                                    <div id="myAlert<?php //echo "a" . $i               ?>" class="modal hide">
                                                                        <form method="post">
                                                                            <div class="modal-header">
                                                                                <button data-dismiss="modal" class="close" type="button">&times;</button>
                                                                                <center><h3>Artist Details Update</h3></center>
                                                                            </div>
                                                                            <center>
                                                                                <table>


                                                                                    <div class="modal-body">
                                                                                        <tr><td>Artist Id :</td> <td><input type="text" name="txtArtistId" value="<?php // echo $row['sub_catid'];              ?>" readonly="true"></td></tr>
                                                                                        <tr><td>Artist First Name :</td><td> <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>Artist Last Name :</td><td> <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>E-mail Id :</td><td> <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>Contact Number :</td><td> <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>City : </td><td><select><option></option></select></td></tr>
                                                                                        <tr><td>Address :</td><td> <input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>Artist Interest : </td><td><input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                        <tr><td>About Me : </td><td><input type="text" name="txt_subcatname" value="<?php //echo $row['sub_catname']              ?>"></td></tr>
                                                                                    </div>
                                                                                </table>
                                                                            </center>
                                                                            <br/><br/>
                                                                            <div class="modal-footer">
                                                                                <a data-dismiss="modal" class="btn" href="#">Cancel</a>
                                                                                <center><input type="submit" name="btnUpdate" class="btn btn-primary" value="Update"></center>
                                                                            </div>
                                                                <?php
//                                                                            if (isset($_POST['btnUpdate'])) {
//                                                                                $afn = $_POST['txtArtistFname'];
//                                                                                $aln = $_POST['txtArtistLname'];
//                                                                                $aun = $_POST['txtArtistUname'];
//                                                                                $aeid = $_POST['txtArtistEmailid'];
//                                                                                $ap = $_POST['txtArtistPassword'];
//                                                                                $acno = $_POST['txtArtistContactno'];
//                                                                                $ac = $_POST['cit'];
//                                                                                $aadd = $_POST['txtArtistAddress'];
//                                                                                $adob = $_POST['datArtistDOB'];
//                                                                                $aq = $_POST['txtArtistQualification'];
//                                                                                $aai = $_POST['txtArtistArtinterest'];
//                                                                                $aam = $_POST['txtArtistAboutme'];
//
//                                                                                $q = "insert into tbl_artist values('','$afn','$aln','$aun','$ap','$aeid','$acno','$ac','$aadd','$adob','$aai','$aam','$aq')";
//                                                                                mysqli_query($conn, $q) or die("Artist Details Are Not Inserted..!!");
//                                                                            }
                                                                ?>
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
                                                                                    echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$row[11]  '/>";
                                                                                    //echo $temp . "<br>";
                                                                                    ?>
                                                                                    </center>
                                                                                </tr>
                                                                                <br/>
                                                                                <br/>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Artist First Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[1]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Artist Last Name
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
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Date Of Birth
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[7]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        City
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        $q = "select city_name from tbl_city where city_id=$row[8]";
                                                                                        $a = mysqli_query($conn, $q);
                                                                                        while ($row1 = mysqli_fetch_row($a)) {
                                                                                            $mcn = $row1[0];
                                                                                        }
                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Id Proof
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        //echo $row[11];
                                                                                        echo "<img width=300 height=300 class=\"img-circle\" src='../../client/$row[11]  '/>";
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Legal Name
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[13]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Street Address
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[14]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        State
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        $q = "select state_name from tbl_state where state_id=$row[15]";
                                                                                        $a = mysqli_query($conn, $q);
                                                                                        while ($row1 = mysqli_fetch_row($a)) {
                                                                                            $mcn = $row1[0];
                                                                                        }
                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Country
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php
                                                                                        $q = "select country_name from tbl_country where country_id=$row[16]";
                                                                                        $a = mysqli_query($conn, $q);
                                                                                        while ($row1 = mysqli_fetch_row($a)) {
                                                                                            $mcn = $row1[0];
                                                                                        }
                                                                                        echo $mcn;
                                                                                        ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Zip Code
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[17]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        About Me
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[18]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Education
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[19]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Google Plus Account
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[20]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Twitter Account
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[21]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Facebook Account
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[22]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Instagram Account
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[23]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Personal Website
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[24]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Status
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[25]; ?>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" style="font-weight: bold;">
                                                                                        Artist Verification
                                                                                    </td> 
                                                                                    <td align="center">
                                                                                        <?php echo $row[26]; ?>
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
                                                                    if ($row[25] == 'active') {
                                                                        ?>
                                                                        <a class="btn btn-success" href="artist_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[25] ?>&btnAD=1">Active</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-danger" href="artist_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[25] ?>&btnAD=1">De-active </a>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                    if ($row[26] == 'pending') {
                                                                        ?>
                                                                        <a class="btn btn-warning" href="artist_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[26] ?>&btnAP=1">Pending</a>
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <a class="btn btn-success" href="artist_view_details.php?id=<?php echo $row[0] ?>&status=<?php echo $row[26] ?>&btnAP=1">Approved</a>
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
