<?php


use app\model\Album;
use app\model\Category;
use app\model\Format;
use app\model\Product;


?>
<div>
    <!-- Szűrés -->
    <div>
        <h4 class="border-bottom pt-3 pb-2 px-3" style="background-color: rgb(240, 240, 240);">Szűrés:</h4>
        <form action="/zarodolgozat/?controller=search&action=index" method="post">
            <!-- Előadó -->
            <div class="mb-3 px-3">
                <label for="artist" class="h6">Előadó: </label>
                <input type="text" name="artist" id="artist" class="form-control input-bg" placeholder="Írd be az előadó nevét.. " value="<?= isset($artist)?$artist:'' ?>">
            </div>
            <!-- Album címe -->
            <div class="mb-3 px-3">
                <label for="album" class="h6">Album: </label>
                <input type="text" name="album" id="album" class="form-control input-bg" placeholder="Írd be az album címét.. " value="<?= isset($albumTitle)?$albumTitle:'' ?>">
            </div>
            <!-- Formátum -->
            <div class="mb-3 px-3">
                <label for="selectFormat" class="h6">Formátum: </label>
                <select name="selectFormat" id="selectFormat" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden>Válaszd ki a formátumot..</option>
                    <option value="all" class="font-italic">Összes</option>
                    <?php foreach (Product::findAllFormats() as $format) : ?>
                        <option class="font-weight-bold" value="<?= Format::findOneById($format->getFormatId())->getFormat(); ?>" <?= isset($formatStored) && $formatStored == Format::findOneById($format->getFormatId())->getFormat()?'selected':'' ?>><?= Format::findOneById($format->getFormatId())->getFormat(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Kategória -->
            <div class="mb-3 px-3">
                <label for="selectCategory" class="h6">Kategória: </label>
                <select name="selectCategory" id="selectCategory" class="form-select input-bg" onchange="userToTable();">
                    <option value="default" hidden selected>Válaszd ki a kategóriát..</option>
                    <option value="all" class="font-italic">Összes</option>
                    <?php foreach (Album::findAllCategories() as $album) : ?>
                        <option class="font-weight-bold" value="<?= $album->getCategory(); ?>" <?= isset($categoryStored) && $categoryStored == $album->getCategory()?'selected':'' ?>><?= Category::findOneById($album->getCategory())->getCategory(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Ár -->
            <div class="mb-3 mx-3">
                <h6>Ár*: </h6>
                <div class="input-bg rounded px-3 pt-2 priceDiv">
                    <label for="priceRangeMin" id="priceRangeMinLabel" class="form-label">Minimum ár: <?= isset($minPrice)?$minPrice:Product::findLowestPrice()->getPrice() ?> Ft</label>
                    <input type="range" name="priceRangeMin" id="priceRangeMin" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= isset($minPrice)?$minPrice:Product::findLowestPrice()->getPrice() ?>" onmousemove="priceFilterMin()"">
                    <label for="priceRangeMax" id="priceRangeMaxLabel" class="form-label">Maximum ár: <?= isset($maxPrice)?$maxPrice:Product::findHighestPrice()->getPrice() ?> Ft</label>
                    <input type="range" name="priceRangeMax" id="priceRangeMax" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= isset($maxPrice)?$maxPrice:Product::findHighestPrice()->getPrice() ?>" onmousemove="priceFilterMax()">
                </div>
                <small class="form-text text-muted">*Kizárólag árra nem lehet szűrni.</small>
            </div>
            <button type="submit" class="btn btn-dark float-right mx-3 mb-3">Szűrés</button>
        </form>
    </div>
</div>