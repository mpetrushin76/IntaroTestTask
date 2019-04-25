<?php


// общие настройки

ini_set('display_errors',1);
error_reporting(E_ALL);

// подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/Components/Router.php');
require_once(ROOT.'/Config/DB.php');
//



// Вызов Router
spl_autoload_register(function ($class_name) {
    include ROOT.'/Models/'. $class_name . '.php';
});
$router = new Router();
$router->run();
?>

