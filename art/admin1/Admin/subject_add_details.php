<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('link.php');
include('top_header.php');
include('left_menu.php');
include('../connection.php');
?>
<?php

function myFunction() {
    echo "<script> alert('Subject Added Successfully..!!') </script>";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Subject</title>      
        <?php include('link.php'); ?>
    </head>
    <body>
        <div class="span9" id="content">
            <!-- morris stacked chart -->
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Subject</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form class="form-horizontal" method="post">
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
                                        <label class="control-label">Subject Name<span class="required">*</span></label>
                                        <div class="controls">
                                            <input type="text" name="txtAddSubject" data-required="1" class="span6 m-wrap" required/>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" name="btnAdd" value="Add" class="btn btn-primary"/>
                                        <?php
                                        if (isset($_POST['btnAdd'])) {
                                            if (!empty($_POST['txtAddSubject'])) {
                                                $a = "active";
                                                $nm = $_POST['txtAddSubject'];
                                                //myFunction();
                                            }
                                            $q = $conn->prepare("insert into tbl_subject (subject_name,subject_status) values(?,?)");
                                            $q->bind_param("ss", $nm, $a);
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
    </body>
</html>
<?php
include('footer.php');
include('js_link.php');
?>