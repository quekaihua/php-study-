<?php
include './vendor/autoload.php';
$client = new \GuzzleHttp\Client();
$res = $client->request('GET', 'http://hbjr.jinrgame.com/BrandPromo/msg');
echo $res->getStatusCode();
echo $res->getHeaderLine('content-type');
echo $res->getBody();