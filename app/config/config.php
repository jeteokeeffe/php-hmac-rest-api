<?php

/**
 * Settings to be stored in dependency injector
 */

$settings = array(
	'phalcon' => array(
		'autoloadFile' => '/app/config/autoload.php',
		'controllersDir' => '/app/controllers/',
		'modelsDir' => '/app/models/',
		'viewsDir' => dirname(__DIR__) . '/views/',
		'tasksDir' => '/app/cli/',
		'defaultProfilePic' => '/img/default-profile.jpg',
		'defaultProfilePicTiny' => '/img/default-profile-tiny.jpg'
	),
	'database' => array(
		'adapter' => 'Mysql',
		'host' => 'localhost',
		'username' => 'test',
		'password' => 'test',
		'name' => 'api',
		'port' => 3306
	),
);


return $settings;
