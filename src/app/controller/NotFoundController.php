<?php


namespace app\controller;


class NotFoundController extends MainController
{
    protected $controllerName = 'NotFound';
    public function actionIndex(){
        $this->title = "404 - Not Found";
        return $this->render('404');
    }
}