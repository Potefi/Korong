<?php


namespace app\controller;


use app\model\Album;

class AlbumController extends MainController
{
    protected $controllerName = 'Album';
    public function actionAlbumSelected($id){
        $this->title = Album::findOneById($id)->getTitle();
        return $this->render('albumSelected');
    }
}