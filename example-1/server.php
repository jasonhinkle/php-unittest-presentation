<?php

require_once '../libs/ColorUtil.php';
require_once '../libs/NumberUtil.php';

$number = strip_tags( $_REQUEST['number'] );

$numUtil = new NumberUtil();

$text = $numUtil->GetWords($number);

$obj = array(
    "number"=>$number,
    "text"=>$text);

echo json_encode($obj);
