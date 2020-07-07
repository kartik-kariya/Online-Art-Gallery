<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php");
}
include('../connection.php');
//include('link.php');
include('top_header.php');
//include('left_menu.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <title>View Blog Details</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <!--
            youtube:  https://www.youtube.com/channel/UCqlv40k1N0L9nsSrzL1OWwg/videos
            site:     http://www.templateindirr.com
        -->

        <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet"> 
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

        <?php include('link.php') ?>
    </head>
    <body>

        <div class="blog">
            <div class="container">
                <a style="float: right;" class="btn btn-primary" href="dashoboard.php">Back To Dashboard</a>
                <br/>
                <center>
                    <div class="row">
                        <h2><span class="ion-minus"></span>Blog Posts<span class="ion-minus"></span></h2>

                        <br/>
                    </div>  
                </center>

                <div class="row">

                    <?php
                    $sel = "select * from tbl_blog";
                    $res = mysqli_query($conn, $sel);
                    while ($row = mysqli_fetch_row($res)) {
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="card text-center">
                                <img class="card-img-top" src="<?php echo $row[4]; ?>" alt="" width="100%">
                                <div class="card-block">
                                    <h4 class="card-title"><?php echo $row[2]; ?></h4>
                                    <a class="btn btn-info" href="readmore.php?id=<?php echo $row[0]; ?>">view</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                    <!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
                                            <div class="card text-center">
                                                <img class="card-img-top" src="https://images.pexels.com/photos/129105/pexels-photo-129105.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                                                <div class="card-block">
                                                    <h4 class="card-title">Post Title</h4>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                                                    <a class="btn btn-default" href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-left">
                                            <div class="card text-center">
                                                <img class="card-img-top" src="https://images.pexels.com/photos/129441/pexels-photo-129441.jpeg?h=350&auto=compress&cs=tinysrgb" alt="" width="100%">
                                                <div class="card-block">
                                                    <h4 class="card-title">Post Title</h4>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                                                    <a class="btn btn-default" href="#">Read More</a>
                                                </div>
                                            </div>
                                        </div>-->

                </div>

            </div>
        </div>
    <center>
        <?php
        include('footer.php');
//include('js_link.php');
        ?>
    </center>
</body>
</html>