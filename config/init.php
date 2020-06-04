<?php

define("DEBUG", 1); // 1 - debug mode | 0 - production mode
define("ROOT", dirname(__DIR__));  // define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/amir/core');
define("LIBS", ROOT . '/vendor/amir/core/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/config');
define("LAYOUT", 'main');

define("IMG", 'public/images/');
define("CATEGORY", "product/category/");

// http://website/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

// http://website/public/
$app_path = preg_replace("#[^/]+$#", '', $app_path);

// http://website
$app_path = str_replace('/public/', '', $app_path);

define("PATH", $app_path);
define("ADMIN", PATH . '/admin');

require_once ROOT . '/vendor/autoload.php';
