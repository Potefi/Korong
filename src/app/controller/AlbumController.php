<?php


namespace app\controller;


use app\model\Album;
use app\model\Artist;

class AlbumController extends MainController
{
    protected $controllerName = 'Album';
    public function actionAlbumSelected($id){
        $album = Album::findOneById($id);
        $this->title = $album->getTitle() . ' - ' . Artist::findOneById($album->getArtistId())->getName();
        return $this->render('albumSelected');
    }
}