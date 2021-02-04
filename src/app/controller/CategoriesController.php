<?php


namespace app\controller;


class CategoriesController extends MainController
{
    protected $controllerName = 'Categories';
    public function actionIndex(){
        $this->title = "Kategóriák";
        return $this->render('index');
    }
}