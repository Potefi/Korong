<?php

use app\controller\AlbumController;
use app\controller\CartController;
use app\controller\CategoriesController;
use app\controller\ContactDetailsController;
use app\controller\MainPageController;
use app\controller\NotFoundController;
use app\controller\SearchController;
use app\controller\UserController;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

include ('vendor/autoload.php');

$whoops = new Run;
$whoops->pushHandler(new  PrettyPageHandler);
$whoops->register();

session_start();

$controller = new NotFoundController();
$content = $controller->actionIndex();

$controllerName = !empty($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : '';
$actionName = !empty($_GET['action']) ? 'action' . ucfirst($_GET['action']) : 'actionIndex';

if ($_SERVER['REQUEST_URI'] == '/zarodolgozat/'){
    $controllerName = 'MainPageController';
}


if ($controllerName == 'MainPageController'){
    if ($actionName == 'actionIndex') {
        $controller = new MainPageController();
        $content = $controller->actionIndex();
    }
}
elseif($controllerName == 'ContactDetailsController')
{
    if ($actionName == 'actionIndex') {
        $controller = new ContactDetailsController();
        $content = $controller->actionIndex();
    }
}
elseif($controllerName == 'CategoriesController')
{
    if ($actionName == 'actionIndex') {
        $controller = new CategoriesController();
        $content = $controller->actionIndex();
    }
}
elseif($controllerName == 'SearchController')
{
    if ($actionName == 'actionIndex') {
        $controller = new SearchController();
        $content = $controller->actionIndex();
    }
}
elseif($controllerName == 'UserController')
{
    if($actionName == 'actionLogin')
    {
        $controller = new UserController();
        $content = $controller->actionLogin();
    }
    elseif ($actionName == 'actionRegistration')
    {
        $controller = new UserController();
        $content = $controller->actionRegistration();
    }
    elseif ($actionName == 'actionLogout')
    {
        $controller = new UserController();
        $content = $controller->actionLogout();
    }
    elseif ($actionName == 'actionAccount')
    {
        $controller = new UserController();
        $content = $controller->actionAccount();
    }
}
elseif($controllerName == 'AlbumController'){
    if ($actionName == 'actionAlbumSelected') {
        $controller = new AlbumController();
        $content = $controller->actionAlbumSelected($_GET['id']);
    }
}
elseif($controllerName == 'CartController'){
    if ($actionName == 'actionList') {
        $controller = new CartController();
        $content = $controller->actionList();
    }elseif ($actionName == 'actionPlaceInCart'){
        $controller = new CartController();
        $content = $controller->actionPlaceInCart();
    }elseif ($actionName == 'actionEmptyCart'){
        $controller = new CartController();
        $content = $controller->actionEmptyCart();
    }elseif ($actionName == 'actionEmpty'){
        $controller = new CartController();
        $content = $controller->actionEmpty();
    }elseif ($actionName == 'actionPurchase'){
        $controller = new CartController();
        $content = $controller->actionPurchase();
    }elseif ($actionName == 'actionRemoveFromCart'){
        $controller = new CartController();
        $content = $controller->actionRemoveFromCart($_GET['id']);
    }elseif ($actionName == 'actionModifyQuantity'){
        $controller = new CartController();
        $content = $controller->actionModifyQuantity();
    }
}

$title = $controller->title;

if (is_a($controller, NotFoundController::class)){
    header('HTTP/1.0 404 Not Found');
    $title = '404 - Not Found';
}


include ("src/app/view/template/main-template.php");