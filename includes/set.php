<?php

include_once 'db_set.php';
//
//include_once 'headlines.php';
define("TIME_ZONE_API_KEY", "U14XB01LE6GC"); // set cloudflare scripting tech bolt satus
define("JSON_LONG_LAT_URL", "http://api.wipmania.com/jsonp"); // set cloudflare scripting tech bolt satus
define("CACHE_STRING", ""); // set cloudflare scripting tech bolt satus
define("APP_NAME", " Avaitor Travels & Tours"); // set cloudflare scripting tech bolt satus
define("LIMIT", 36); // set database name
//define("APP_BASE_URL", "http://avaitor.shixels.com/"); // set cloudflare scripting tech bolt satus
//define("ONLINE", TRUE); // set local resource loading

$array_site = array(
    array('string' => 'dubai', 'place' => 'Abu dabhi, Dubai', 'word' => 'Abu dabhi is the capital and the second most populous city in the United Arab Emirates (the most populous being Dubai), and also capital of Abu Dhabi emirate, the largest of the UAE\'s seven member emirates.', 'hotels' => 343, 'start_rice' => '&#36; 600', 'hotel_price' => '&#36; 180'),
    array('string' => 'china', 'place' => 'Beijing, China', 'word' => ' Beijing, sometimes romanized as Peking, is the capital of the People\'s Republic of China and one of the most populous cities in the world. The population as of 2013 was 20,150,000.', 'hotels' => 253, 'start_rice' => '&#36; 2,500', 'hotel_price' => '&#36; 150'),
    array('string' => 'london', 'place' => 'London, UK', 'word' => ' London is the capital and most populous city of England and the United Kingdom. London is a leading global city, with strengths in the arts, commerce, education, entertainment, fashion, finance, healthcare.', 'hotels' => 123, 'start_rice' => '&#36; 910', 'hotel_price' => '&#36; 190'),
    array('string' => 'berlin', 'place' => 'Berlin, Germany', 'word' => 'Berlin is the capital of Germany with a population of about 3.5 million people. It is the second most populous city and the seventh most populous urban area in the European Union.', 'hotels' => 583, 'start_rice' => '&#36; 1,900', 'hotel_price' => '&#36; 210'),
    array('string' => 'new_york', 'place' => 'New York, US', 'word' => 'New York – often called New York City or the City of New York to distinguish it from the State of New York, of which it is a part – is the most populous city in the United States.', 'hotels' => 403, 'start_rice' => '&#36; 750', 'hotel_price' => '&#36; 215'),
    array('string' => 'cape_town', 'place' => 'Cape Town, SA', 'word' => 'Cape Town is the second-most populous city in South Africa, after Johannesburg. The city is famous for its harbour, for its natural setting in the Cape Floristic Region', 'hotels' => 690, 'start_rice' => '&#36; 1,200', 'hotel_price' => '&#36; 220'),
    array('string' => 'st_petersburg', 'place' => 'St.Petersburg, Russia', 'word' => 'Saint Petersburg is the second largest city in Russia, politically incorporated as a federal subject (a federal city). It is located on the Neva River at the head of the Gulf of Finland on the Baltic Sea.', 'hotels' => 325, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'santa_maria', 'place' => 'Cayo Santa Maria, Cuba', 'word' => 'Cayo Santa María is an island off Cuba\'s north central coast. The island is linked by road and bridge. Cayo Santa María is well known for its white sand beaches and luxury all inclusive resorts.', 'hotels' => 478, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'rome', 'place' => 'Rome, Italy', 'word' => 'Rome is a city and special comune in Italy. Rome is the capital of Italy and region of Lazio. With about 2.9 million residents, it is the country\'s largest and most populated comune.', 'hotels' => 740, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'barcelona', 'place' => 'Barcelona, Spain', 'word' => 'Barcelona is the capital city of the autonomous community of Catalonia in Spain and the country\'s second largest city, with a population of about 1.6 million within its administrative limits.', 'hotels' => 580, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'zurich', 'place' => 'Zurich, Switzerland', 'word' => 'Zurich is the largest city in Switzerland and the capital of the canton of Zürich. It is located in north-central Switzerland. It is at the northwestern tip of Lake Zürich', 'hotels' => 600, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'budapest', 'place' => 'Budapest, Hungary', 'word' => 'Budapest is the capital and the largest city of Hungary, and one of the largest cities in Central Europe. It is the country\'s principal political, cultural, commercial centre', 'hotels' => 410, 'start_rice' => '&#36; 600', 'hotel_price' => '&#36; 180')
);
$array_home_bg = array(
    array('string' => 'london_2048x1365', 'place' => 'Big Ben, London-Uk', 'flag' => 'uk', 'hotels' => 23, 'start_rice' => '&#36; 600', 'hotel_price' => '&#36; 180'),
    array('string' => 'dubai_2048x1365', 'place' => 'Burj Al Arab, Dubai-UAE', 'flag' => 'ae', 'hotels' => 23, 'start_rice' => '&#36; 650', 'hotel_price' => '&#36; 120'),
    array('string' => 'paris_2048x1365', 'place' => 'Paris - France', 'flag' => 'fr', 'hotels' => 23, 'hotels' => 23, 'start_rice' => '&#36; 600', 'hotel_price' => '&#36; 180')
);
function filter($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $key = filter($value);
        }
    } else {
        $data = trim(htmlentities(strip_tags($data)));
        if (get_magic_quotes_gpc())
            $data = stripslashes($data);
        $data = mysql_real_escape_string($data);
    }
    return $data;
}
function printNotice($headmsg, $msg, $error = false){
    $color = ($error) ? '#ff8100' : '#7ab700;';
    $word = "<div id='welcome_info_suc' style='text-align: center;width:94%;height: auto;padding:10px;border: 1px #ccc solid;border-radius: 10px;margin-top:-30px;margin-bottom:15px;margin-left:3%;color:white;background:$color' class='welcome_info'>
                    <h4 style='font-weight: bold;color:#fff;'><h4 style='font-weight: bold;color:#fff;'>". $headmsg."<div style='float:right;color:white;cursor: pointer;' title='close' id='close_info'>*</div><br>".
                       $msg."</h4></h4></div>";
    echo $word;
}

