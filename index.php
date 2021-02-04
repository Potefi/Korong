<?php

include ('vendor/autoload.php');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new  \Whoops\Handler\PrettyPageHandler);
$whoops->register();

session_start();

$controllerName = !empty($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'MainPageController';
$actionName = !empty($_GET['action']) ? 'action' . ucfirst($_GET['action']) : 'actionIndex';

if ($controllerName == 'MainPageController'){
    $controller = new \app\controller\MainPageController();
    $_SESSION['errorMadeByUser'] = '';
    $content = $controller->actionIndex();
}
elseif($controllerName == 'ContactDetailsController')
{
    $controller = new \app\controller\ContactDetailsController();
    $_SESSION['errorMadeByUser'] = '';
    $content = $controller->actionIndex();
}
elseif($controllerName == 'CategoriesController')
{
    $controller = new \app\controller\CategoriesController();
    $_SESSION['errorMadeByUser'] = '';
    $content = $controller->actionIndex();
}
elseif($controllerName == 'SearchController')
{
    $controller = new \app\controller\SearchController();
    $_SESSION['errorMadeByUser'] = '';
    $content = $controller->actionIndex();
}
elseif($controllerName == 'UserController')
{
    $controller = new \app\controller\UserController();
    if($actionName == 'actionLogin')
    {
        $content = $controller->actionLogin();
    }
    elseif ($actionName == 'actionRegistration')
    {
        $content = $controller->actionRegistration();
        $_SESSION['errorMadeByUser'] = '';
    }
    elseif ($actionName == 'actionLogout')
    {
        $content = $controller->actionLogout();
    }
    elseif ($actionName == 'actionAccount')
    {
        $content = $controller->actionAccount();
        $_SESSION['errorMadeByUser'] = '';
    }
}

$title = $controller->title;

include ("src/app/view/template/main-template.php");