<?php

include_once './includes/set.php';

//DoMobile();
//define("HOME", 'http://localhost/peemr/'); // set database name
$title = "";
$pag = strtolower(ltrim($_SERVER['REQUEST_URI'], '/'));
$page = rtrim($pag, '/');
//die($pag);
$data = explode('/', $page);
$title = 'Avaitor Travels & Tours';
if (!ONLINE) {
    array_shift($data);
}
global $firstPage;
//if(!isset($data[0]))
//    $data[0] = trim($data[0]);
//die('$data[0]');
if (!isset($data[0]) || $data[0] == '' || $data[0] === 'home') {
    $title.=' : Home';
    include_once './avaitor_home.php';
    
} elseif ($data[0] === 'aboutus') {
    $title.=' : About Us';
    include_once './avaitor_about.php';
    
} elseif ($data[0] === 'gallery') {
    include_once './avaitor_gallery.php';
    
} elseif ($data[0] === 'contactus') {
     $title.=' : Contact Us';
    include_once './avaitor_contact.php';   
}  elseif ($data[0] === 'reg') {
     $title.=' : Registration';
    include_once './avaitor_reg.php';    
}elseif ($data[0] === 'terms') {
     $title.=' : Terms & conditions';
    include_once './avaitor_terms.php';    
} elseif ($data[0] === 'login') {
     $title.=' : Login';
    include_once './avaitor_login.php';
    
} 
elseif ($data[0] === 'support') {
    $title.=' : Surpport questions';
    include_once './avaitor_support.php';
    
}elseif ($data[0] === 'hotel_search') {
    include_once './hotel_search.php';
//    support
} elseif (strstr($data[0], 'flight_search')) {
    include_once './flight_search.php';
    
} elseif (strstr($data[0], 'fbooking')) {
    include_once './flight_booking.php';
    
}elseif ($data[0] === 'flight_hotel_search') {
    include_once './hotel_search.php';
    
} elseif ($data[0] === 'rent_car') {
    include_once './hotel_search.php';
} else {
    include_once './avaitor_404.php';
}

