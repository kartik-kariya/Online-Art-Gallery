<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include ('../connection.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Add Blog Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Blog Details</div>
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
                                        <label class="control-label">Blog Description<span class="required">*</span></label>
                                        <div class="controls">
                                            <textarea type="text" name="txtBlogDescription" data-required="1" class="span6 m-wrap" required></textarea>
                                        </div> <br/>
                                        <label class="control-label">Blog Title<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtBlogUserName" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Date<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="date" class="span6 m-wrap" name="date1"required/>
                                        </div><br/>
                                        <label class="control-label">Time<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="time" class="span6 m-wrap" name="time1" required/>
                                        </div><br/>
                                        <label class="control-label">Upload Image<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" class="span6 m-wrap" name="fileToUpload" id="fileToUpload" required/>
                                        </div><br/>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="btnAdd" class="btn btn-primary">Add</button>
                                        <?php
                                        if (isset($_POST['btnAdd'])) {
                                            $a = "active";
                                            $bd = $_POST['txtBlogDescription'];
                                            $bun = $_POST['txtBlogUserName'];
                                            $bdate = $_POST['date1'];
                                            $btime = $_POST['time1'];
                                            $target_dir = "../../client/";
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
                                                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                                    echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                                                } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                }
                                            }
                                            $q = mysqli_query($conn, "insert into tbl_blog values('','$bd', '$bun', '$a', '$target_file',' $bdate',' $btime')");
                                      //      echo "<br/>" . "Error:-" . $q . "<br/>" . mysqli_error($conn) . "<br/>";
//                                            $q->bind_param("ssssss", $bd, $bun, $a, $target_file, $bdate, $btime);
//                                            $q->execute();
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
