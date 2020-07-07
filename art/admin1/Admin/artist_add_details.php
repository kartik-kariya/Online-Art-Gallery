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
        <title>Add Artist Details</title>
        <?php include('link.php') ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Artist Details</div>
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
                                        <label class="control-label">First Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistFname" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Last Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistLname" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">User Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistUname" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">Password<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="password" name="txtArtistPassword" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">E-mail Id<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistEmailid" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Contact Number<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistContactno" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Date Of Birth<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="date" name="datArtistDOB" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">City<span class="required">*</span></label>
                                        <div class="controls">
                                            <select  name="cit" data-required="1" class="span6 m-wrap" required>
                                                <?php
                                                $q1 = $conn->query("Select * from tbl_city");
                                                while ($k = $q1->fetch_row()) {
                                                    echo "<option value='$k[0]'>$k[1]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><br/>
                                        <label class="control-label">Qrcode<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistQrcode" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Profile Image<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" name="fileToUpload" id="fileToUpload" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Id Proof<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="file" name="fileToUpload1" id="fileToUpload" required/>
                                        </div><br/>
                                        <label class="control-label">Legal Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistLegalName" data-required="1" class="span6 m-wrap" required/>
                                        </div> <br/>
                                        <label class="control-label">Street Address<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistStreetAddress" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">State<span class="required">*</span></label>
                                        <div class="controls">
                                            <select  name="state" data-required="1" class="span6 m-wrap" required>
                                                <?php
                                                $q1 = $conn->query("Select * from tbl_state");
                                                while ($k = $q1->fetch_row()) {
                                                    echo "<option value='$k[0]'>$k[1]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><br/>
                                        <label class="control-label">Country<span class="required">*</span></label>
                                        <div class="controls">
                                            <select  name="country" data-required="1" class="span6 m-wrap" required>
                                                <?php
                                                $q1 = $conn->query("Select * from tbl_country");
                                                while ($k = $q1->fetch_row()) {
                                                    echo "<option value='$k[0]'>$k[1]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div><br/>
                                        <label class="control-label">Zipcode<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistZipcode" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">About Me<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistAboutme" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Qualifications<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistQualification" data-required="1" class="span6 m-wrap" required/>
                                        </div><br/>
                                        <label class="control-label">Google Plus Account</label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistGPA" class="span6 m-wrap"/>
                                        </div><br/>
                                        <label class="control-label">Twitter Account</label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistTA" class="span6 m-wrap"/>
                                        </div><br/>
                                        <label class="control-label">Facebook Account</label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistFBA" class="span6 m-wrap"/>
                                        </div><br/>
                                        <label class="control-label">Instagram Account</label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistINA" class="span6 m-wrap"/>
                                        </div><br/>
                                        <label class="control-label">Personal Website Link</label>
                                        <div class="controls">
                                            <input type="text" name="txtArtistWEB" class="span6 m-wrap"/>
                                        </div><br/>
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" name="btnAdd" onclick="myFunction()" class="btn btn-primary">Add</button>
                                        <?php
                                        if (isset($_POST['btnAdd'])) {
                                            $afn = $_POST['txtArtistFname'];
                                            $aln = $_POST['txtArtistLname'];
                                            $aun = $_POST['txtArtistUname'];
                                            $ap = $_POST['txtArtistPassword'];
                                            $aeid = $_POST['txtArtistEmailid'];
                                            $acno = $_POST['txtArtistContactno'];
                                            $adob = $_POST['datArtistDOB'];
                                            $ac = $_POST['cit'];
                                            $aqr = $_POST['txtArtistQrcode'];
                                            $target_dir = "./images/";
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
                                            $target_dir = "./images/";
                                            $target_file1 = $target_dir . substr(md5(time()), 0, 8) . "-" . basename($_FILES["fileToUpload1"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
                                            if (isset($_POST["submit"])) {
                                                $check = getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
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
                                            if ($_FILES["fileToUpload1"]["size"] > 10000000000) {
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
                                                if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                                                    echo "The file " . basename($_FILES["fileToUpload1"]["name"]) . " has been uploaded.";
                                                } else {
                                                    echo "Sorry, there was an error uploading your file.";
                                                }
                                            }
                                            $alename = $_POST['txtArtistLegalName'];
                                            $astradd = $_POST['txtArtistStreetAddress'];
                                            $astate = $_POST['state'];
                                            $acountry = $_POST['country'];
                                            $azip = $_POST['txtArtistZipcode'];
                                            $aam = $_POST['txtArtistAboutme'];
                                            $aq = $_POST['txtArtistQualification'];
                                            $agpa = $_POST['txtArtistGPA'];
                                            $ata = $_POST['txtArtistTA'];
                                            $fba = $_POST['txtArtistFBA'];
                                            $aina = $_POST['txtArtistINA'];
                                            $aweb = $_POST['txtArtistWEB'];
                                            $astatus = "active";
                                            $averification = "pending";


                                            $q = $conn->prepare("insert into tbl_artist (artist_firstname,artist_lastname,artist_username,artist_password,artist_email,artist_contactnumber,artist_dob,artist_city,artist_qrcode,artist_profileimage,artist_idproof,artist_legalname,artist_streetaddress,artist_state,artist_country,artist_zipcode,artist_about,artist_education,artist_googleplus,artist_twitter,artist_facebook,artist_instagram,artist_website,artist_status,artist_verification) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                                            $q->bind_param("sssssssssssssssisssssssss", $afn, $aln, $aun, $ap, $aeid, $acno, $adob, $ac, $aqr, $target_file, $target_file1, $alename, $astradd, $astate, $acountry, $azip, $aam, $aq, $agpa, $ata, $afba, $aina, $aweb, $astatus, $averification);
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
