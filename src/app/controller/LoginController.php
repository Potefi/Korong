<?php


namespace app\controller;


class LoginController extends MainController
{
    protected $controllerName = 'Login';
    public function actionIndex(){
        $this->title = "Bejelentkezés";
        return $this->render('index');
    }
}