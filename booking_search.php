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


         
        </div>
            <div class="container">
                
                <!--<div class="gap"></div>-->
                <h2 class="text-center">Top Destinations</h2>
                <div class="gap">
                    <div class="row row-wrap">
                        <?php
                        include_once './includes/set.php';
                        shuffle($array_site);
                        $array_sit = array_slice($array_site, 0,  4);
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


