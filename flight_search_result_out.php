<!DOCTYPE HTML>
<?php
error_reporting(0);
if (session_id() == '') {
    session_start();
}
// print_r($_SESSION['goingFlight']);
 global  $flight_error;
 $flight_error = FALSE;
global $depart_date, $arrive_date, $depart_code, $destin_code;

list($base, $rest) = explode('?', strtoupper($_SERVER['REQUEST_URI']));
$params = explode('&', strtoupper($rest));
$params_new = array();
$m = array();

foreach ($params as $key => $value) {
    $m = explode('=', $value);
    $params_new[$m[0]] = $m[1];
}
$depart_code = $_SESSION['DEPART_CODE']; // $arrParams[4];
$destin_code = $_SESSION['DESTIN_CODE']; // $arrParams[4];
$depart_date = $_SESSION['START']; // $arrParams[4];
$arrive_date = $_SESSION['END']; // $arrParams[4];
$passengers = $_SESSION['PASSENGERS'];
$trip_count = isset($_SESSION['TRIP_COUNT']) ? $_SESSION['TRIP_COUNT'] : 2; // $arrParams[4];
$thestring = $depart_code . '-' . $destin_code . '-' . $depart_date . '-' . $arrive_date;
//  echo($depart_code);
//die(print_r($_SESSION['goingFlight']));
$goingFlight = isset($_SESSION['goingFlight']) ? $_SESSION['goingFlight'] : ''; // = $arrFlight1['AirSegment'];
$returnFlight = isset($_SESSION['returnFlight']) ? $_SESSION['returnFlight'] : ''; // =  $arrFlightr['AirSegment'];
$arrRef1 = isset($_SESSION['arrRef1']) ? $_SESSION['arrRef1'] : '';

//if ($depart_code !== $goingFlight[1]['Origin']) {//flight session conflict. If yes, redirect back to home and clear session in homepage or emptiness of flight session array
////    die($goingFlight);
//    header('Location:home');
//}
if (!$flight_error) {
    if (is_array($goingFlight) && !empty($goingFlight)) {
        $arrGoing = makeGoingChunk($goingFlight, $depart_code);
    }
    if (is_array($returnFlight) && !empty($returnFlight)) {
        $arrReturn = makeGoingChunk($returnFlight, $destin_code);
    }
//    $arrReturn = makeGoingChunk($returnFlight, $destin_code);
    $flight_count = count($arrGoing);
    $flight_error = FALSE;
}
$_SESSION['goingChunk'] = isset($arrGoing) ? $arrGoing : '';
$_SESSION['returnChunk'] = isset($arrReturn) ? $arrReturn : '';
//$_SESSION['goingChunk'] = isset($_SESSION['goingFlight']) ? $_SESSION['goingFlight'] : '';
if($flight_count < 1){
    $flight_error = TRUE;
}
$full_origin = printWell($depart_code, $arrRef1, 'description', ' ', ', ') . printWell($depart_code, $arrRef1, 'country', '', '');
$full_destin = printWell($destin_code, $arrRef1, 'description', ' ', ', ') . printWell($destin_code, $arrRef1, 'country', '', '');
?>
<html>

    <head>
        <?php include_once './includes/head.php'; ?>
    </head>

    <body>

        <div class="global-wrap">
            <?php
            $pagelink = '';
            include_once './includes/header.php';
            ?>
            <div class="container">

                <?php include_once './includes/flight_popup_form.php'; ?>
                <h3 class="booking-title"><?php echo (!$flight_error && ($flight_count > 0)) ? $flight_count : ''; ?> Flights from <span style='color: #ed8323'><?php echo $full_origin; ?></span> to <span style='color: #ed8323'><?php echo $full_destin; ?></span> on <?php echo $depart_date; ?> <!--<small><a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Change search</a></small>--></h3>
                <div class="row">
                    <div class="col-md-3">
                        <form class="booking-item-dates-change mb30">
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                <label>From</label>
                                <input class="typeahead form-control" value="Great Britan, London" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                            </div>
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                <label>To</label>
                                <input class="typeahead form-control" value="United States, New York" placeholder="City, Hotel Name or U.S. Zip Code" type="text" />
                            </div>
                            <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                <label>Departing</label>
                                <input class="date-pick form-control" data-date-format="MM d, D" type="text" />
                            </div>
                            <div class="form-group form-group-select-plus">
                                <label>Passengers</label>
                                <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                    <label class="btn btn-primary active">
                                        <input type="radio" name="options" />1</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />2</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />3</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4</label>
                                    <label class="btn btn-primary">
                                        <input type="radio" name="options" />4+</label>
                                </div>
                                <select class="form-control hidden">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option selected="selected">5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>13</option>
                                    <option>14</option>
                                </select>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Upadte Search" />
                        </form>
                    </div>
                    <?php include_once './includes/flight_result.php'; ?>
                </div>
                <div class="gap"></div>
            </div>
            <?php include_once './includes/footer.php'; ?>
            <?php include_once './includes/base_script.php'; ?>
        </div>
    </body>

</html>
<?php unset($_SESSION); ?>


