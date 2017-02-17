<?php
include 'vendor/autoload.php';
$routes = new SplObjectStorage();

$routes->attach(new Logger\FileRoute([
	'enabled' => true,
	'filePath' => 'default.log',
]));

$routes->attach(new Logger\SQLRoute([
	'enabled' => true,
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'dbtest',
	'table' => 'logs',
]));

$routes->attach(new Logger\StdoutRoute([
	'enabled' => true,
]));

$logger = new Logger\Logger($routes);

$logger->info("Info message");
$logger->alert("Alert message");
$logger->error("Error message");
$logger->debug("Debug message");
$logger->notice("Notice message");
$logger->warning("Warning message");
$logger->critical("Critical message");
$logger->emergency("Emergency message");