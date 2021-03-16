<?php

use app\controller\AlbumController;
use app\controller\CartController;
use app\controller\CategoriesController;
use app\controller\ContactDetailsController;
use app\controller\MainPageController;
use app\controller\SearchController;
use app\controller\UserController;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

include ('vendor/autoload.php');

$whoops = new Run;
$whoops->pushHandler(new  PrettyPageHandler);
$whoops->register();

session_start();

$controllerName = !empty($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'MainPageController';
$actionName = !empty($_GET['action']) ? 'action' . ucfirst($_GET['action']) : 'actionIndex';

if ($controllerName == 'MainPageController'){
    $controller = new MainPageController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'ContactDetailsController')
{
    $controller = new ContactDetailsController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'CategoriesController')
{
    $controller = new CategoriesController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'SearchController')
{
    $controller = new SearchController();
    $content = $controller->actionIndex();
}
elseif($controllerName == 'UserController')
{
    $controller = new UserController();
    if($actionName == 'actionLogin')
    {
        $content = $controller->actionLogin();
    }
    elseif ($actionName == 'actionRegistration')
    {
        $content = $controller->actionRegistration();
    }
    elseif ($actionName == 'actionLogout')
    {
        $content = $controller->actionLogout();
    }
    elseif ($actionName == 'actionAccount')
    {
        $content = $controller->actionAccount();
    }
}
elseif($controllerName == 'AlbumController'){
    $controller = new AlbumController();
    $content = $controller->actionAlbumSelected($_GET['id']);
}
elseif($controllerName == 'CartController'){
    $controller = new CartController();
    if ($actionName == 'actionList') {
        $content = $controller->actionList();
    }elseif ($actionName == 'actionPlaceInCart'){
        $content = $controller->actionPlaceInCart();
    }elseif ($actionName == 'actionEmptyCart'){
        $content = $controller->actionEmptyCart();
    }elseif ($actionName == 'actionEmpty'){
        $content = $controller->actionEmpty();
    }elseif ($actionName == 'actionPurchase'){
        $content = $controller->actionPurchase();
    }elseif ($actionName == 'actionRemoveFromCart'){
        $content = $controller->actionRemoveFromCart($_GET['id']);
    }elseif ($actionName == 'actionModifyQuantity'){
        $content = $controller->actionModifyQuantity();
    }
}

$title = $controller->title;

include ("src/app/view/template/main-template.php");