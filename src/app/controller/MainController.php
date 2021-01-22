<?php

namespace app\controller;

class MainController
{
    protected $controllerName = '';
    public $title = "";

    protected function render($view, $data = []){
        extract($data);
        ob_start();
        include ("src/app/view/{$this->controllerName}/{$view}.php");
        $content = ob_get_clean();
        return $content;
    }
}