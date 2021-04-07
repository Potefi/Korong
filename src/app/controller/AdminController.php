<?php


namespace app\controller;


use app\model\Album;
use app\model\Artist;

// Assist function to check if a PNG/JPG was uploaded
function endsWith($haystack, $needle) {
    return $needle === "" || (substr($haystack, -strlen($needle)) === $needle);
}

class AdminController extends MainController
{
    protected $controllerName = 'Admin';
    public function actionIndex(){
        $this->title = 'Admin';
        return $this->render('index');
    }

    // Functions for artist page
    public function actionArtists(){
        $this->title = 'Admin';
        return $this->render('artists');
    }
    public function actionModifyArtist(){
        $this->title = 'Admin';
        if (isset($_GET['id']) && $_POST[$_GET['id']] && !empty($_POST[$_GET['id']])) {
            if (Artist::updateArtist($_GET['id'], $_POST[$_GET['id']])){
                $_SESSION['successfulUpdate'] = 'sikeres';
            }else{
                $_SESSION['successfulUpdate'] = 'sikertelen';
            }
        }else{
            $_SESSION['successfulUpdate'] = 'sikertelen';
        }
        header('Location: /zarodolgozat/?controller=admin&action=artists');
        exit();
    }
    public function actionDeleteArtist(){
        if (isset($_GET['id'])){
            Artist::deleteArtist($_GET['id']);
            if (Artist::findOneById($_GET['id']) == false){
                $_SESSION['successfulDelete'] = 'sikeres';
            }else{
                $_SESSION['successfulDelete'] = 'sikertelen';
            }
        }else{
            $_SESSION['successfulDelete'] = 'sikertelen';
        }
        header('Location: /zarodolgozat/?controller=admin&action=artists');
        exit();
    }
    public function actionNewArtist(){
        if (isset($_POST['name']) && !empty($_POST['name']))
        {
            if(Artist::newArtist($_POST['name'])) {
                header('Location: /zarodolgozat/?controller=admin&action=artists');
                exit();
            }else{
                $_SESSION['errorMadeByUser'] = 'errorWhileUploadingToDatabase';
            }
        }
        $this->title = 'Admin';
        return $this->render('artists');
    }

    // FUnctions for album page
    public function actionAlbums(){
        $this->title = 'Admin';
        return $this->render('albums');
    }
    public function actionModifyAlbum(){
        $this->title = 'Admin';
        if (!isset($_GET['id'])){
            if (isset($_POST['album'])){
                if(isset($_FILES['cover']) && !empty($_FILES['cover']['name']) && Album::updateAlbum($_POST['album'], $_FILES)) {
                    header('Location: /zarodolgozat/?controller=admin&action=albums');
                    exit();
                }else {
                    if (!Album::updateAlbumWithoutCover($_POST['album'])) {
                        $_SESSION['successfulUpdate'] = 'sikertelen';
                        header('Location: /zarodolgozat/?controller=admin&action=modifyAlbum&id=' . $_POST['album']['id']);
                        exit();
                    }
                }
            }
            header('Location: /zarodolgozat/?controller=admin&action=albums');
            exit();
        }
        return $this->render('modifyAlbum');
    }
    public function actionDeleteAlbum(){
        if (isset($_GET['id'])){
            Album::deleteAlbum($_GET['id']);
            if (Album::findOneById($_GET['id']) == false){
                $_SESSION['successfulDelete'] = 'sikeres';
            }else{
                $_SESSION['successfulDelete'] = 'sikertelen';
            }
        }else{
            $_SESSION['successfulDelete'] = 'sikertelen';
        }
        header('Location: /zarodolgozat/?controller=admin&action=albums');
        exit();
    }
    public function actionNewAlbum(){
        if (isset($_POST['album']) && !empty($_POST['album']))
        {
            if(Album::newAlbum($_POST['album'], $_FILES)) {
                header('Location: /zarodolgozat/?controller=admin&action=albums');
                exit();
            }else{
                $_SESSION['errorMadeByUser'] = 'errorWhileUploadingToDatabase';
            }
        }
        $this->title = 'Admin';
        return $this->render('newAlbum');
    }
}