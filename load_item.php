<?php

include_once './includes/set.php';

$pdo = connectPDO();
$keyword = '%' . $_POST['keyword'] . '%';
$keyword1 = '%' . $_POST['keyword'] . '%';
//$sql = "SELECT * FROM airport WHERE description LIKE (:keyword) OR code LIKE (:keyword) ORDER BY country_id ASC LIMIT 0, 20";
$sql = "SELECT airport.id as id, country_id, description, code, country.country as country FROM airport, country WHERE (description LIKE (:keyword) OR code LIKE (:keyword) OR country_id IN (Select id From country WHERE country LIKE (:keyword))) AND (country_id = country.id) ORDER BY country_id ASC LIMIT 0, 20";
//        ."UNION"
// $sql  =  "SELECT * FROM airport WHERE country_id IN (Select id From country WHERE country LIKE $keyword1) ORDER BY country_id ASC LIMIT 0, 20";
$query = $pdo->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
$string = "";
if (!empty($list)) {
    foreach ($list as $rs) {
//        $thecode = $rs['id'] . '-' . $rs['code'];
        $thecode = $rs['code'];
//	$country_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['country_nam);
        // add new option
        $string .= '<li class="dep_li_code_select">' . $rs['description'] .', '.$rs['country']. ' [' . $rs['code'] . ']' . '<input class="thecode" type="hidden" name="thecode" value="' . $thecode . '"/>' . '</li>';
    }
    echo $string;
} else {
    
}
?>