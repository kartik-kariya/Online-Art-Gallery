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
<!DOCTYPE html>
<html>

    <head>
        <title>Add Customer Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Customer Details</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" class="form-horizontal" enctype="multipart/form-data" method="post">
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
                                        <label class="control-label">First Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtFname" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Last Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtLname" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">User Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtUname" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">E-mail Id<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtEmailid" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Password<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="password" name="txtPass" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Contact Number<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtContactno" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">City<span class="required">*</span></label>
                                        <div class="controls">
                                            <select  name="cit" data-required="1" class="span6 m-wrap" required>
                                                <?php
                                                $q1 = $conn->query("Select * from tbl_city;");
                                                while ($k = $q1->fetch_row()) {
                                                    echo "<option value='$k[0]'>$k[1]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><br/>
                                        <label class="control-label">Address<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtAddress" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Date Of Birth<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="date" name="datDob" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Favorites<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtFav" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Upload Image<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" id="fileToUpload" name="fileToUpload"  required/>
                                        </div><br/>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                                        <?php
                                        if (isset($_POST['btnAdd'])) {
                                            $cfn = $_POST['txtFname'];
                                            $cln = $_POST['txtLname'];
                                            $cun = $_POST['txtUname'];
                                            $ceid = $_POST['txtEmailid'];
                                            $cp = $_POST['txtPass'];
                                            $ccno = $_POST['txtContactno'];
                                            $cc = $_POST['cit'];
                                            $cadd = $_POST['txtAddress'];
                                            $cdob = $_POST['datDob'];
                                            $cf = $_POST['txtFav'];
                                            $cstatus = "active";
                                           $target_dir = "./images/";
                                            $target_file = $target_dir .substr(md5(time()),0,8)."-". basename($_FILES["fileToUpload"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
                                            if (isset($_POST["submit"])) {
                                                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                if ($check !== false) {
                                                    echo "File is an image - " . $check["mime"] . ".";
                                                    $uploadOk = 1;
                                                } else {
                                                    echo "File is not an image.";
                                                    $uploadOk = 0;
                                                }
                                            }
// Check if file already exists
                                            if (file_exists($target_file)) {
                                                echo "Sorry, file already exists.";
                                                $uploadOk = 0;
                                            }
// Check file size
                                            if ($_FILES["fileToUpload"]["size"] > 500000) {
                                                echo "Sorry, your file is too large.";
                                                $uploadOk = 0;
                                            }
// Allow certain file formats
                                            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                                                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                                                $uploadOk = 0;
                                            }
// Check if $uploadOk is set to 0 by an error
                                            if ($uploadOk == 0) {
                                                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                                            } else {
                                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                                                } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                }
                                            }
                                            $q = $conn->prepare("insert into tbl_customer (customer_fname,customer_lname,customer_username,customer_emailid,customer_password,customer_contactno,city_id,customer_address,customer_dob,customer_favorites,customer_status,customer_image) values(?,?,?,?,?,?,?,?,?,?,?,?)");
                                            $q->bind_param("ssssssisssss",$cfn,$cln,$cun,$ceid,$cp,$ccno,$cc,$cadd,$cdob,$cf,$cstatus,$target_file);
                                            $q->execute();
                                        }
                                        ?>
                                        <button type="reset" class="btn">Cancel</button>
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