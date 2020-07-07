<?php
ob_start();
session_start();

if (empty($_SESSION['signin_username'])) {
    header("Location: signin.php");
}
?>

<?php
include_once '../connection.php';

//echo $_SESSION['artfile'];
//echo "<br>".$_SESSION['arttitle'];

$cat = "select * from tbl_category where category_status='active';";
$cateoryres = mysqli_query($connection, $cat);

$subject = "select * from tbl_subject where subject_status='active';";
$subjectres = mysqli_query($connection, $subject);
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

        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/plugins/jquery-3.2.1.min.js" type="text/javascript"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <script src="js/sweetalert.min.js" type="text/javascript"></script>

        <link rel="stylesheet" type="text/css" href="css/main.css">

        <style>
            label{
                font-family: serif;
                font-size: 25px;
            }

            /*PROGRESS BAR*/
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

            /*IMAGE RADIO BUTTON*/
            .btn-radio {
                width: 100%;
            }
            .img-radio {
                opacity: 0.5;
                margin-bottom: 5px;
            }

            .space-20 {
                margin-top: 20px;
            }    </style>

<!--        <script type="text/javascript">
            function addText()
            {
                var id = document.getElementById("addcategory");
                id.innerHTML += "<input type='text' class='input100' name='arttags[]' style='width: 50%;'/><br>";
            }
        </script>-->
        <!--ADD TAGS-->
        <script>

    //        PROGERSS BAR
            $(document).ready(function () {
                $('.progress .progress-bar').css("width",
                        function () {
                            return $(this).attr("aria-valuenow") + "%";
                        }
                )
            });

    //        IMAGE RADIO BUTTON
            $(function () {
                $('.btn-radio').click(function (e) {
                    $('.btn-radio').not(this).removeClass('active')
                            .siblings('input').prop('checked', false)
                            .siblings('.img-radio').css('opacity', '0.5');
                    $(this).addClass('active')
                            .siblings('input').prop('checked', true)
                            .siblings('.img-radio').css('opacity', '1');
                });
            });</script>
    </head>
    <body>
        <?php
        include('./artist_header.php');
        ?>

        <!--subheader-->
        <!--end subheader-->

        <!--titleblock section-->
        <form method='post' enctype="multipart/form-data">
            <div style="margin-top: 7.5em;">
                <hr>
                <center>
                    <h1 style="font-size:60px;color: #542c6b;font-family: serif;">Upload Arts</h1> 
                </center>

                <hr>
                <center>
                    <div class="progress skill-bar " style="width:80%;">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="15" style="background-color:#755588">
                            <span class="skill"><i class="val">15%</i></span>
                        </div>
                    </div>
                </center>

                <hr>

                <div class="container-fluid">
                    <center>
                        <label>Subject</label>    
                        <div class="wrap-input100">                
                            <select name="subject" class="input100" style="width: 50%;">
                                <?php
                                while ($r = mysqli_fetch_assoc($subjectres)) {
                                    ?>
                                    <option value="<?php echo $r['subject_name'] ?>"><?php echo $r['subject_name'] ?></option>
                                <?php }
                                ?>
                            </select>
                            <span class="focus-input100" style="width: 50%;margin-left:25%;"></span>
                        </div>
                    </center>

                    <hr>

                    <center>
                        <label>Category</label>    
                        <br/>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="row">
                                    <?php
                                    while ($r = mysqli_fetch_assoc($cateoryres)) {
                                        ?>
                                        <div class="col-xs-4">

                                            <img src="<?php echo $r['category_image'] ?>" alt="Image Not Found" style="height: 10em;" class="img-responsive img-radio">
                                            <button type="button" class="btn btn-light btn-radio" style="opacity: 0.5px"><?php echo $r['category_name'] ?></button>
                                            <input type="radio" name="category" value="<?php echo $r['category_name'] ?>" id="left-item" class="hidden">  
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <!--                            <div class="row space-20"></div>    
                                                            <div class="row">
                                                                <div class="col-xs-4">
                                                                    <img src="arts_files/Arts_Gallery/ws_Parrot_Painting_2560x1600.jpg" style="height: 10em;" class="img-responsive img-radio">
                                                                    <button type="button" class="btn btn-primary btn-radio">Left</button>
                                                                    <input type="checkbox" id="left-item" class="hidden">
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <img src="arts_files/Arts_Gallery/source.gif" style="height: 10em;" class="img-responsive img-radio">
                                                                    <button type="button" class="btn btn-primary btn-radio">Left</button>
                                                                    <input type="checkbox" id="left-item" class="hidden">
                                                                </div>
                                                                <div class="col-xs-4">
                                                                    <img src="arts_files/Arts_Gallery/paintings-art-clipart-hd-widescreen-8.jpg" style="height: 10em;" class="img-responsive img-radio">
                                                                    <button type="button" class="btn btn-primary btn-radio">Left</button>
                                                                    <input type="checkbox" id="left-item" class="hidden">
                                                                </div>
                                                            </div>-->
                            </div>
                        </div>
                    </center>
                </div>

                <hr>
                <hr>
                <div class="container-login100-form-btn">
                    <input type="submit" name="btn_previous" class="login100-form-btn"  value="Previous" style="width: 12em" formaction="artist_uploadarts.php"/>
                    &nbsp;&nbsp;
                    <input type="submit" name="btn_next" class="login100-form-btn"  value="Next" style="width: 12em"/>
                </div>
                <hr>
                <hr>
            </div>
            <?php
            if (isset($_POST['btn_next'])) {
                $subject = $category = "";

                $subject = ucwords($_POST['subject']);
                $category = ucwords($_POST['category']);

                if (!empty($category)) {
                    $_SESSION['category'] = $category;
                    $_SESSION['subject'] = $subject;
                    header("Location: artist_uploadarts-3.php");
//                    echo $_SESSION['category'];
//                    echo "<br>".$_SESSION['subject'];
                } else {
                    echo "<script>swal('Opps.!', 'Empty Fields Are Not Allowed.!', 'error');</script>";
                }
            }
            
            ob_flush();
            ?>
        </form>
    </body>
</html>
