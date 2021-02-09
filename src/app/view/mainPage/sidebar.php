<?php


use app\model\Album;
use app\model\Product;


?>
<div>
    <!-- Elérhetőség -->
    <div>
        <h4 class="border-bottom pb-2 px-3 pt-3" style="background-color: rgb(240, 240, 240);">Elérhetőség:</h4>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Cím: </h6><p class="d-inline">2234 Maglód, Madách Imre utca 12.</p>
        </div>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Telefonszám: </h6><p class="d-inline">+36304759162</p>
        </div>
        <div class="mb-3 px-3">
            <h6 class="d-inline">Email: </h6><p class="d-inline">zazi.szabo@gmail.com</p>
        </div>
        <div class="pb-2 px-3">
            <h6>Nyitvatartás: </h6>
            <p class="mb-0">Hétfő-péntek: <b>8-17</b> óra</p>
            <p class="mb-0">Szombat: <b>10-15</b> óra</p>
            <p class="mb-0">Vasárnap: <b>zárva</b></p>
        </div>
    </div>
    <!-- Szűrés -->
    <div>
        <h4 class="border-bottom border-top pt-3 pb-2 px-3" style="background-color: rgb(240, 240, 240);">Szűrés:</h4>
        <form method="post" action="index.php?controller=search&action=index">
            <!-- Előadó -->
            <div class="mb-3 px-3">
                <label for="artist" class="h6">Előadó: </label>
                <input type="text" name="artist" id="artist" class="form-control input-bg" placeholder="Írd be az előadó nevét.. ">
            </div>
            <!-- Album címe -->
            <div class="mb-3 px-3">
                <label for="album" class="h6">Album: </label>
                <input type="text" name="album" id="album" class="form-control input-bg" placeholder="Írd be az album címét.. ">
            </div>
            <!-- Formátum -->
            <div class="mb-3 px-3">
                <label for="selectFormat" class="h6">Formátum: </label>
                <select name="selectFormat" id="selectFormat" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden selected>Válaszd ki a formátumot..</option>
                    <option value="all">Összes</option>
                    <option disabled>-----------</option>
                    <?php foreach (Product::findAllFormats() as $format) : ?>
                        <option value="<?= $format->getFormat(); ?>"><?= $format->getFormat(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Kategória -->
            <div class="mb-3 px-3">
                <label for="selectCategory" class="h6">Kategória: </label>
                <select name="selectCategory" id="selectCategory" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden selected>Válaszd ki a kategóriát..</option>
                    <option value="all">Összes</option>
                    <option disabled>-----------</option>
                    <?php foreach (Album::findAllCategories() as $album) : ?>
                        <option value="<?= $album->getCategory(); ?>"><?= $album->getCategory(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Ár -->
            <div class="mb-3 mx-3">
                <h6>Ár*: </h6>
                <div class="input-bg rounded px-3 pt-2 priceDiv">
                    <label for="priceRangeMin" id="priceRangeMinLabel" class="form-label">Minimum ár: <?= Product::findLowestPrice()->getPrice() ?> Ft</label>
                    <input type="range" name="priceRangeMin" id="priceRangeMin" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= Product::findLowestPrice()->getPrice() ?>" onmousemove="priceFilterMin()">
                    <label for="priceRangeMax" id="priceRangeMaxLabel" class="form-label">Maximum ár: <?= Product::findHighestPrice()->getPrice() ?> Ft</label>
                    <input type="range" name="priceRangeMax" id="priceRangeMax" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= Product::findHighestPrice()->getPrice() ?>" onmousemove="priceFilterMax()">
                </div>
                <small class="form-text text-muted">*Kizárólag árra nem lehet szűrni.</small>
            </div>
            <button type="submit" class="btn btn-dark float-right mx-3">Szűrés</button>
        </form>
    </div>
</div>