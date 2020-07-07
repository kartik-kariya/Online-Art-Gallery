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
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Gallery Details</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="#" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <fieldset>

                                    <!--                                    <div class="alert alert-success">
                                                                            <button class="close" data-dismiss="alert"></button>
                                    
                                                                        </div>
                                    
                                                                        <div class="alert alert-success hide">
                                                                            <button class="close" data-dismiss="alert"></button>
                                                                            Your form validation is successful!
                                                                        </div>-->
                                    <div class="control-group">
                                        <label class="control-label">Gallery Image<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="span6 m-wrap" required/>
                                        </div><br/>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="btnAdd" onclick="myFunction()" class="btn btn-primary">Add</button>
                                        <?php
                                        if (isset($_POST['btnAdd'])) {
                                            $target_dir = "./arts_files/Arts_Gallery/";
                                            $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["fileToUpload"]["name"]);
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
                                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../../client".$target_file)) {
                                                    //echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                                                } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                }
                                            }

                                            $astatus = "active";



                                            $q = $conn->prepare("insert into tbl_artsgallery (file,status) values(?,?)");
                                            $q->bind_param("ss", $target_file, $astatus);
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
            // put your code here
            ?>
    </body>
</html>
<?php
include('footer.php');
include('js_link.php');
?>