<?php


namespace app\controller;


use app\model\Album;
use app\model\Product;
use app\model\Purchase;
use db\Database;


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
            header("Location: /zarodolgozat/?controller=album&action=albumSelected&id={$album}");
            exit();
        }
        $_SESSION['placeInCurtSuccessful'] = 'true';
        header("Location: /zarodolgozat/?controller=album&action=albumSelected&id={$album}");
        exit();
    }

    public function actionPurchase(){
        $pdo = Database::getPdo();
        $pdo->beginTransaction();
        $purchase = new Purchase();
        if (isset($_POST['purchase'])) {
            $purchase->load($_POST['purchase']);
            if ($purchase->insert()) {
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $id => $quantity) {
                        $purchase->addItem($id, $quantity);
                    }
                }
                $pdo->commit();
                unset($_SESSION['cart']);
                header("Location: /zarodolgozat/");
                exit();
            }
        }
        $products = [];
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $quantity){
                $products[$id] = Product::findOneById($id);
            }
        }
        $this->title = "Kosár";
        return $this->render('index',[
            'products' => $products,
            "purchase" => $purchase
        ]);
    }

    public function actionEmptyCart(){
        $_SESSION['cart'] = '';
        unset($_SESSION['cart']);
        header("Location: /zarodolgozat/");
        exit();
    }

    public function actionEmpty(){
        $this->title = "Kosár - üres";
        return $this->render('empty');
    }

    public function actionList(){
        $products = [];
        $purchase = new Purchase();
        if (isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $id => $quantity){
                $products[$id] = Product::findOneById($id);
            }
        }
        $this->title = "Kosár";
        return $this->render('index',[
            'products' => $products,
            'purchase' => $purchase
        ]);
    }
}