<style>
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
    @import url(https://fonts.googleapis.com/css?family=Oswald:300,400);
    .snip1423 {
        font-family: 'Oswald', Arial, sans-serif;
        position: relative;
        float: left;
        margin: 20px;
        min-width: 230px;
        max-width: 315px;
        width: 100%;
        background: #ffffff;
        text-align: center;
        color: #000000;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        padding: 15px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .snip1423 * {
        -webkit-box-sizing: padding-box;
        box-sizing: padding-box;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }
    .snip1423 img {
        max-width: 100%;
        vertical-align: top;
        position: relative;
    }
    .snip1423 figcaption {
        padding: 20px 15px;
    }
    .snip1423 h3,
    .snip1423 p {
        margin: 0;
    }
    .snip1423 h3 {
        font-size: 1.3em;
        font-weight: 400;
        margin-bottom: 5px;
        text-transform: uppercase;
    }
    .snip1423 p {
        font-size: 0.9em;
        letter-spacing: 1px;
        font-weight: 300;
    }
    .snip1423 .price {
        font-weight: 500;
        font-size: 1.4em;
        line-height: 48px;
        letter-spacing: 1px;
    }
    .snip1423 .price s {
        margin-right: 5px;
        opacity: 0.5;
        font-size: 0.9em;
    }
    .snip1423 i {
        position: absolute;
        bottom: 0;
        left: 50%;
        -webkit-transform: translate(-50%, 50%);
        transform: translate(-50%, 50%);
        width: 56px;
        line-height: 56px;
        text-align: center;
        border-radius: 50%;
        background-color: #666666;
        color: #ffffff;
        font-size: 1.6em;
        border: 4px solid #ffffff;
    }
    .snip1423 a {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
    }
    .snip1423:hover,
    .snip1423.hover {
        -webkit-transform: translateY(-5px);
        transform: translateY(-5px);
    }
    .snip1423:hover i,
    .snip1423.hover i {
        background-color: #755588;
    }
    /* Demo purposes only */
</style>
<script>
    /* Demo purposes only */
    $(".hover").mouseleave(
            function () {
                $(this).removeClass("hover");
            }
    );
</script>

<?php
include '../connection.php';

$q = "select * from tbl_shop s , tbl_artist a where s.artist_id=a.artist_id order by shop_id desc limit 4";
$res_q = mysqli_query($connection, $q);

while ($r = mysqli_fetch_assoc($res_q)) {
    ?>  
    <figure class="snip1423">
        <img src="<?php echo $r['artfile'] ?>" alt="Image Not Found" height="250em"/>
        <figcaption>
            <p style="font-size: 3px;" hidden><?php echo $r['artkeywords']; ?></p>
            <h3><?php echo $r['arttitle'] ?></h3>
            <p><?php echo $r['artist_firstname'] . " " . $r['artist_lastname'] ?></p>
            <h3 class="price" style="font-weight: bold;">
    <!--                            <s>$24.00</s>$19.00-->
                <?php echo $r['price'] + $r['shipcost'] . " INR" ?>
            </h3>
        </figcaption>
        <i class="fa fa-angle-right"></i>
        <a href="artist_artdetails.php?id=<?php echo $r['shop_id'] ?>"></a>
    </figure>
    <?php
}
?>