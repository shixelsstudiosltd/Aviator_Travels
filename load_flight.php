<?php
if(session_id() == ''){
    session_start();
}
if (isset($_POST['loading_ckeck'])) {// run script underground while displaying waiting for user
  
    $depart_date = $_POST['depart_date']; //"2015-04-22"; // $arrParams[4];
    $arrive_date = $_POST['arrive_date']; //"2015-04-22"; // $arrParams[4];
    $depart_code = $_POST['depart_code']; //"2015-04-22"; // $arrParams[4];
    $destin_code = $_POST['destin_code']; //"2015-04-22"; // $arrParams[4];
    
    include_once 'includes/going_flight.php';
    include_once 'includes/return_flight.php';
//    echo 'done';
//    die("$depart_code.$destin_code.$depart_date.$arrive_date");
//    die(print_r($_SESSION['goingFlight']));
}