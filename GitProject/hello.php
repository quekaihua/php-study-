<?php
ini_set("display_errors", 1);
ini_set("error_reporting", E_ALL);
include_once('./vendor/autoload.php');

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
try{
$container = new League\Container\Container;

$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function(){
	return Zend\Diactoros\ServerRequestFactory::fromGlobals(
		$_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
	);
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);
$route = new League\Route\RouteCollection($container);

$route->map('GET', '/', function(ServerRequestInterface $request, ResponseInterface $response){
	$response->getBody()->write('<h1>Hello, World!</h1>');
	return $response;
});

$response = $route->dispatch($container->get('request'), $container->get('response'));
$container->get('emitter')->emit($response);
} catch(Exception $e){
	echo $e->getMessage();
}