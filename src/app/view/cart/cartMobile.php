<?php

/**
 * @var $products Product[]
 */

/**
 * @var $purchase Purchase
 */

/**
 * @var $price numeric;
 */

use app\model\Album;
use app\model\Artist;
use app\model\Format;
use app\model\Product;
use app\model\Purchase;


?>
<div>
    <h1 class="text-center display-1 mt-2">Kosár</h1>
    <form action="/zarodolgozat/?controller=cart&action=modifyQuantity" method="post">
        <div class="shadow mb-3 rounded">
            <table class="table">
                <tbody>
                    <tr>
                        <td><h2 class="my-auto display-6 text-center">Termékek</h2></td>
                    </tr>
                    <?php foreach ($products as $item) : ?>
                        <tr>
                            <td>
                                <p class="my-0 font-weight-bold"><?= Album::findOneById($item->getAlbumId())->getTitle(); ?></p>
                                <p class="my-0 font-italic"><?= Artist::findOneById(Album::findOneById($item->getAlbumId())->getArtistId())->getName(); ?></p>
                                <p class="my-0"><?= Format::findOneById($item->getFormatId())->getFormat(); ?></p>
                                <p class="my-0 font-italic"><?= is_null($item->getDescription())?'-':$item->getDescription(); ?></p>
                                <div class="row vertical-align">
                                    <div class="my-0 col-6"><input type="number" name="quantity[<?= $item->getId(); ?>]" id="quantity" value="<?= $_SESSION['cart'][$item->getId()] ?>" class="form-control w-75 mx-auto d-inline" required min="1" oninput="modifyQuantity();"> db</div>
                                    <div class="text-right col-6 my-auto"><?= $item->getPrice() * $_SESSION['cart'][$item->getId()]; ?> Ft</div>
                                </div>
                                <a class="btn btn-dark w-100 mt-2 btn-sm font-weight-bold" href="/zarodolgozat/?controller=cart&action=removeFromCart&id=<?= $item->getId(); ?>">Termék eltávolítása</a>
                            </td>
                        </tr>
                        <?php $price += ($_SESSION['cart'][$item->getId()] * $item->getPrice()); ?>
                    <?php endforeach; ?>
                    <tr class="border-light">
                        <td>
                            <div class="row">
                                <div class="col-6">
                                    Összesen:
                                </div>
                                <div class="col-6 text-right">
                                    <b><?= $price ?> Ft</b>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="px-2 pb-2">
                <input type="submit" value="Kosár tartalmának frissítése" class="d-none" id="modifyPhone">
                <a class="btn btn-dark w-100" href="/zarodolgozat/?controller=cart&action=emptyCart">Kosár kiürítése</a>
            </div>
        </div>
    </form>
</div>
<div class="bg-white shadow rounded my-3 p-2">
    <h1 class="display-6 text-center mt-0">Adatok</h1>
    <?php include('form.php'); ?>
</div>
