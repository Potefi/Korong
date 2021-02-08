<?php


use app\model\Album;
use app\model\Product;


?>
<div>
    <!-- Szűrés -->
    <div>
        <h4 class="border-bottom border-top pt-3 pb-2 px-3" style="background-color: rgb(237, 240, 244);">Szűrés:</h4>
        <form action="index.php?controller=search&action=index" method="post">
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
                    <?php foreach (Album::findAllCategories() as $album) : ?>
                        <option value="<?= $album->getCategory(); ?>"><?= $album->getCategory(); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- Ár -->
            <div class="mb-3 mx-3">
                <h6>Ár: </h6>
                <div class="input-bg rounded px-3 pt-2 priceDiv">
                    <label for="priceRangeMin" id="priceRangeMinLabel" class="form-label">Minimum ár: 1 Ft</label>
                    <input type="range" name="priceRangeMin" id="priceRangeMin" class="form-range" min="1" max="56000" value="1" onmousemove="priceFilterMin()"">
                    <label for="priceRangeMax" id="priceRangeMaxLabel" class="form-label">Maximum ár: 56000 Ft</label>
                    <input type="range" name="priceRangeMax" id="priceRangeMax" class="form-range" min="1" max="56000" value="56000" onmousemove="priceFilterMax()">
                </div>
            </div>
            <button type="submit" class="btn btn-dark float-right mx-3">Szűrés</button>
        </form>
    </div>
</div>