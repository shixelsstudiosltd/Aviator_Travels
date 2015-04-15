<?php
$whitelist = array('127.0.0.1', '::1');
if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    define("APP_BASE_URL", "http://localhost/new_aviator/");
    define("ONLINE", FALSE); // set local resource loading 
    define("DB_HOST", "localhost"); // set database host
    define("DB_USER", "root"); // set database user
    define("DB_PASS", ""); // set database password
    define("DB_NAME", "avaitor"); // set database name
} else {
    define("APP_BASE_URL", "http://avaitor.shixels.com/");
    define("ONLINE", TRUE); // set local resource loading 
    define("DB_HOST", "localhost"); // set database host
    define("DB_USER", "shixels_avait"); // set database user
    define("DB_PASS", "salaudeen1"); // set database password
    define("DB_NAME", "shixels_avait"); // set database name
}

