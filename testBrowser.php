<?php
include './vendor/autoload.php';
$browser = new Buzz\Browser();
$response = $browser->get('http://www.baidu.com');
echo $browser->getLastRequest() . PHP_EOL;
// echo $response;