<?php

require_once '../libs/ColorUtil.php';
require_once '../libs/NumberUtil.php';

$number = strip_tags(
    isset($_REQUEST['number'])
        ? $_REQUEST['number']
        : ''
);

$numUtil = new NumberUtil();

$result = new stdClass();
$result->number = $number;

try {
    $result->text = $numUtil->GetWords($number);
}
catch (Exception $ex) {
    $result->error = $ex->getMessage();
}



echo json_encode($result);
