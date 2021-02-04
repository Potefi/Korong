<?php

namespace app\controller;

class ContactDetailsController extends MainController
{
    protected $controllerName = 'ContactDetails';
    public function actionIndex(){
        $this->title = "Kapcsolat";
        return $this->render('index');
    }
}