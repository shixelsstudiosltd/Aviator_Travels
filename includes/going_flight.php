<?php

//die("$depart_code - $destin_code - $depart_date");
 $_SESSION['error'] = FALSE;
$TARGETBRANCH = 'P105199';
$CREDENTIALS = 'Universal API/uAPI2765763013:ZDQP8pjqpjEXmnHbewJZ9dGFG';
$Provider = '1G'; // Any provider you want to use like 1G/1P/1V/ACH

//$depart_code = 'SXF'; // $arrParams[4];
//$destin_code = 'LOS'; // $arrParams[4];
//$depart_date = '2015-04-10'; // $arrParams[4];

$depart_code_g = $GLOBALS['DEPART_CODE'];// =$params_new['DEPART_CODE']; // $arrParams[4];
$destin_code_g = $GLOBALS['DESTIN_CODE'];// = $destin_code = $params_new['DESTIN_CODE']; // $arrParams[4];
$depart_date_g = $GLOBALS['START'];// = $depart_date = $params_new['START']; // $arrParams[4];
$arrive_date_g = $GLOBALS['END'];// = $arrive_date = $params_new['END']; // $arrParams[4];
//die($depart_code_g.$destin_code_g);
$status = FALSE;
global $message;
$message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
   <soapenv:Header/>
   <soapenv:Body>
      <air:AvailabilitySearchReq TraceId="trace" AuthorizedBy="user" TargetBranch="$TARGETBRANCH" xmlns:air="http://www.travelport.com/schema/air_v29_0" xmlns:com="http://www.travelport.com/schema/common_v29_0">
         <com:BillingPointOfSaleInfo OriginApplication="UAPI"/>
         <air:SearchAirLeg>
            <air:SearchOrigin>
               <com:Airport Code="$depart_code_g"/>
            </air:SearchOrigin>
            <air:SearchDestination>
               <com:Airport Code="$destin_code_g"/>
            </air:SearchDestination>
            <air:SearchDepTime PreferredTime="$depart_date_g">
            </air:SearchDepTime>            
         </air:SearchAirLeg>
         <air:AirSearchModifiers>
            <air:PreferredProviders>
               <com:Provider Code="$Provider"/>
            </air:PreferredProviders>
         </air:AirSearchModifiers>
      </air:AvailabilitySearchReq>
   </soapenv:Body>
</soapenv:Envelope>
EOM;

$file = "001-" . $Provider . "_AirAvailabilityReq.xml"; // file name to save the request xml for test only(if you want to save the request/response)
prettyPrint($message, $file); //call function to pretty print xml

$auth = base64_encode("$CREDENTIALS");
$soap_do = curl_init("https://americas.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
$header = array(
    "Content-Type: text/xml;charset=UTF-8",
    "Accept: gzip,deflate",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"\"",
    "Authorization: Basic $auth",
    "Content-length: " . strlen($message),
);
//curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30); 
//curl_setopt($soap_do, CURLOPT_TIMEOUT, 30); 
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($soap_do, CURLOPT_POST, true);
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true); // this will prevent the curl_exec to return result and will let us to capture output
$return = curl_exec($soap_do);

