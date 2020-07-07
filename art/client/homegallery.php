<?php  include  '../connection.php';?>
<section class="sidermargins pb-160 sec-portfolio"  style="margin-bottom: 0;padding-bottom: 0;">
    <div class="container large-container large-container_grid">
        <div class="row">
            <div class="grid ag-gridGallery-jstrigger " data-isotope='{ "itemSelector": ".grid-item", "layoutMode": "fitRows" }'>
                <?php

               
                $q = "select * from tbl_artsgallery where status='active' limit 4";
                $result = mysqli_query($connection, $q);

                while ($r = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="row" >
                        <div class="grid-item grid-item--width2 gallery-item ">
                            <div class="grid-item-wrapper wow rollIn">
                                <a class='portfolio-link'  href='<?php echo $r['file'] ?>'></a>
                                <?php //echo"<a class='portfolio-link'  href='{$r['file']}'></a>";?>
                                
                                <div class="ag-gridGallery__img-container">
                                    <img src='<?php echo $r['file'] ?>' alt="Image Not Found..." style="height: 400px;"/>
                                    <?php //echo "<img src='{$r['file']}'  alt title='portfolio1' style='background-size: auto'>" ?>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php } ?>
                
            </div>
            <!--                                     START SEPARATOR-->

</section>

