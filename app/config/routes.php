<?php

/**
 * @author Jete O'Keeffe
 * @version 1.0
 * @link http://docs.phalconphp.com/en/latest/reference/routing.html
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
	'method' => 'get', 
	'route' => '/ping', 
	'handler' => ['Controllers\ExampleController', 'pingAction']
];

return $routes;
