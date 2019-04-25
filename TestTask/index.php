<?php


// общие настройки

ini_set('display_errors',0);
error_reporting(E_ALL);

// подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/Components/Router.php');
require_once(ROOT.'/Config/DB.php');
//
?>

<?php
// Вызов Router
$router = new Router();
$router->run();
?>

