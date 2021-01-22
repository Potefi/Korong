<?php


namespace app\controller;


class SearchController extends MainController
{
    protected $controllerName = 'Search';
    public function actionIndex(){
        $this->title = "Részletes keresés";
        return $this->render('index');
    }
}