function printWell($key, $arr, $word, $first = "", $last = "") {
    if (key_exists($key, $arr)) {
        return (key_exists($key, $arr)) ? $first . $arr[$key][$word] . $last : '';
    } else {
        return '';
    }
}

function makeGoingChunk($arrflight, $ref) {
//    $goingFlight;
    $itinerary = 0;
    $return_arr = array();
//    $return_arr[] = array_shift($goingFlight); //get the first flight from the origin as key
    foreach ($arrflight as $key => $val) {
        if ($val['Origin'] === $ref) {//get in-beyween flight untill the origin (not including another origin)
            $itinerary++;
        }
        $return_arr[$itinerary][] = $arrflight[$key];
    }
    return $return_arr;
}

function flightLink($fligthArr) {
    $str = '';
    if (is_array($fligthArr)) {
        foreach ($fligthArr['out'] as $value) {
            $str .= $value . '~~';
        }
    } else {
//        $data = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data);
    }
    return $str;
}

function clean($data) {
    if (is_array($data)) {
        foreach ($data as $key => $value) {
            $key = clean($value);
        }
    } else {
        $data = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $data);
    }
    return $data;
}

function connect() {
    $link = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($link->connect_errno > 0) {
//        die($link->error);
        return false;
    } else {
        return $link;
    }
}

function connectPDO() {
    $host = DB_HOST;
    $dbname = DB_NAME;
    $link = new PDO("mysql:host=$host;dbname=$dbname", DB_USER, DB_PASS);
    return $link;
}

function printFlightTime($time) {
    $hours = floor($time / 60);
    $minutes = $time % 60;
    if ($hours == 0)
        return $minutes . ' miuntes';
    elseif ($minutes == 0)
        return $hours . 'hours';
    else
        return $hours . ' hours, ' . $minutes . ' minutes';
}

