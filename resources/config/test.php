<?php

$app['debug'] = true;

// Doctrine: DB options
$app['db.options'] = array(
	'dbname' => 'ticket',
    'user' => 'root',
    'password' => '123456',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',	
);
