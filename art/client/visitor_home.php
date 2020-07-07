<?php
session_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="no-js"> <![endif]-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content=" width=device-width, initial-scale=1">
        <title>Home</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Gilda+Display%7CMontserrat:400,700%7COpen+Sans" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="addons/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
        <!-- Icons -->
        <link href="css/icomoon.css" rel="stylesheet">
        <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="fonts/icomoon/style.css">
        <!-- CSS assets -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="addons/Magnific-Popup/magnific-popup.css" rel="stylesheet">
        <!-- LOAD JQUERY LIBRARY-->
        <script src="js/plugins/jquery-3.2.1.min.js"></script>
        <!-- Main theme stylesheet -->
        <link href="css/template.css" rel="stylesheet" type="text/css">

        <!-- REVOLUTION STYLE SHEETS -->
        <link rel="stylesheet" type="text/css" href="addons/revolution/css/settings.css">

        <!-- REVOLUTION JS FILES -->
        <script src="addons/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="addons/revolution/js/jquery.themepunch.revolution.min.js"></script>


        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script src="addons/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="addons/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script>function setREVStartSize(e) {
                try {
                    var i = jQuery(window).width(), t = 9999, r = 0, n = 0, l = 0, f = 0, s = 0, h = 0;
                    if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                        f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                    }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                        var u = (e.c.width(), jQuery(window).height());
                        if (void 0 != e.fullScreenOffsetContainer) {
                            var c = e.fullScreenOffsetContainer.split(",");
                            if (c)
                                jQuery.each(c, function (e, i) {
                                    u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                                }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                        }
                        f = u
                    } else
                        void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                    e.c.closest(".rev_slider_wrapper").css({height: f})
                } catch (d) {
                    console.log("Failure at Presize of Slider:" + d)
                }
            }
            ;</script>
    </head>

    <body>

        <section>
            <?php include('./visitor_homeheader.php'); ?>
        </section>


        <!-- start fancy section -->
        <section class="ag-about-section small-section"  >

            <div class="row">
                <div class="col-sm-12">
                    <div class="ag-about pl-90 pr-90 pt-60 fancy-background" >
                        <div class="row">
                            <div class="col-md-4 col-sm-12" style="padding-top: 6%;">
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-light-transparent txt-thin"></h4>
                                    <h2 class="txt-large txt-light" >Welcome To Vision Arts</h2>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div class="quote-wrapper">
                                    <div class="bl-quote">
                                        <p class="bl-quote__title transparent-light">
                                            Vision Arts is the world’s leading online art gallery, connecting people with art and artists they love.
                                            We offers an unparalleled selection of paintings, drawings, sculpture and photography in a range of prices, and it provides artists from around the world with an expertly curated environment in which to exhibit and sell their work.                                            
                                        </p>
                                    </div>
                                </div>
                            </div><!-- END quote wrapper-->
                        </div>
                    </div>
                </div>
                <div class="ag-mask">
                    <div class="skew-mask">
                    </div>
                </div>
            </div>
        </section>

        <br>
        <br>
        <!--section gallery-->
        <?php include './homegallery.php'; ?>

        <!-- START SEPARATOR-->
        <!--
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="ag-separator">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-3 ">
                            <div class="counter-wrapper txt-center">
                                <div class="counter_trigger counter_element el-inline" data-to="350" data-speed="1000" data-refresh-interval="1"></div>
                                 <span class="counter_element">+</span>
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-grey txt-center">ARTS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <div class="counter-wrapper txt-center">
                                <div class="counter_trigger counter_element el-inline" data-to="150" data-speed="1000" data-refresh-interval="1" ></div>
                                <span class="counter_element">+</span>
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-grey txt-center">ARTISTS</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <div class="counter-wrapper txt-center">
                                <div class="counter_trigger counter_element" data-to="32" data-speed="1000" data-refresh-interval="1"></div>
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-grey txt-center">AWARDS WON</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                            <div class="counter-wrapper txt-center">
                                <div class="counter_trigger counter_element el-inline" data-to="300" data-speed="1000" data-refresh-interval="1" ></div>
                                <span class="counter_element">+</span>
                                <div class="title-block">
                                    <h4 class="title-block__subtitle txt-grey txt-center">CUSTOMERS</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>end container-->

        <div class="txt-center" style="margin: 0;padding:0;">
            <a href="visitor_artsgallery.php" class="ag_btn btn btn-lg btn-lined lined-dark btn--square call-to-action--btn ">Visit Gallery</a>
        </div>

    <hr/>
    <!-- START SEPARATOR-->

    <!--iconbox style2 section-->

    <section class="sidermargins pb-100 pt-100 color-overlay--dark" style="padding:2%;">
        <div class="container large-container">
            <div class="row">
                <?php include './homeshop.php' ?>
            </div><!--end row of icons-->
            <br/>
            <center>
                <a href="visitor_shop.php" class="ag_btn btn btn-lg btn-lined lined-light btn--square call-to-action--btn ">Visit Shop</a>
            </center>
        </div><!--end container-->
    </section>

    <!--call to action section-->
    <section class="sidermargins color-overlay--grey pb-80 pt-80">

        <div class="container large-container">
            <div class="row">
                <div class="col-md-9 col-sm-9 ">
                    <div class="column-wrapper--left">
                        <div class="bl-quote call-to-action ">
                            <h2 class="call-to-action__subtitle">Let's make something great together.</h2>
                            <p class="call-to-action__title">Get in touch with us.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 col-sm-3">
                    <div class="column-wrapper--right">
                        <div class="bl-quote ">
                            <a href="signupartist.php" class="ag_btn btn btn-lg btn-lined lined-dark btn--square call-to-action--btn ">Join As An Artist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include 'footer.php'
    ;
    ?>



