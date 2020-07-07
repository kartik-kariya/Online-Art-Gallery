<?php
ob_start();
session_start();

if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../connection.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Upload Arts</title>
        <link rel="shortcut icon" type="image/x-icon" href="Images/Artboard 1.png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>    

        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/sweetalert.min.js" type="text/javascript"></script>

        <style>
            label{
                font-family: serif;
                font-size: 25px;
            }
            .progress {
                height: 30px;
            }
            .progress .skill {
                font: normal 12px "Open Sans Web";
                line-height: 35px;
                padding: 0;
                margin: 0 0 0 20px;
                text-transform: uppercase;
            }
            .progress .skill .val {
                float: right;
                font-style: normal;
                margin: 0 20px 0 0;
            }

            .progress-bar {
                text-align: left;
                transition-duration: 3s;
            }
        </style>

<!--        <script type="text/javascript">
            function addText()
            {
                var id = document.getElementById("addcategory");
                id.innerHTML += "<input type='text' class='input100' name='arttags[]' style='width: 50%;'/><br>";
            }
        </script>-->

        <script>
            //        ADD TAGS
            $(document).ready(function () {
                var maxField = 6; //Input fields increment limitation
                var addButton = $('.add_a_button'); //Add button selector
                var wrapper = $('.addtags'); //Input field wrapper
                var fieldHTML = '<input class="input100" type="text" name="arttags[]" style="width: 50%;"><br>'; //New input field html 
                var x = 1; //Initial field counter is 1
                $(addButton).click(function () { //Once add button is clicked
                    if (x < maxField) { //Check maximum number of input fields
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); // Add field html

                    }
                });
                $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
                    e.preventDefault();
                    $(this).parent('form-group').remove(); //Remove field html
                    x--; //Decrement field counter
                });

            });

            //        PROGERSS BAR
            $(document).ready(function () {
                $('.progress .progress-bar').css("width",
                        function () {
                            return $(this).attr("aria-valuenow") + "%";
                        }
                )
            });

        </script>

    </head>
    <body>
        <?php
        include('./artist_header.php');
        ?>

        <!--subheader-->
        <div class="ag-mask">
            <div class="skew-mask">
            </div>
        </div>
        <!--end subheader-->

        <!--titleblock section-->
        <div style="margin-top: 7.5em;">
            <hr>
            <center>
                <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Upload Arts</h1> 
            </center>

            <hr>

            <center>
                <div class="progress skill-bar " style="width:80%;">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="1" style="background-color:#755588">
                        <span class="skill"><i class="val">1%</i></span>
                    </div>
                </div>
            </center>

            <div>
                <form method='post' enctype="multipart/form-data">
                    <hr>
                    <center>
                        <!--                        <label>Enter Title</label>
                                                <div class="wrap-input100">
                                                    <input class="input100" type="text" name="arttitle" style="width: 50%;">
                                                    <span class="focus-input100" style="width: 50%;margin-left:25%; "></span>
                                                </div>
                        
                                                <hr>
                        
                                                <label>Enter File</label>
                                                <div class="wrap-input100">
                                                    <input class="input100" type="file" name="artfile" style="width: 50%;">
                                                    <span class="focus-input100" style="width: 50%;margin-left:25%; "></span>
                                                </div>
                        
                                                <hr>
                        
                                                <label>Enter Description</label>
                                                <div class="wrap-input100">
                                                    <textarea class="input100" name="artdescription" style="width: 50%;"></textarea>
                                                    <span class="focus-input100" style="width: 50%;margin-left:25%; "></span>
                                                </div>
                        
                                                <hr>
                        
                                                <label>Enter Category</label>
                                                <div class="wrap-input100">
                                                    <input class="input100" type="text" name="artcategory" style="width: 50%;">
                                                    <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>                                
                                                </div>
                        
                                                <hr>
                        
                                                <label>Enter Tags</label>
                                                <div class="addtags">
                                                    <div class="wrap-input100">
                                                        <div>
                                                            <a href="javascript:void(0);" class="add_a_button btn login100-form-btn" title="Add field" style="width: 10em; color: #fff;"><span class="fa fa-plus-circle fa-1x btn-glyphicon"> Add Tags</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <hr>
                        
                                                <label>Mode&nbsp; Of&nbsp; Upload</label><br>                        
                                                <div class="wrap-input100"> 
                                                    <input type="radio" name="modeofupload" value="shop"/>
                                                    <span style="font-family: serif;font-size: 20px;"> Shop </span>
                                                    &nbsp;&nbsp;/&nbsp;&nbsp;
                                                    <input type="radio" name="modeofupload" value="auction"/>
                                                    <span style="font-family: serif;font-size: 20px;"> Auction </span>
                                                    <span style="font-family: serif;font-size: 13px;"> [optional] </span>
                                                    <p style="font-family: serif;font-size: 17px;font-weight: bold;"> [Note : Admin Can Upload Your Arts Into Arts_Gallery.] </p>
                                                </div>
                        
                                                <hr>-->
                        <label>Enter File</label>
                        <div class="wrap-input100">
                            <input class="input100" type="file" name="artfile" id="artfile" value="<?php echo $_SESSION['artfile'] ?>" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%; "></span>
                        </div>                    


                        <hr>
                        <img src="" id="artimage" width="300px" />
                        <hr>
                        <script type="text/javascript">
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#artimage').attr('src', e.target.result);
                                    }
                                    reader.readAsDataURL(input.files[0]);
                                }
                            }
                            $("#artfile").change(function () {
                                readURL(this);
                            });
                        </script>  
                    </center>
                    <center>
                        <label>Title</label>
                        <div class="wrap-input100">
                            <input type="text" name="arttitle" class="input100" style="width: 50%;">
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                    </center>
                    <hr>
                    <hr>
                    <div class="container-login100-form-btn">
                        <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em" />
                    </div>
            </div>
            <hr>
            <hr>
            <br>

            <?php
            if (isset($_POST['btn_next'])) {
                if (!empty($_FILES['artfile']['name']) && $_POST['arttitle']) {
                    $arttitle = $_POST['arttitle'];
                    $_SESSION['arttitle'] = $arttitle;

                    $userdir = "./arts_files/Artist/" . $_SESSION['signin_username'] . "/";
                    if (!is_dir($userdir)) {
                        mkdir($userdir);
                    }
                    $shopdir = "";
                    $shopdir = $userdir . "Shop/";
                    if (!is_dir($shopdir)) {
                        mkdir($shopdir);
                    }
                    $target_dir = $shopdir . $arttitle . "/";
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir);
                    }

                    $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["artfile"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                    if (isset($_POST["btn_next"])) {

                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["artfile"]["tmp_name"]);
                        if ($check !== false) {
                            //echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "<script type='text/javascript'>alert('File is not an image.')</script>";
                            //echo "File is not an image.";                                
                            $uploadOk = 0;
                        }

                        // Check if file already exists
                        if (file_exists($target_file)) {
                            echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
                            //echo "Sorry, file already exists.";
                            $uploadOk = 0;
                        }

                        // Check file size
                        if ($_FILES["artfile"]["size"] > 100000000) {
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
                            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.Try Again.')</script>";
                            //echo "Sorry, your file was not uploaded.";
                        }
                        // if everything is ok, try to upload file
                        else {
                            if (move_uploaded_file($_FILES["artfile"]["tmp_name"], $target_file)) {
                                $_SESSION['artfile'] = $target_file;
                                $_SESSION['arttitle'] = $arttitle;

                                header("Location: artist_uploadarts-2.php");

                                //echo $_SESSION['artfile'];
                                //echo "The file " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
                            } else {
                                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.Try Again.')</script>";
                                //echo "Sorry, there was an error uploading your file.";
                            }
                            $img = $target_dir . basename($_FILES["artfile"]["name"]);
                            echo $img;
                        }
                    }
                } else {
                    echo "<script>swal('Opps.!', 'Empty Fields Are Not Allowed.!', 'error');</script>";
                }
            }
            ?>

            <?php