$file = "001-" . $Provider . "_AirAvailabilityRsp.xml"; // file name to save the response xml for test only(if you want to save the request/response)
$content = prettyPrint($return, $file);
if(!empty($content))
    parseOutput($content);




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
    } else {
//        $error_status = 
    }


    $count = 0;
    $fileName = "flights.txt";
    if (file_exists($fileName)) {
        file_put_contents($fileName, "");
    }
    
    global $arrFlight1;
    global $arrRef1;
    foreach ($Results->children('air', true) as $nodes) {
        foreach ($nodes->children('air', true) as $hsr) {
            if (strcmp($hsr->getName(), 'AirSegmentList') == 0) {
                
                foreach ($hsr->children('air', true) as $hp) {
                    if (strcmp($hp->getName(), 'AirSegment') == 0) {
                        $count = $count + 1;
                        $arrFl = array();
                        foreach ($hp->attributes() as $a => $b) {
                            $GLOBALS[$a] = "$b";
//                            echo "$a"." : "."$b";
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
    }
//    if(!empty($arrFlight1['AirSegment'])){
//     die('Niyi Rabiu mmmm');
        
         $GLOBALS['goingFlight'] =  $_SESSION['goingFlight'] = $arrFlight1['AirSegment'];
//         die(print_r($GLOBALS['goingFlight']));
//    } 
//    else {
//         $_SESSION['goingFlight'] = 'empty';
//    }
  
//    die(print_r($_SESSION['goingFlight']));
    //fetch refrence record from db
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
   $_SESSION['arrRef1'] = $arrRef1;

}

///return flight array
$message_r = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
   <soapenv:Header/>
   <soapenv:Body>
      <air:AvailabilitySearchReq TraceId="trace" AuthorizedBy="user" TargetBranch="$TARGETBRANCH" xmlns:air="http://www.travelport.com/schema/air_v29_0" xmlns:com="http://www.travelport.com/schema/common_v29_0">
         <com:BillingPointOfSaleInfo OriginApplication="UAPI"/>
         <air:SearchAirLeg>
            <air:SearchOrigin>
               <com:Airport Code="$destin_code_g"/>
            </air:SearchOrigin>
            <air:SearchDestination>
               <com:Airport Code="$depart_code_g"/>
            </air:SearchDestination>
            <air:SearchDepTime PreferredTime="$arrive_date_g">
            </air:SearchDepTime>            
         </air:SearchAirLeg>
         <air:AirSearchModifiers>
            <air:PreferredProviders>
               <com:Provider Code="$Provider"/>
            </air:PreferredProviders>
         </air:AirSearchModifiers>
      </air:AvailabilitySearchReq>
   </soapenv:Body>
</soapenv:Envelope>
EOM;

$file = "001-" . $Provider . "_AirAvailabilityReq.xml"; // file name to save the request xml for test only(if you want to save the request/response)
prettyPrintr($message_r, $file); //call function to pretty print xml

$auth = base64_encode("$CREDENTIALS");
$soap_do = curl_init("https://americas.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
$header = array(
    "Content-Type: text/xml;charset=UTF-8",
    "Accept: gzip,deflate",
    "Cache-Control: no-cache",
    "Pragma: no-cache",
    "SOAPAction: \"\"",
    "Authorization: Basic $auth",
    "Content-length: " . strlen($message_r),
);
//curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30); 
//curl_setopt($soap_do, CURLOPT_TIMEOUT, 30); 
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($soap_do, CURLOPT_POST, true);
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message_r);
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, true); // this will prevent the curl_exec to return result and will let us to capture output
$return = curl_exec($soap_do);

$file = "001-" . $Provider . "_AirAvailabilityRsp.xml"; // file name to save the response xml for test only(if you want to save the request/response)
$content = prettyPrintr($return, $file);
if(!empty($content))
    parseOutputr($content);




function prettyPrintr($result, $file) {
    $dom = new DOMDocument;
    $dom->preserveWhiteSpace = false;
    $dom->loadXML($result);
    $dom->formatOutput = true;
    //call function to write request/response in file	
//	outputWriter_r($file,$dom->saveXML());
    return $dom->saveXML();
}

//function to write output in a file
function outputWriter_r($file, $content) {
    file_put_contents($file, $content); // Write request/response and save them in the File
}

function parseOutputr($content) { //parse the Search response to get values to use in detail request
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
    } else {
//        $error_status = 
    }


    $count = 0;
    $fileName = "flights.txt";
    if (file_exists($fileName)) {
        file_put_contents($fileName, "");
    }
    
    global $arrFlightr;
//    global $arrRef1;
    foreach ($Results->children('air', true) as $nodes) {
        foreach ($nodes->children('air', true) as $hsr) {
            if (strcmp($hsr->getName(), 'AirSegmentList') == 0) {
                
                foreach ($hsr->children('air', true) as $hp) {
                    if (strcmp($hp->getName(), 'AirSegment') == 0) {
                        $count = $count + 1;
                        $arrFl = array();
                        foreach ($hp->attributes() as $a => $b) {
                            $GLOBALS[$a] = "$b";
//                            echo "$a"." : "."$b";
//								file_put_contents($fileName,$a." : ".$b."\r\n", FILE_APPEND);
                            $arrFl[$a] = (string) $b[0];
//                                                                $arrFl[$a] = $b;
                        }
                        $arrFlightr['AirSegment'][$count] = $arrFl;
                    }
                }
            }
            //break;
        }
    }
    $GLOBALS['returnFlight'] = $arrFlightr['AirSegment'];
}
//        $_SESSION['goingFlight'] = $arrFlight1['AirSegment'];
//        print_r($GLOBALS['goingFlight']);
//        echo '<br><br><br>';
       $_SESSION['returnFlight'] = $arrFlightr['AirSegment'];
//        print_r($GLOBALS['returnFlight']);
//        print_r($GLOBALS['returnFlight']);
//          header('Location:flight_search_result');

?>
