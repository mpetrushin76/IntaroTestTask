<?php


// общие настройки

ini_set('display_errors',1);
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
