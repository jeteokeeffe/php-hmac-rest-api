<?php

/**
 * Settings to be stored in dependency injector
 */

$settings = array(
	'database' => array(
		'adapter' => 'Mysql',	/* Possible Values: Mysql, Postgres, Sqlite */
		'host' => 'localhost',
		'username' => 'test',
		'password' => 'test',
		'name' => 'api',
		'port' => 3306
	),
);


return $settings;
