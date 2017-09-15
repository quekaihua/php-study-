<?php
include './vendor/autoload.php';

// $html = file_get_contents('http://iphoneimei.info/?imei=355376070016246');
// file_put_contents('./doms/imei.html', $html);
use DiDom\Document;
$result = [];
$document = new Document('./doms/imei.html', true);

$infoDocument = $document->find('.div-res');

$nameElement = $document->find('.model');

$name = trim($nameElement[0]->text());
$result['name'] = $name;
$colorElement = $document->find('.color');

$color =  trim($colorElement[0]->text());
$result['color'] = $color;
$fieldElements = $document->find('.field');
foreach($fieldElements as $element){
    $files = trim($element->text());
    $temp = explode(':', $files);
    $key = $temp[0];
    $value = $temp[1];
    $result[$key] = $value;
}

print_r($result);