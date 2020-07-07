<?php
include '../connection.php';
$q = "select count(*) from tbl_contact where status = 0";
$result = mysqli_query($conn, $q); 
    while ($r = mysqli_fetch_row($result)) {
        $cnt = $r[0];
    }

?>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand">Vision Art Gallery</a>
            <div class="nav-collapse collapse">
                <ul class="nav pull-right">
                    <li>
                        <a tabindex="-1" name="logout" href="../../admin1/logout.php">Logout</a>
                    </li>
                    </li>
                </ul>
                <?php
//                if(!empty($_POST['logout'])){
//                    include '../logout.php';
//                }
                ?>
                <ul class="nav">
                    <li class="active">
                        <a href="dashoboard.php">Dashboard</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Category<b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu">
                            <li>

                                <a href="arts_main_add_category.php">Add Category
                                </a>
                                <!--                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="arts_main_add_category.php">Add Category</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="arts_main_view_category.php">View Category</a>
                                                                    </li>
                                
                                                                </ul>-->
                            </li>



                            <li>
                                <a href="arts_main_view_category.php">View Category</a>
                                <!--                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <a href="arts_sub_add_category.php">Add Sub-Category</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="arts_sub_view_category.php">View Sub-Category</a>
                                                                    </li>
                                
                                                                </ul>-->
                            </li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Subject<i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="subject_add_details.php">Add Subject</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="subject_view_details.php">View Subject</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="artist_view_details.php" role="button" >Artists

                        </a>
                        <!--                        <ul class="dropdown-menu">
                                                    <li>
                                                        <a tabindex="-1" href="artist_add_details.php">Add Artist Details</a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="artist_view_details.php">View Artist Details</a>
                                                    </li>
                                                </ul>-->
                    </li>
                    <li>
                        <a href="customer_view_details.php" role="button">Customers

                        </a>
                        <!--                        <ul class="dropdown-menu">
                                                    <li>
                                                        <a tabindex="-1" href="customer_add_details.php">Add Customer Details</a>
                                                    </li>
                                                    <li>
                                                        <a tabindex="-1" href="customer_view_details.php">View Customer Details</a>
                                                    </li>
                                                </ul>-->

                    </li>




                                        <li class="dropdown">
                                            <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Blog<i class="caret"></i>
                    
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a tabindex="-1" href="blog_add_details.php">Add Blog Details</a>
                                                </li>
                                                <li>
                                                    <a tabindex="-1" href="blog.php">View Blog Details</a>
                                                </li>
                                            </ul>
                    
                                        </li>

                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Location<i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="location_add_details.php">Add Locations</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="location_view_details.php">View Locations</a>
                            </li>

                        </ul>

                    </li>

                    <li>
                        <a role="button" href="shop_view_details.php">Shop

                        </a>


                    </li>


                    <!--                    <li>
                                            <a role="button" href="auction_view_details.php">Auction
                    
                                            </a>
                                        </li>-->
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Gallery<i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="gallery_add_details.php">Add Gallery Details</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="gallery_view_details.php">View Gallery Details</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a  href="contact_view_details.php">
                            Inbox<?php echo "($cnt)"; ?>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
