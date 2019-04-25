<?php 
$associates = array('requests' => "Мои заявки", 'auth' => "Авторизация", 'register' => "Регистрация", 'create' => "Новая заявка", 'requests/([0-9]+)' => "Заявка"); 
$uri = trim($_SERVER["REQUEST_URI"], '/');
$title = "";
foreach($associates as $uriPattern => $path)
{
    if(preg_match("~$uriPattern~", $uri))
    {
        $title=$associates[$uriPattern];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/TestTask/Styles/main.css">
    <title><?php echo $title; ?></title>
</head>
