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
        <title>Change image on select new image from file input</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>    </head>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="profile-img">
            <br>
            <img src="" id="profile-img-tag" width="500px" />
            <input type="submit" name="btn_submit" value="NEXT" />
        </form>

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile-img").change(function () {
                readURL(this);
            });
        </script>  
        <?php
        if (isset($_POST['btn_submit'])) {
            if (!empty($_FILES['file'])) {
                $target_dir = "./arts_files/upload/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir);
                }
                $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (isset($_POST["btn_signup"])) {
// Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["file"]["tmp_name"]);
                    if ($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "<script type='text/javascript'>alert('File is not an image.')</script>";
                        //echo "File is not an image.";                                
                        $uploadOk = 0;
                    }
                }
// Check if file already exists
                if (file_exists($target_file)) {
                    echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
                    //echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
// Check file size
                if ($_FILES["file"]["size"] > 10000000) {
                    echo "<script type='text/javascript'>alert('Sorry, your file is too large.')</script>";
                    //echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
// Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
                    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.')</script>";
                    //echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        //echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                    } else {
                        echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
                        //echo "Sorry, there was an error uploading your file.";
                    }
                }
            } else {
                $target_file = "";
            }
        }
        ?>
    </body>
</html>
