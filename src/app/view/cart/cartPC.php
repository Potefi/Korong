<?php

/**
 * @var $products Product[]
 */

/**
 * @var $purchase Purchase
 */

use app\model\Album;
use app\model\Artist;
use app\model\Format;
use app\model\Product;
use app\model\Purchase;


?>
<div class="d-flex row bg-white shadow rounded-bottom my-5 px-5 pb-5">
    <form action="/zarodolgozat/?controller=cart&action=modifyQuantity" method="post">
        <h1 class="display-3 mt-0">Kosár</h1>
        <h3 class="mt-3">Termékek:</h3>
        <div class="table-responsive">
            <table class="table mb-0 vertical-align">
                <thead>
                <tr>
                    <th scope="col">Album</th>
                    <th scope="col" class="text-center">Előadó</th>
                    <th scope="col" class="text-center">Formátum</th>
                    <th scope="col" class="text-center">Leírás</th>
                    <th scope="col" class="text-center">Darabszám</th>
                    <th scope="col" class="text-center">Ár</th>
                    <th scope="col" class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $item) : ?>
                    <tr>
                        <th scope="row"><?= Album::findOneById($item->getAlbumId())->getTitle(); ?></th>
                        <td class="text-center"><?= Artist::findOneById(Album::findOneById($item->getAlbumId())->getArtistId())->getName(); ?></td>
                        <td class="text-center"><?= Format::findOneById($item->getFormatId())->getFormat(); ?></td>
                        <td class="text-center"><?= is_null($item->getDescription())?'-':$item->getDescription(); ?></td>
                        <td class="text-center" style="min-width: 200px;"><input type="number" name="quantity[<?= $item->getId(); ?>]" id="quantity" value="<?= $_SESSION['cart'][$item->getId()] ?>" class="form-control w-25 mx-auto d-inline" required min="1" oninput="modifyQuantity();"> db</td>
                        <td class="text-center"><?= $item->getPrice() * $_SESSION['cart'][$item->getId()]; ?> Ft</td>
                        <td class="px-0 position-relative"><a class="rounded-circle stretched-link" href="/zarodolgozat/?controller=cart&action=removeFromCart&id=<?= $item->getId(); ?>"><img src="img/logo/remove.svg" alt="delete" class="mx-auto d-block" style="width: 25px;"></a></td>
                    </tr>
                    <?php $price += ($_SESSION['cart'][$item->getId()] * $item->getPrice()); ?>
                <?php endforeach; ?>
                <tr class="border-light">
                    <th colspan="5" scope="row" class="font-italic">Összesen: </th>
                    <td class="text-center font-italic"><b><?= $price ?> Ft</b></td>
                </tr>
                </tbody>
            </table>
        </div>
        <input type="submit" value="Kosár tartalmának frissítése" class="d-none" id="modifyPC">
        <a class="btn btn-dark w-100 mt-2" href="/zarodolgozat/?controller=cart&action=emptyCart">Kosár kiürítése</a>
    </form>
</div>

<div class="d-flex row bg-white shadow rounded-bottom my-5 pb-5 px-5">
    <h1 class="display-6 mt-2">Adatok</h1>
    <?php include('form.php'); ?>
</div>