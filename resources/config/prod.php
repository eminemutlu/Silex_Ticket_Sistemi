<?php

require __DIR__.'/params.php';

//Local
$app['locale'] = 'tr';
$app['session.defoult_locale'] = $app['locale'];
$app['translator.messages'] = array(
	'fr' => __DIR__.'/../resources/locales/fr.yml',
);

//Cache
$app['cache.path'] = __DIR__.'/../cache';


// Doctrine: DB options
$app['db.options'] = array(

	/*'dbname' => 'ticket',
    'user' => 'root',
    'password' => '123456',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',*/	
    'driver' => $app['app.params']['db']['driver'],	
    'host' => $app['app.params']['db']['host'],	
	'dbname' => $app['app.params']['db']['dbname'],	
    'user' => $app['app.params']['db']['user'],	
    'password' => $app['app.params']['db']['password'],	
);

//User
//$app['security.users'] = array('username' => array('ROLE_USER', 'pasword'));

$app['security.users'] = array(
	$app['app.params']['security']['username'] => array(
		$app['app.params']['security']['role'],
		$app['app.params']['security']['password'],
	),
);





