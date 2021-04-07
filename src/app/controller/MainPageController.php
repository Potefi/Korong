<?php

namespace app\controller;

class MainPageController extends MainController
{
    protected $controllerName = 'MainPage';
    public function actionIndex(){
        $this->title = "Korong lemezbolt";
        return $this->render('index');
    }
}