<?php

/**
 * Auto Load Class files by namespace
 *
 * @eg 
 	'namespace' => '/path/to/dir'
 */

$autoload = [
	'Database' => $dir . '/library/database/',
	'Micro\Events' => $dir . '/library/micro/events/',
	'Micro\Messages' => $dir . '/library/micro/messages/',
	'Utilities\Debug' => $dir . '/library/utilities/debug/',
	'Security\Hmac' => $dir . '/library/security/hmac/',
	'Application' => $dir . '/library/application/',
	'Interfaces' => $dir . '/library/interfaces/',
	'Controllers' => $dir . '/controllers/',
	'Models' => $dir . '/models/'
];

return $autoload;
