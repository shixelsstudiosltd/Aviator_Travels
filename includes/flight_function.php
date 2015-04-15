<?php

function prettyPrint($result, $file) {
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    $dom->loadXML($result);
    $dom->formatOutput = true;
    //call function to write request/response in file	
//	outputWriter($file,$dom->saveXML());
    return $dom->saveXML();
}

//function to write output in a file
function outputWriter($file, $content) {
    file_put_contents($file, $content); // Write request/response and save them in the File
}

function parseOutput($content) { //parse the Search response to get values to use in detail request
    $AirAvailabilitySearchRsp = $content; //use this if response is not saved anywhere else use above variable
    //echo $AirAvailabilitySearchRsp;
    $xml = simplexml_load_String("$AirAvailabilitySearchRsp", null, null, 'SOAP', true);

    if ($xml) {
        $error = FALSE;
        $Results = $xml->children('SOAP', true);
        foreach ($Results->children('SOAP', true) as $fault) {
            if (strcmp($fault->getName(), 'Fault') == 0) {
                $_SESSION['error'] = TRUE;
//            trigger_error("Error occurred request/response processing!", E_USER_ERROR);
            }
        }
        global $arrFlight1;
//    global $arrRef1;
        $count = 0;
        foreach ($Results->children('air', true) as $nodes) {
            foreach ($nodes->children('air', true) as $hsr) {
                if (strcmp($hsr->getName(), 'AirSegmentList') == 0) {
                    foreach ($hsr->children('air', true) as $hp) {
                        if (strcmp($hp->getName(), 'AirSegment') == 0) {
                            $count = $count + 1;
                            $arrFl = array();
                            foreach ($hp->attributes() as $a => $b) {
                                $GLOBALS[$a] = "$b";
                                //echo "$a"." : "."$b";
//								file_put_contents($fileName,$a." : ".$b."\r\n", FILE_APPEND);
                                $arrFl[$a] = (string) $b[0];
//                                                                $arrFl[$a] = $b;
                            }
                            $arrFlight1['AirSegment'][$count] = $arrFl;
                        }
                    }
                }
                //break;
            }
            getDetails();
        }
    } else {
         getDetails();
    }

    if (!empty($arrRef1) && !empty($arrFlight1)) {
        $error = TRUE;
    } else {
        $error = FALSE;
    }
}

function getDetails() {
    global $arrRef1;
    include_once 'set.php';
    $conn = connect();
//    $arrRef1 = array();
    $sql = "SELECT `airport`.id as air_id, `country`, `country`.id as country_id, `description`, `code` FROM `country`, `airport` WHERE `country`.id = `airport`.country_id AND 1";
    if ($result = $conn->query($sql)) {
        if ($result->num_rows > 0) {
            while ($row1 = $result->fetch_assoc()) {
                $arrRef1[$row1['code']] = $row1;
            }
//            die(print_r($arrRef1));
        }
    } else {
        die($conn->error);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

