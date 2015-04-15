<!DOCTYPE HTML>
<?php
if(session_id()!==''){
    unset($_SESSION['arrRef1']);
    unset($_SESSION['goingFlight']);
    unset($_SESSION['returnFlight']);
}

//if(isset($_SESSION['returnFlight']))
//unset($_SESSION['returnFlight']); ?>
<html>

    <head>
        <?php include_once './includes/head.php'; ?>
    </head>

    <body>

        <!-- FACEBOOK WIDGET -->
        <div id="fb-root"></div>
        <!-- /FACEBOOK WIDGET -->
        <div class="global-wrap">
        <?php include_once './includes/header.php'; ?>

            <!-- TOP AREA -->
        <?php include_once './includes/home_top_area.php'; ?>

            <!-- END TOP AREA  -->

            <div class="gap"></div>


            <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row row-wrap" data-gutter="120">
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-dollar box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Save more with us</h4>
                                    <p class="thumb-desc">Making your travel arrangements with Aviator saves you a lot of coin. We go a long way in finding the most cost-effective route to make your travels possible without compromising your convenience.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-check box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Good customer relation</h4>
                                    <p class="thumb-desc">We believe <em>A single customer well treated is worth more than a million coin spent on advertisement</em>. For this, we put you first in all we do; after all, your patronage is what keeps us going.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-send box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Bundled packages</h4>
                                    <p class="thumb-desc">Should you need a special arrangement for honeymoons, pilgrimages, schools, and more, we've helped you thought of it and you can count on us. Just contact us and you'd be glad you did!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb30 thumb"><i class="fa fa-thumbs-o-up box-icon-left round box-icon-big box-icon-border animate-icon-top-to-bottom"></i>
                                <div class="thumb-caption">
                                    <h4 class="thumb-title">Better servicee assured</h4>
                                    <p class="thumb-desc">We've counted a couple of years in the industry; our knowledge of operation increases by the day. You can count on our wealth of experience for better service delivery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="bg-holder">
                <div class="bg-mask"></div>
                <div class="bg-parallax" style="background-image:url(img/london_2048x1310.jpg);"></div>
                <div class="bg-content">
                    <div class="container">
                        <div class="gap gap-big text-center text-white">
                            <!--<h2 class="text-uc mb20">Last Minute Deal</h2>-->
                            <ul class="icon-list list-inline-block mb0 last-minute-rating">
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                                <li><i class="fa fa-star"></i>
                                </li>
                            </ul>
                            <h5 class="last-minute-title">United Kingdom - London</h5>
<!--                            <p class="last-minute-date">Fri 14 Mar - Sun 16 Mar</p>-->
                            <!--<p class="mb20"><b>$120</b> / person</p><a class="btn btn-lg btn-white btn-ghost" href="#">Book Now <i class="fa fa-angle-right"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                
                <div class="gap"></div>
                <h2 class="text-center">Top Destinations</h2>
                <div class="gap">
                    <div class="row row-wrap">
                        <?php
                        include_once './includes/set.php';
                        shuffle($array_site);
                        $array_sit = array_slice($array_site, 0,  8);
                        foreach ($array_sit as $key => $value) {
                            ?>
                            <div class="col-md-3">
                                <div class="thumb">
                                    <header class="thumb-header">
                                        <a class="hover-img curved" href="#">
                                            <img src="img/sample_trips/<?php echo $value['string'] . '.jpg'; ?>" alt="Image Alternative text" title="Upper Lake in New York Central Park" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                        </a>
                                    </header>
                                    <div class="thumb-caption">
                                        <h4 class="thumb-title"><?php echo $value['place']; ?></h4>
                                        <p class="thumb-desc" style="text-align: justify;"><?php echo substr($value['word'], 0, 150).'. . .'; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                    </div>
                </div>
<!--                <h2 class="text-center">Most Visited Museums</h2>
                <div class="gap">
                    <div class="row row-wrap">
                        <?php
//                        include_once './includes/set.php';
//                        shuffle($array_site);
//                        $array_sit = array_slice($array_site, 0,  4);
//                        foreach ($array_sit as $key => $value) {
                            ?>
                            <div class="col-md-3">
                                <div class="thumb">
                                    <header class="thumb-header">
                                        <a class="hover-img curved" href="#">
                                            <img src="img/sample_trips/<?php // echo $value['string'] . '.jpg'; ?>" alt="Image Alternative text" title="Upper Lake in New York Central Park" /><i class="fa fa-plus box-icon-white box-icon-border hover-icon-top-right round"></i>
                                        </a>
                                    </header>
                                    <div class="thumb-caption">
                                        <h4 class="thumb-title"><?php // echo $value['place']; ?></h4>
                                        <p class="thumb-desc">Scelerisque montes class curabitur class aenean aliquam eu</p>
                                    </div>
                                </div>
                            </div>
                    <?php // } ?>
                    </div>
                </div>-->


            </div>
<?php include_once './includes/footer.php'; ?>
<?php include_once './includes/base_script.php'; ?>

        </div>
    </body>

</html>


