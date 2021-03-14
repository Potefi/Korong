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
use app\model\Takeover;
use app\model\User;


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
        <h1 class="display-3">Kosár</h1>
        <h3 class="mt-3">Termékek:</h3>
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
        <a class="btn btn-danger w-100 mt-2 mb-5" href="/zarodolgozat/?controller=cart&action=emptyCart">Kosár kiürítése</a>
        <h3>Adatok:</h3>
        <form action="/zarodolgozat/?controller=cart&action=purchase" method="post" class="my-3">
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="name" class="form-label">Teljes név: </label>
                    <input type="text" class="form-control input-bg <?= $purchase->hasError("name")?"is-invalid":""?>" name="purchase[name]" id="name" required value="<?= $purchase->getName(); ?>">
                    <?php if($purchase->hasError("name")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["name"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone" class="form-label">Telefon: </label>
                    <input type="tel" class="form-control input-bg <?= $purchase->hasError("phone")?"is-invalid":""?>" name="purchase[phone]" id="phone" placeholder="Pl.: 06304759162, +36304759162" required value="<?= $purchase->getPhone(); ?>">
                    <?php if($purchase->hasError("phone")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["phone"] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-8">
                    <label for="address" class="form-label">Cím: </label>
                    <input type="text" class="form-control input-bg <?= $purchase->hasError("address")?"is-invalid":""?>" name="purchase[address]" id="address" placeholder="Pl.: Bátor utca 26." required value="<?= $purchase->getAddress(); ?>">
                    <?php if($purchase->hasError("address")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["address"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="postcode" class="form-label">Irányítószám: </label>
                    <input type="text" class="form-control input-bg <?= $purchase->hasError("postcode")?"is-invalid":""?>" name="purchase[postcode]" id="postcode" required value="<?= $purchase->getPostcode(); ?>" placeholder="Pl.: 2234">
                    <?php if($purchase->hasError("postcode")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["postcode"] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-md-6">
                    <label for="city" class="form-label">Város: </label>
                    <input type="text" class="form-control input-bg <?= $purchase->hasError("city")?"is-invalid":""?>" name="purchase[city]" id="city" required value="<?= $purchase->getCity(); ?>">
                    <?php if($purchase->hasError("city")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["city"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="form-label">Email: </label>
                    <input type="email" class="form-control input-bg <?= $purchase->hasError("email")?"is-invalid":""?>" name="purchase[email]" id="email" required value="<?= ($purchase->getEmail() != null )?$purchase->getEmail():(isset($_SESSION['userId'])?User::findOneById($_SESSION['userId'])->getEmail():'') ?>">
                    <?php if($purchase->hasError("email")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($purchase->getErrors())["email"] ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="takeover" class="form-label d-block">Átvételi mód: </label>
                        <select name="purchase[takeover]" id="takeover" class="form-select input-bg">
                            <?php foreach (Takeover::FindAll() as $item) : ?>
                                <option value="<?= $item->getId(); ?>"><?= $item->getName(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Vásárlás" class="btn btn-dark w-100 mb-5">
        </form>
    <?php else: ?>
        <?php header("Location: /zarodolgozat/?controller=cart&action=empty"); ?>
        <?php exit(); ?>
    <?php endif; ?>
</div>