<?php
include ('../connection.php');
?>
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

<div class="blog">
    <div class="container">
        <!--        <a style="float: right;" class="btn btn-primary" href="blog.php">Back</a>-->
        <?php
        $e = $_GET['id'];
        $sel = "select * from tbl_blog where blog_id=$e";
        $res = mysqli_query($conn, $sel);
        while ($row = mysqli_fetch_row($res)) {
            ?>
            <div class="row">
                <div> 
                    <h2><?php echo $row[2]; ?><a style="float: right;" class="btn btn-primary" href="blog.php">Back</a></h2>
                    <br/>
                </div> 
            </div>  

            <div class="row">   

                <div class="card text-center">
                    <img class="card-img-top" src="<?php echo$row[4]; ?>" alt="" width="100%">
    <!--                    <h3>Title :<p><?php// echo$row[2]; ?></p></h3>-->
                    <h3><p>Date :<?php echo$row[5]; ?></p></h3>
                    <h3><p>Time :<?php echo$row[6]; ?></p></h3>
                    <h3>Description :</h3><br/><p style="text-align: left;"><?php echo$row[1]; ?></p>

                </div>
                <?php
            }
            ?>

            <!--            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" data-aos="fade-up">
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
                        </div>
            
                    </div>-->

        </div>
    </div>