</div><!-- /.#page_wrapper -->

<a href="visitor_home.php" class="totop">TOP</a> <!--/.totop -->


<!--Revolution slider script-->

<script data-cfasync="false" src="../cdn-cgi/scripts/af2821b0/cloudflare-static/email-decode.min.js"></script><script>
            var revapi1,
                    tpj = jQuery;

            tpj(document).ready(function () {
                if (tpj("#rev_slider_1_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_1_1");
                } else {
                    revapi1 = tpj("#rev_slider_1_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "addons/assets/js/",
                        sliderLayout: "auto",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            bullets: {
                                enable: true,
                                hide_onmobile: true,
                                hide_under: 1100,
                                style: "uranus",
                                hide_onleave: false,
                                direction: "vertical",
                                container: "layergrid",
                                h_align: "right",
                                v_align: "center",
                                h_offset: 50,
                                v_offset: 0,
                                space: 5,
                                tmp: '<span class="tp-bullet-inner"></span>'
                            }
                        },
                        responsiveLevels: [1240, 1024, 778, 480],
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: [1600, 1024, 778, 480],
                        gridheight: [868, 768, 960, 720],
                        lazyType: "smart",
                        parallax: {
                            type: "scroll",
                            origo: "slidercenter",
                            speed: 400,
                            speedbg: 0,
                            speedls: 0,
                            levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 51, 55],
                        },
                        shadow: 0,
                        spinner: "spinner2",
                        stopLoop: "on",
                        stopAfterLoops: 0,
                        stopAtSlide: 1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }

            });	/*ready*/
</script>



<script src="js/plugins/bootstrap.min.js"></script>

<!--isotope script-->
<script src="addons/isotope/isotope.pkgd.min.js"></script>
<script src="addons/imagesloaded.pkgd.min.js"></script>
<!--popup script-->
<script src="addons/Magnific-Popup/jquery.magnific-popup.js"></script>
<!--count script-->
<script src="addons/jquery.countTo.js"></script>
<!-- Main template script -->
<script src="js/script.js"></script>

</body>
</html>