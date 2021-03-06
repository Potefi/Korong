<?php


namespace app\controller;


use app\model\Album;
use app\model\Product;


class CartController extends MainController
{
    protected $controllerName = 'Cart';

    public function actionPlaceInCart(){
        $album = Album::findOneById(Product::findOneById($_POST['id'])->getAlbumId())->getId();
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = [];
        }
        if ($_POST['quantity'] != 0) {
            if (isset($_SESSION['cart'][$_POST['id']])) {
                $_SESSION['cart'][$_POST['id']] += $_POST['quantity'];
            } else {
                $_SESSION['cart'][$_POST['id']] = $_POST['quantity'];
            }
        }else{
            $_SESSION['cantPlaceNullInCart'] = 'Nem választottál ki semmiből sem legalább egyet!';
            header("Location: index.php?controller=album&action=albumSelected&id={$album}");
            exit();
        }
        $_SESSION['placeInCurtSuccessful'] = 'true';
        header("Location: index.php?controller=album&action=albumSelected&id={$album}");
        exit();
    }

    public function actionEmptyCart(){
        $_SESSION['cart'] = '';
        unset($_SESSION['cart']);
        header("Location: index.php");
        exit();
    }

    public function actionList(){
        $products = [];
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $quantity){
                $products[$id] = Product::findOneById($id);
            }
        }
        $this->title = "Kosár";
        return $this->render('index',[
            'products' => $products
        ]);
    }
}