//        if (isset($_POST['btn_next']) && !empty($_POST['btn_next'])) {
//            //$_SESSION['subject'] = $_POST['subject'];
//        }
//                            if (!empty($_POST['arttitle']) && !empty($_POST['artdescription']) && !empty($_POST['artcategory'])) {
//                                $arttile = $artfile = $artdescription = $artcategory = $modeofupload = $target_file = "";
//                                $arttile = $_POST['arttitle'];
//                                $artfile = $_FILES['artfile'];
//                                $artdescription = $_POST['artdescription'];
//                                $artcategory = $_POST['artcategory'];
//                                if (!isset($_POST['modeofupload'])) {
//                                    echo "<script type='text/javascript'>alert('You Must Have To Select One Mode Of Upload...')</script>";
//                                } else {
//
//                                    $modeofupload = $_POST['modeofupload'];
//                                    //echo $modeofupload;
//                                    if (!empty($_POST['arttags'])) {
//                                        $tags = implode("'&&'", $_POST['arttags']);
//                                        //echo $tags;
//                                    } else {
//                                        $tags = "";
//                                        //echo "else...";   
//                                    }
//
//                                    date_default_timezone_set("Asia/Kolkata");
//                                    $date = $time = "";
//                                    $date = date('d-m-Y');
//                                    $time = date('g:i a');
//
//                                    if (!empty($_FILES["artfile"])) {
//                                        //echo "1";
//
//                                        if (strpos($modeofupload, "shop") !== false) {
//                                            $userdir = "./arts_files/Shop/" . "john100" . "/";
//
//                                            if (!is_dir($userdir)) {
//                                                mkdir($userdir);
//                                            }
//                                            $target_dir = $userdir . $arttile . "/";
//                                        } else if (strpos($modeofupload, "auction") !== false) {
//                                            $userdir = "./arts_files/Auction/" . "john000" . "/";
//
//                                            if (!is_dir($userdir)) {
//                                                mkdir($userdir);
//                                            }
//                                            $target_dir = $userdir . $arttile . "/";
//                                        } else {
//                                            
//                                        }
//
//                                        if (!is_dir($target_dir)) {
//                                            mkdir($target_dir);
//                                        }
//                                        
//                                        $target_file = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["artfile"]["name"]);
//                                        $uploadOk = 1;
//                                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//
//                                        if (isset($_POST["btn_signup"])) {
//// Check if image file is a actual image or fake image
//                                            $check = getimagesize($_FILES["artfile"]["tmp_name"]);
//                                            if ($check !== false) {
//                                                //echo "File is an image - " . $check["mime"] . ".";
//                                                $uploadOk = 1;
//                                            } else {
//                                                echo "<script type='text/javascript'>alert('File is not an image.')</script>";
//                                                //echo "File is not an image.";                                
//                                                $uploadOk = 0;
//                                            }
//                                        }
//// Check if file already exists
//                                        if (file_exists($target_file)) {
//                                            echo "<script type='text/javascript'>alert('Sorry, file already exists.')</script>";
//                                            //echo "Sorry, file already exists.";
//                                            $uploadOk = 0;
//                                        }
//// Check file size
//                                        if ($_FILES["artfile"]["size"] > 100000000) {
//                                            echo "<script type='text/javascript'>alert('Sorry, your file is too large.')</script>";
//                                            //echo "Sorry, your file is too large.";
//                                            $uploadOk = 0;
//                                        }
//// Allow certain file formats
//                                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
//                                            echo "<script type='text/javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
//                                            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//                                            $uploadOk = 0;
//                                        }
//// Check if $uploadOk is set to 0 by an error
//                                        if ($uploadOk == 0) {
//                                            echo "<script type='text/javascript'>alert('Sorry, your file was not uploaded.')</script>";
//                                            //echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
//                                        } else {
//                                            if (move_uploaded_file($_FILES["artfile"]["tmp_name"], $target_file)) {
//                                                //echo "The file " . basename($_FILES["ProfileImage"]["name"]) . " has been uploaded.";
//                                            } else {
//                                                echo "<script type='text/javascript'>alert('Sorry, there was an error uploading your file.')</script>";
//                                                //echo "Sorry, there was an error uploading your file.";
//                                            }
//
//                                            echo "";
//                                            $img = $target_dir . basename($_FILES["artfile"]["name"]);
//                                        }
//                                    } else {
//                                        echo "else";
//                                    }
//
//                                    $insert = $connection->prepare("INSERT INTO tbl_arts(title , file , description , category , date , time , mode_of_upload , tags) VALUES(?,?,?,?,?,?,?,?)");
//                                    $insert->bind_param("ssssssss", $arttile, $img, $artdescription, $artcategory, $date, $time, $modeofupload, $tags);
//                                    $insert->execute();
//
//                                    if (strpos($modeofupload, "shop") !== false) {
//                                        header("Location: http://php.fun/art/client/artist_uploadarts_shop.php");
//                                    } else {
//                                    }
//                                }
//                            } else {
//                                echo "<script type='text/javascript'>alert('Empty Fields Are Not Allowed...')</script>";
//                            }
            ?>

            <br><br>
            <?php ob_flush(); ?>
            </form>
        </div>
    </body>
</html>
