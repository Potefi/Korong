<?php

/**
 * @var $products Product[]
 */

use app\model\Album;
use app\model\Artist;
use app\model\Format;
use app\model\Product;

?>
<div class="container">
    <?php if (isset($_SESSION['errorMadeByUser']['cartNotNull'])) : ?>
        <div class="alert alert-warning my-3" role="alert">
            <?= $_SESSION['errorMadeByUser']['cartNotNull'] ?>
        </div>
        <?php unset($_SESSION['errorMadeByUser']['cartNotNull']); ?>
    <?php endif; ?>
    <?php if (isset($products) && !empty($products) && count($products) > 0) : ?>
        <?php $price = 0 ?>
        <h3 class="mt-3">Kosarad:</h3>
        <div class="table-responsive">
            <table class="table mb-0">
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
                            <td class="text-center"><?= $_SESSION['cart'][$item->getId()] ?> db</td>
                            <td class="text-center"><?= $item->getPrice(); ?> Ft</td>
                        </tr>
                        <?php $price += ($_SESSION['cart'][$item->getId()] * $item->getPrice()) ?>
                    <?php endforeach; ?>
                    <tr class="border-light">
                        <th colspan="5" scope="row" class="font-italic">Összesen: </th>
                        <td class="text-center font-italic"><b><?= $price ?> Ft</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a class="btn btn-danger w-100 mt-2 mb-5" href="index.php?controller=cart&action=emptyCart">Kosár kiürítése</a>
        <h3>Adatok:</h3>
        <form action="index.php?controller=cart&action=purchase" method="post" class="my-3">
            <div class="mb-2">
                <label for="username" class="form-label">Név: </label>
                <input type="text" class="form-control" name="invoice[username]" id="username" placeholder="Pl.: Tóth József">
            </div>
            <div class="mb-2">
                <label for="address" class="form-label">Cím: </label>
                <input type="text" class="form-control" name="invoice[address]" id="address" placeholder="Pl.: Bátor utca 26.">
            </div>
            <div class="mb-3">
                <label for="taxNumber" class="form-label">Adószám: </label>
                <input type="text" class="form-control" name="invoice[taxNumber]" id="taxNumber" placeholder="xxxxxxxx-y-zz">
            </div>
            <input type="submit" value="Vásárlás" class="btn btn-dark w-100">
        </form>
    <?php else: ?>
        <h2 class="text-center mt-5 py-3 rounded shadow-sm" style="color: rgb(184, 117, 4); background-color: rgb(255, 243, 205);">Üres a kosarad.</h2>
    <?php endif; ?>
</div>