function url($url) {
    die(header('Location:' . APP_BASE_URL . $url));
//    die();
}

function makeDate($date) {
    list($month, $day, $year) = explode('/', $date);
    return "$year-$month-$day";
}

function cleanNonAscii($orig_text) {

    $text = $orig_text;

    // Single letters
    $text = preg_replace("/[∂άαáàâãªä]/u", "a", $text);
    $text = preg_replace("/[∆лДΛдАÁÀÂÃÄ]/u", "A", $text);
    $text = preg_replace("/[ЂЪЬБъь]/u", "b", $text);
    $text = preg_replace("/[βвВ]/u", "B", $text);
    $text = preg_replace("/[çς©с]/u", "c", $text);
    $text = preg_replace("/[ÇС]/u", "C", $text);
    $text = preg_replace("/[δ]/u", "d", $text);
    $text = preg_replace("/[éèêëέëèεе℮ёєэЭ]/u", "e", $text);
    $text = preg_replace("/[ÉÈÊË€ξЄ€Е∑]/u", "E", $text);
    $text = preg_replace("/[₣]/u", "F", $text);
    $text = preg_replace("/[НнЊњ]/u", "H", $text);
    $text = preg_replace("/[ђћЋ]/u", "h", $text);
    $text = preg_replace("/[ÍÌÎÏ]/u", "I", $text);
    $text = preg_replace("/[íìîïιίϊі]/u", "i", $text);
    $text = preg_replace("/[Јј]/u", "j", $text);
    $text = preg_replace("/[ΚЌК]/u", 'K', $text);
    $text = preg_replace("/[ќк]/u", 'k', $text);
    $text = preg_replace("/[ℓ∟]/u", 'l', $text);
    $text = preg_replace("/[Мм]/u", "M", $text);
    $text = preg_replace("/[ñηήηπⁿ]/u", "n", $text);
    $text = preg_replace("/[Ñ∏пПИЙийΝЛ]/u", "N", $text);
    $text = preg_replace("/[óòôõºöοФσόо]/u", "o", $text);
    $text = preg_replace("/[ÓÒÔÕÖθΩθОΩ]/u", "O", $text);
    $text = preg_replace("/[ρφрРф]/u", "p", $text);
    $text = preg_replace("/[®яЯ]/u", "R", $text);
    $text = preg_replace("/[ГЃгѓ]/u", "r", $text);
    $text = preg_replace("/[Ѕ]/u", "S", $text);
    $text = preg_replace("/[ѕ]/u", "s", $text);
    $text = preg_replace("/[Тт]/u", "T", $text);
    $text = preg_replace("/[τ†‡]/u", "t", $text);
    $text = preg_replace("/[úùûüџμΰµυϋύ]/u", "u", $text);
    $text = preg_replace("/[√]/u", "v", $text);
    $text = preg_replace("/[ÚÙÛÜЏЦц]/u", "U", $text);
    $text = preg_replace("/[Ψψωώẅẃẁщш]/u", "w", $text);
    $text = preg_replace("/[ẀẄẂШЩ]/u", "W", $text);
    $text = preg_replace("/[ΧχЖХж]/u", "x", $text);
    $text = preg_replace("/[ỲΫ¥]/u", "Y", $text);
    $text = preg_replace("/[ỳγўЎУуч]/u", "y", $text);
    $text = preg_replace("/[ζ]/u", "Z", $text);

    // Punctuation
    $text = preg_replace("/[‚‚]/u", ",", $text);
    $text = preg_replace("/[`‛′’‘]/u", "'", $text);
    $text = preg_replace("/[″“”«»„]/u", '"', $text);
    $text = preg_replace("/[—–―−–‾⌐─↔→←]/u", '-', $text);
    $text = preg_replace("/[  ]/u", ' ', $text);

    $text = str_replace("…", "...", $text);
    $text = str_replace("≠", "!=", $text);
    $text = str_replace("≤", "<=", $text);
    $text = str_replace("≥", ">=", $text);
    $text = preg_replace("/[‗≈≡]/u", "=", $text);


    // Exciting combinations    
    $text = str_replace("ыЫ", "bl", $text);
    $text = str_replace("℅", "c/o", $text);
    $text = str_replace("₧", "Pts", $text);
    $text = str_replace("™", "tm", $text);
    $text = str_replace("№", "No", $text);
    $text = str_replace("Ч", "4", $text);
    $text = str_replace("‰", "%", $text);
    $text = preg_replace("/[∙•]/u", "*", $text);
    $text = str_replace("‹", "<", $text);
    $text = str_replace("›", ">", $text);
    $text = str_replace("‼", "!!", $text);
    $text = str_replace("⁄", "/", $text);
    $text = str_replace("∕", "/", $text);
    $text = str_replace("⅞", "7/8", $text);
    $text = str_replace("⅝", "5/8", $text);
    $text = str_replace("⅜", "3/8", $text);
    $text = str_replace("⅛", "1/8", $text);
    $text = preg_replace("/[‰]/u", "%", $text);
    $text = preg_replace("/[Љљ]/u", "Ab", $text);
    $text = preg_replace("/[Юю]/u", "IO", $text);
    $text = preg_replace("/[ﬁﬂ]/u", "fi", $text);
    $text = preg_replace("/[зЗ]/u", "3", $text);
    $text = str_replace("£", "(pounds)", $text);
    $text = str_replace("₤", "(lira)", $text);
    $text = preg_replace("/[‰]/u", "%", $text);
    $text = preg_replace("/[↨↕↓↑│]/u", "|", $text);
    $text = preg_replace("/[∞∩∫⌂⌠⌡]/u", "", $text);


    //2) Translation CP1252.
    $trans = get_html_translation_table(HTML_ENTITIES);
    $trans['f'] = '&fnof;';    // Latin Small Letter F With Hook
    $trans['-'] = array(
        '&hellip;', // Horizontal Ellipsis
        '&tilde;', // Small Tilde
        '&ndash;'       // Dash
    );
    $trans["+"] = '&dagger;';    // Dagger
    $trans['#'] = '&Dagger;';    // Double Dagger         
    $trans['M'] = '&permil;';    // Per Mille Sign
    $trans['S'] = '&Scaron;';    // Latin Capital Letter S With Caron        
    $trans['OE'] = '&OElig;';    // Latin Capital Ligature OE
    $trans["'"] = array(
        '&lsquo;', // Left Single Quotation Mark
        '&rsquo;', // Right Single Quotation Mark
        '&rsaquo;', // Single Right-Pointing Angle Quotation Mark
        '&sbquo;', // Single Low-9 Quotation Mark
        '&circ;', // Modifier Letter Circumflex Accent
        '&lsaquo;'  // Single Left-Pointing Angle Quotation Mark
    );

    $trans['"'] = array(
        '&ldquo;', // Left Double Quotation Mark
        '&rdquo;', // Right Double Quotation Mark
        '&bdquo;', // Double Low-9 Quotation Mark
    );

    $trans['*'] = '&bull;';    // Bullet
    $trans['n'] = '&ndash;';    // En Dash
    $trans['m'] = '&mdash;';    // Em Dash        
    $trans['tm'] = '&trade;';    // Trade Mark Sign
    $trans['s'] = '&scaron;';    // Latin Small Letter S With Caron
    $trans['oe'] = '&oelig;';    // Latin Small Ligature OE
    $trans['Y'] = '&Yuml;';    // Latin Capital Letter Y With Diaeresis
    $trans['euro'] = '&euro;';    // euro currency symbol
    ksort($trans);

    foreach ($trans as $k => $v) {
        $text = str_replace($v, $k, $text);
    }

    // 3) remove <p>, <br/> ...
    $text = strip_tags($text);

    // 4) &amp; => & &quot; => '
    $text = html_entity_decode($text);


    // transliterate
    // if (function_exists('iconv')) {
    // $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // }
    // remove non ascii characters
    // $text =  preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $text);      

    return $text;
}

?>