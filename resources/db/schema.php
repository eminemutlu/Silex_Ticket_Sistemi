<?php


$schema = new \Doctrine\DBAL\Schema\Schema();

/*$post = $schema->createTable('post');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('title', 'string', array('length' => 32));
$post->setPrimaryKey(array('id'));
*/

$post = $schema->createTable('user');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('username', 'string', array('length' => 32));
$post->addColumn('email', 'string', array('length' => 255));
$post->addColumn('password', 'string', array('length' => 255));
$post->addColumn('permissions', 'text');
$post->addColumn('activated', 'string', array('length' => 255));
$post->addColumn('first_name', 'string', array('length' => 255));
$post->addColumn('last_name', 'string', array('length' => 255));
$post->addColumn('title', 'string', array('length' => 255));
$post->addColumn('last_login', 'string', array('length' => 255));
$post->addColumn('created_at',  'string', array('length' => 255));
$post->addColumn('updated_at', 'string', array('length' => 255));
$post->setPrimaryKey(array('id'));




$post = $schema->createTable('user_role');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('name', 'string', array('length' => 32));
$post->addColumn('permissions', 'string', array('length' => 32));
$post->setPrimaryKey(array('id'));


$post = $schema->createTable('forms_ticket');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('user_id', 'integer', array('length' => 32));
$post->addColumn('subject', 'string', array('length' => 255));
$post->addColumn('content', 'text');
$post->addColumn('status', 'string', array('length' => 255));
$post->addColumn('level', 'string', array('length' => 255));
$post->addColumn('file', 'string', array('length' => 255));
$post->addColumn('created_at',  'string', array('length' => 255));
$post->addColumn('updated_at', 'string', array('length' => 255));
$post->setPrimaryKey(array('id'));


$post = $schema->createTable('forms_messages');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('user_id', 'integer');
$post->addColumn('form_id',  'integer');
$post->addColumn('messages', 'text');
$post->addColumn('created_at',  'string', array('length' => 255));
$post->addColumn('updated_at', 'string', array('length' => 255));
$post->setPrimaryKey(array('id'));


$post = $schema->createTable('category');
$post->addColumn('id', 'integer', array('unsigned' => true, 'autoincrement' => true));
$post->addColumn('category_name', 'string', array('length' => 32));
$post->addColumn('status', 'string', array('length' => 255));
$post->addColumn('created_at',  'string', array('length' => 255));
$post->addColumn('updated_at', 'string', array('length' => 255));
$post->setPrimaryKey(array('id'));


return $schema;
