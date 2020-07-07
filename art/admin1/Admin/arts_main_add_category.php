<?php
session_start();
if(empty($_SESSION['username']))
{
    header("location:login.php");
}
ob_start();
include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
?>
<?php

function myFunction() {
    echo "<script> alert('Main Category Added Successfully..!!') </script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Category</title>      
        <?php include('link.php'); ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Category</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
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
                                        <label class="control-label">Category Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtAddMainCategory" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Upload Image<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" name="fileToUpload" class="span6 m-wrap" id="fileToUpload" required/>
                                        </div><br/>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="btnAdd" value="Add" class="btn btn-primary"/>
                                        <button type="reset" class="btn">Cancel</button>
                                    </div>

                                    <?php
                                    if (isset($_POST['btnAdd'])) {
                                        if (!empty($_POST['txtAddMainCategory']) && !empty($_FILES['fileToUpload']['name'])) {
                                            $a = "active";
                                            $nm = $_POST['txtAddMainCategory'];
                                            $target_dir = "./arts_files/Arts_Category/";
                                            $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["fileToUpload"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
                                            if (isset($_POST["btnAdd"])) {
                                                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                                                if ($check !== false) {
                                                    //echo "File is an image - " . $check["mime"] . ".";
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
                                            if ($_FILES["fileToUpload"]["size"] > 10000000000) {
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
                                                //echo "<br>" . $_FILES['fileToUpload']['tmp_name'];
                                                //echo "<br> target" . $target_file;
                                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../../client/".$target_file)) {
                                                    //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                                                } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                }
                                            }
                                            //  myFunction();
                                        }
                                        $q = $conn->prepare("insert into tbl_category (category_name,category_image,category_status) values(?,?,?)");
                                        $q->bind_param("sss", $nm, $target_file, $a);
                                        $q->execute();
                                    }
                                    ?>
                                </fieldset>
                            </form>
                            <?php
                            include('footer.php');
                            include('js_link.php');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?php ob_flush(); ?>