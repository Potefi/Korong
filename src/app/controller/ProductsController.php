<?php


namespace app\controller;


class ProductsController extends MainController
{
    protected $controllerName = 'Products';
    public function actionIndex(){
        $this->title = "Termékek";
        return $this->render('index');
    }
}