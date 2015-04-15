<?php
error_reporting(0);
session_start();
include_once './includes/set.php';
include_once './includes/user.php';

//DoMobile();
//define("HOME", 'http://localhost/peemr/'); // set database name
$title = "";
$pag = strtolower(ltrim($_SERVER['REQUEST_URI'], '/'));
$page = rtrim($pag, '/');
//die($pag);
$data = explode('/', $page);
//$title = 'Avaitor Travels & Tours';
if (!ONLINE) {
    array_shift($data);
}
$pagelink = isset($data[0]) ? $data[0] : '';
global $firstPage;
//if(!isset($pagelink))
//    $pagelink = trim($pagelink);
//die('$pagelink');

if (!isset($pagelink) || $pagelink == '' || $pagelink === 'home') {//home
    $title = 'Home : Aviator Travels - making your travels fun!';
    if (isset($_SESSION['aviator_user']['auth'])) {
        header('Location:dashboard');
    } else {
        include_once './avaitor_home.php';
    }
} elseif ($pagelink === 'aboutus') {//about us
    $title = 'About Us : Aviator Travels - making your travels fun!';
//    $title.=' : About Us';
    include_once './avaitor_about.php';
} elseif ($pagelink === 'top30') {//top30 places to visit. No longer used
    include_once './avaitor_top30.php';
} elseif ($pagelink === 'contactus') {//conttact us form
    $title = 'Contact Us : Aviator Travels - making your travels fun!';
    $title.=' : Contact Us';
    include_once './avaitor_contactus.php';
} elseif ($pagelink === 'login_reg') {//standalone login and registeration form 
    $title = 'Join us for better travel experience : Aviator Travels - making your travels fun!';
    $title.=' : Registration';
    include_once './login_reg.php';
} elseif ($pagelink === 'hotel') {//hotel
    $title = 'Hotel : Aviator Travels - making your travels fun!';
    include_once './hotel_search.php';
//    support
} elseif ($pagelink === 'booking') {//flight page
    $title = 'Flights : Aviator Travels - making your travels fun!';
    include_once './booking_search.php';
} elseif ($pagelink === 'car') { //cars page...no longer used
    include_once './car_search.php';
} elseif (strstr($pagelink, 'flight_booking_confirm')) {//confirm page. show signup/login if user session not set
    list($str, $theId) = explode('-', $pagelink);

    if (!is_numeric($theId)) {
        header('Location:' . APP_BASE_URL);
    }
    $title = 'Flight booking confirmation : Aviator Travels - making your travels fun!';
    include_once './flight_booking_conf.php';
} elseif (strstr($pagelink, 'do_flight_booking')) {//confirm page. show signup/login if user session not set
//   die(print_r($_POST));
    if (isset($_POST['conFlight']) && isset($_POST['flightId']) && is_numeric($_POST['flightId'])) {
        User::saveFlight($_POST['flightId']);
    } elseif (isset($_SESSION['flight_booking_suc'])) {
        $title = 'Flight booking confirmation success: Aviator Travels - making your travels fun!';
        include_once './flight_booking_success.php';
    } else {
        //back to error page
    }
} elseif (strstr($pagelink, 'flight_search_result')) {//print out fliight result
    $title = 'Flight search result : Aviator Travels - making your travels fun!';
    include_once './flight_search_result_out.php';
} elseif (strstr($pagelink, 'flight_loading')) {//flight loading page that displays loading with clock icon
    $title = 'Flights Loading. . . : Aviator Travels - making your travels fun!';
    include_once './f_loading.php';
} else if ($pagelink === "lin") {
//  die(print_r($_POST));
    include_once './includes//user.php';
    if (isset($_POST['doregister']) && $_POST['doregister']) {
        $test = new User($_POST);
        $retUrl = isset($_POST['returnurl']) ? $_POST['returnurl'] : '';
        $test->register($retUrl);
        exit();
    } elseif (isset($_POST['dologin']) && $_POST['dologin']) { //print_r($_POST);die();
        if (isset($_POST['returnurl'])) {
            User::login($_POST['l_email'], $_POST['l_pass'], $_POST['returnurl']);
        } else {
            User::login($_POST['l_email'], $_POST['l_pass']);
        }
    }
} elseif ($pagelink === 'dashboard') {//term, policies, how it works page
    $title = 'My Dashboard. . . : Aviator Travels - making your travels fun!';
    include_once './avaitor_profile.php';
} elseif ($pagelink === 'operations') {//term, policies, how it works page
    $title.=' : Terms & conditions';
    include_once './avaitor_operations.php';
} elseif ($pagelink === 'logout') {//term, policies, how it works page
//    $title.=' : Terms & conditions';
    User::Logout();
//    include_once './avaitor_operations.php';
}
//elseif (strstr($pagelink, 'get_inspired')) {
//    include_once './get_inspired.php';
//    
//} 
//elseif (strstr($pagelink, 'fbooking')) {
//    include_once './flight_booking.php';
//} elseif ($pagelink === 'flight_hotel_search') {
//    include_once './hotel_search.php';
//} elseif ($pagelink === 'rent_car') {
//    include_once './hotel_search.php';
//} else {
//    include_once './avaitor_404.php';
//}

