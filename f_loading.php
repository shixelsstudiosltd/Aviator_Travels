<!DOCTYPE HTML>
<?php
if (session_id() === '') {
    session_start();
}
define('LOADING_CHECK', 1);
$params = explode('&', strtoupper($pagelink));
$params_new = array();
$m = array();
foreach ($params as $key => $value) {
    $m = explode('=', $value);
    $params_new[$m[0]] = $m[1];
}

//$_SESSION['DEPART_CODE'] = $depart_code = $params_new['DEPART_CODE']; // $arrParams[4];
//$_SESSION['DESTIN_CODE'] = $destin_code = $params_new['DESTIN_CODE']; // $arrParams[4];
//$_SESSION['START'] = $depart_date = $params_new['START']; // $arrParams[4];
//$_SESSION['END'] = $arrive_date = $params_new['END']; // $arrParams[4];

$_SESSION['DEPART_CODE'] = $GLOBALS['DEPART_CODE'] = $depart_code = $params_new['DEPART_CODE']; // $arrParams[4];
$_SESSION['DESTIN_CODE'] = $GLOBALS['DESTIN_CODE'] = $destin_code = $params_new['DESTIN_CODE']; // $arrParams[4];
$_SESSION['START'] = $GLOBALS['START'] = $depart_date = $params_new['START']; // $arrParams[4];
$_SESSION['END'] = $GLOBALS['END'] = $arrive_date = $params_new['END']; // $arrParams[4];
$_SESSION['PASSENGERS'] = $GLOBALS['PASSENGERS'] = $passengers = $params_new['PASSENGERS']; // $arrParams[4];
$_SESSION['TRIP_COUNT'] = $GLOBALS['TRIP_COUNT'] = $trip_count = $params_new['TRIP_COUNT']; // $arrParams[4];
//$_SESSION['TRIP_COUNT'] = $trip_count = $_REQUEST['trip_count'];//= $params_new['END']; // $arrParams[4];

$thestring = '?DEPART_CODE=' . $depart_code . '&DESTIN_CODE=' . $destin_code . '&START=' . $depart_date . '&END=' . $arrive_date.'&PASSENGERS=' . $passengers.'&TRIP_COUNT=' . $trip_count;
//$depart_date = end(explode('=',$params[1])); // $arrParams[4];
//$depart_code = "LOS";
//$destin_code = "SXF";
//[1] => DEPART_CODE=LCY [2] => DESTINATION=ATLANTA%2C+HARTSFIELD+ATLANTA+INT%27L+AIRPORT%2C+USA+%5BATL%5D 
//[3] => DESTIN_CODE=ATL [4] => START=2015-3-30 [5] => END=2015-4-24 ) 1
//die(print_r($params_new));
?>
<html class="full">

    <head>
        <?php include_once './includes/head.php'; ?>
    </head>

    <body class="full">
        <!-- /FACEBOOK WIDGET -->
        <div class="global-wrap">

            <div class="full-page">
                <div class="bg-holder full">
                    <div class="bg-mask"></div>
                    <div class="bg-img" style="background-image:url(img/bridge.jpg);"></div>
                    <div class="bg-holder-content full text-white text-center">
                        <a class="logo-holder" href="home">
                            <img src="img/logo-invert.png" alt="Image Alternative text" title="Image Title" />
                        </a>
                        <div class="full-center">
                            <div class="container">
                                <div class="spinner-clock">
                                    <div class="spinner-clock-hour"></div>
                                    <div class="spinner-clock-minute"></div>
                                </div>
                                <h2 class="mb5">Please sit back while we gather flight schedules in requested cities...</h2>
                                <p class="text-bigger">this may take a couple of seconds</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include_once './includes/base_script.php';
            include_once 'includes/going_flight.php';
            ?>
            <script>
//                $.ajax({
//                    url: 'going_flight.php',
//                    type: 'POST',
//                    data: {loading_ckeck: "<?php echo LOADING_CHECK; ?>",
//                        depart_code: "<?php echo $depart_code; ?>",
//                        destin_code: "<?php echo $destin_code; ?>",
//                        depart_date: "<?php echo $depart_date; ?>",
//                        arrive_date: "<?php echo $arrive_date; ?>"
//                    },
//                    success: function (result) {
                        setTimeout(function () {
                             window.location.href = "flight_search_result<?php echo $thestring; ?>";
                        }, 10000);
                      
//                    }
//                });

            </script>
        </div>
        <?php
//include_once './includes/base_script.php';
        include_once 'includes/going_flight.php';
//        include_once 'includes/return_flight.php';
//      $_SESSION['goingFlight'] = $GLOBALS['goingFlight'];
//        print_r($GLOBALS['goingFlight']);
//        echo '<br><br><br>';
//       $_SESSION['returnFlight'] = $GLOBALS['returnFlight'];
//        print_r($GLOBALS['returnFlight']);
//        print_r($GLOBALS['returnFlight']);
//          header('Location:flight_search_result');
//        die('Niyi')
//        echo '<br><br>';
////        die(print_r($GLOBALS['returnFlight']));
        ?>
    </body>

</html>



