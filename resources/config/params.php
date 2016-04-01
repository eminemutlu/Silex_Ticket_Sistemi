<?php


$app['app.params'] = array(
	'db' => array(
		'driver' => 'pdo_mysql',	
		'host' => 'localhost',
		'dbname' => 'ticket',
		'user' => 'root',
		'password' => '123456',
	),
	'security' => array(
		'username' => 'emine',
		'role' => 'ROLE_USER',
		'password' => '1234',
	),
);
