<?php
require_once '../classes/Psr4Autoloader.php';

// define path to application: http://some-domain.com/coding-challenges/some-developer-name or
// http://some-domain.com/coding-challenges
define('BASE_URL', 'http://localhost');


session_name('User');
session_start();
define('PRIVATE_ID', session_id());
session_write_close();

$loader = new Psr4Autoloader();
$loader->register();

$loader->addNamespace('MVC', '../controllers/');
$loader->addNamespace('MVC', '../models/');
$loader->addNamespace('MVC', '../classes/');

$request = new \MVC\Request();
$request->routeToController();