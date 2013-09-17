<?php

/**
 * Driver for PHP HMAC Restful API using PhalconPHP's Micro framework
 * 
 * @package None
 * @author  Jete O'Keeffe 
 * @license none
 */


// Setup configuration files
$dir = dirname(__DIR__);
$appDir = $dir . '/app';

// Necessary requires to get things going
require $appDir . '/library/utilities/debug/PhpError.php';
require $appDir . '/library/interfaces/IRun.php';
require $appDir . '/library/application/Micro.php';

// Capture runtime errors
register_shutdown_function(['Utilities\Debug\PhpError','runtimeShutdown']);

// Necessary paths to autoload & config settings
$configPath = $appDir . '/config/';
$config = $configPath . 'config.php';
$autoLoad = $configPath . 'autoload.php';
$routes = $configPath . 'routes.php';

use \Models\Api as Api;

try {
	$app = new Application\Micro();

	// Record any php warnings/errors
	set_error_handler(['Utilities\Debug\PhpError','errorHandler']);

	// Setup App (dependency injector, configuration variables and autoloading resources/classes)
	$app->setAutoload($autoLoad, $appDir);
	$app->setConfig($config);

	// Get Authentication Headers
	$clientId = $app->request->getHeader('API_ID');
	$time = $app->request->getHeader('API_TIME');
	$hash = $app->request->getHeader('API_HASH');

	$privateKey = Api::findFirst($clientId)->private_key;
	
	$data = ${"_" . $_SERVER['REQUEST_METHOD']};
	$message = new \Micro\Messages\Auth($clientId, $time, $hash, $data);

	// Setup HMAC Authentication callback to validate user before routing message
	// Failure to validate will stop the process before going to proper Restful Route
	$app->setEvents(new \Micro\Events\HmacAuthenticate($message, $privateKey));	

	// Setup RESTful Routes
	$app->setRoutes($routes);

	// Boom, Run
	$app->run();

} catch(Exception $e) {
	// Do Something I guess, return Server Error message
	$app->response->setStatusCode(500, "Server Error");
	$app->response->setContent($e->getMessage());
	$app->response->send();
}
