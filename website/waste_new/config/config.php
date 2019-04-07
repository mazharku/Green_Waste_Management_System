<?php
ob_start();
session_start();
//session_regenerate_id();
error_reporting(E_ALL);

define('APP_ROOT', dirname(__DIR__));
define('DS', DIRECTORY_SEPARATOR);

define('WEBSITE_TITLE', 'Smart Waste Management System');
//define('WEBSITE_URL', 'http://waste.dgted.com/');

//define('DB_HOST', 'localhost');
 //define('DB_USER', 'csekua5_wms');
//define('DB_PASSWORD', 'uioewro%$#237894');
 //define('DB_NAME', 'csekua5_wms');

//define('WEBSITE_URL', 'http://localhost/waste_1/');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'smart_waste');

spl_autoload_register(function($class_name) {
	require_once APP_ROOT . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR .$class_name . '.php';
});
