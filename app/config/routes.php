<?php

/**
 * @author Jete O'Keeffe
 * @version 1.0
 * @link http://docs.phalconphp.com/en/latest/reference/micro.html#defining-routes
 * @eg.

$routes[] = [
 	'method' => 'post', 
	'route' => '/api/update', 
	'handler' => 'myFunction'
];

 */

$routes[] = [
	'method' => 'post', 
	'route' => '/ping', 
	'handler' => ['Controllers\ExampleController', 'pingAction']
];


$routes[] = [
	'method' => 'post', 
	'route' => '/test/{id}', 
	'handler' => ['Controllers\ExampleController', 'testAction']
];

$routes[] = [
	'method' => 'post', 
	'route' => '/skip/{name}', 
	'handler' => ['Controllers\ExampleController', 'skipAction'],
    'authentication' => FALSE
];

$routes[] = [
	'method' => 'get', 
	'route' => '/ping', 
	'handler' => ['Controllers\ExampleController', 'getAction']
];

$routes[] = [
	'method' => 'put', 
	'route' => '/ping', 
	'handler' => ['Controllers\ExampleController', 'putAction']
];

$routes[] = [
	'method' => 'delete', 
	'route' => '/ping', 
	'handler' => ['Controllers\ExampleController', 'deleteAction']
];

return $routes;
