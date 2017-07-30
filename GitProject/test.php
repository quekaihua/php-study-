<?php
    include './vendor/autoload.php';
    
    use GuzzleHttp\Client;

    $client = new Client([
		'base_uri' => 'http://hbjr.jinrgame.com/',
		'timeout'  => 2.0
	]);
    $response = $client->request('GET', '/TaskAndWelfare/getGameData');
    $response = $response->send();
    var_dump($response);
