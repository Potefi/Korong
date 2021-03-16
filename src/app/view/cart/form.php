<?php

/**
 * @var $products Product[]
 */

/**
 * @var $purchase Purchase
 */

use app\model\Product;
use app\model\Purchase;
use app\model\Takeover;
use app\model\User;


?>
<form action="/zarodolgozat/?controller=cart&action=purchase" method="post">
    <div class="row mb-2 my-3">
        <div class="form-group col-md-6">
            <label for="name" class="form-label">Teljes név: </label>
            <input type="text" class="form-control <?= $purchase->hasError("name")?"is-invalid":""?>" name="purchase[name]" id="name" required value="<?= $purchase->getName(); ?>">
            <?php if($purchase->hasError("name")) : ?>
                <div class="invalid-feedback mb-0 pb-0">
                    <?= ($purchase->getErrors())["name"] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="phone" class="form-label">Telefon: </label>
            <input type="tel" class="form-control <?= $purchase->hasError("phone")?"is-invalid":""?>" name="purchase[phone]" id="phone" placeholder="Pl.: 06304759162, +36304759162" required value="<?= $purchase->getPhone(); ?>">
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
            <input type="text" class="form-control <?= $purchase->hasError("address")?"is-invalid":""?>" name="purchase[address]" id="address" placeholder="Pl.: Bátor utca 26." required value="<?= $purchase->getAddress(); ?>">
            <?php if($purchase->hasError("address")) : ?>
                <div class="invalid-feedback mb-0 pb-0">
                    <?= ($purchase->getErrors())["address"] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-4">
            <label for="postcode" class="form-label">Irányítószám: </label>
            <input type="text" class="form-control <?= $purchase->hasError("postcode")?"is-invalid":""?>" name="purchase[postcode]" id="postcode" required value="<?= $purchase->getPostcode(); ?>" placeholder="Pl.: 2234">
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
            <input type="text" class="form-control <?= $purchase->hasError("city")?"is-invalid":""?>" name="purchase[city]" id="city" required value="<?= $purchase->getCity(); ?>">
            <?php if($purchase->hasError("city")) : ?>
                <div class="invalid-feedback mb-0 pb-0">
                    <?= ($purchase->getErrors())["city"] ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="form-group col-md-6">
            <label for="email" class="form-label">Email: </label>
            <input type="email" class="form-control <?= $purchase->hasError("email")?"is-invalid":""?>" name="purchase[email]" id="email" required value="<?= ($purchase->getEmail() != null )?$purchase->getEmail():(isset($_SESSION['userId'])?User::findOneById($_SESSION['userId'])->getEmail():'') ?>">
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
                <select name="purchase[takeover]" id="takeover" class="form-select">
                    <?php foreach (Takeover::FindAll() as $item) : ?>
                        <option value="<?= $item->getId(); ?>"><?= $item->getName(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    <input type="submit" value="Vásárlás" class="btn btn-dark w-100 purchase">
</form>