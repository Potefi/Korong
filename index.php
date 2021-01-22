<?php

include ('vendor/autoload.php');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new  \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$controllerName = !empty($_GET['controller'])?ucfirst($_GET['controller']).'Controller':'MainPageController';

if ($controllerName == 'MainPageController'){
    $controller = new \app\controller\MainPageController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'ContactDetailsController')
{
    $controller = new \app\controller\ContactDetailsController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'ProductsController')
{
    $controller = new \app\controller\ProductsController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'SearchController')
{
    $controller = new \app\controller\SearchController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'LoginController')
{
    $controller = new \app\controller\LoginController();
    $content = $controller->actionIndex();
}

$title = $controller->title;

include ("src/app/view/template/main-template.php");