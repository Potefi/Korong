<?php

namespace app\controller;

class ContactDetailsController extends MainController
{
    protected $controllerName = 'ContactDetails';
    public function actionIndex(){
        $this->title = "Elérhetőség";
        return $this->render('index');
    }
}