<?php

define('ROOT_PATH', dirname(__DIR__));
define('PUBLIC_PATH', __DIR__);

require_once(ROOT_PATH.'/vendor/autoload.php');

set_exception_handler("\System\ExceptionHandler::run");

$app = new \System\Application();
$app->run();