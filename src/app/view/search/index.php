<?php

use app\model\Album;
use app\model\Product;
use db\Database;

$path = 'src/app/view/album/';

$isFiltered = false;

if((isset($_POST['artist']) && !empty($_POST['artist'])) || (isset($_POST['album']) && !empty($_POST['album'])) || (isset($_POST['selectCategory']) && $_POST['selectCategory'] != 'default') || (isset($_POST['selectFormat'])) && $_POST['selectFormat'] != 'default') {
    $artist = isset($_POST['artist'])?$_POST['artist']:null;
    $albumTitle = isset($_POST['album'])?$_POST['album']:null;
    $categoryStored = isset($_POST['selectCategory'])?$_POST['selectCategory']:null;
    $minPrice = isset($_POST['priceRangeMin'])?$_POST['priceRangeMin']:null;
    $maxPrice = isset($_POST['priceRangeMax'])?$_POST['priceRangeMax']:null;
    $formatStored = isset($_POST['selectFormat'])?$_POST['selectFormat']:null;
    $isFiltered = true;
}

?>



<!-- PC -->
<div class="flex-container">
    <div class="flex-sidebar border-right sidebar bg-light">
        <?php include('sidebar.php'); ?>
    </div>
    <div class="flex-content container-fluid pb-3 bg-light pt-2">
        <?php include('filter.php') ?>
    </div>
</div>
<!-- Mobil -->
<div class="container-fluid bg-light block-container pb-3 px-0">
    <div class="text-right bg-dark mx-0 py-2 pr-3 position-relative"  >
        <a class="text-decoration-none text-light h3 stretched-link" data-toggle="collapse" href="#filter"  role="button" aria-expanded="true" aria-controls="filter"><img src="img/logo/Magnifier.svg" class="magnifier" alt="magnifier"></a>
    </div>
    <div class="row px-3 mx-0 mx-md-5 rounded-bottom shadow" style="background-color: rgb(231, 231, 231);">
        <div class="col">
            <div class="collapse <?= $isFiltered?'':'show' ?> multi-collapse" id="filter">
                <form action="index.php?controller=search&action=index" method="post" class="py-3">
                    <!-- Előadó -->
                    <div class="mb-2">
                        <label for="artist" class="h6">Előadó: </label>
                        <input type="text" name="artist" id="artist" class="form-control input-bg" placeholder="Írd be az előadó nevét.. " value="<?= isset($artist)?$artist:'' ?>">
                    </div>
                    <!-- Album címe -->
                    <div class="mb-2">
                        <label for="album" class="h6">Album: </label>
                        <input type="text" name="album" id="album" class="form-control input-bg" placeholder="Írd be az album címét.. " value="<?= isset($albumTitle)?$albumTitle:'' ?>">
                    </div>
                    <!-- Formátum -->
                    <div class="mb-2">
                        <label for="selectFormat" class="h6">Formátum: </label>
                        <select name="selectFormat" id="selectFormat" class="form-select input-bg" onchange="userToTable();">
                            <option value="default" hidden>Válaszd ki a formátumot..</option>
                            <option value="all">Összes</option>
                            <option disabled>-----------</option>
                            <?php foreach (Product::findAllFormats() as $format) : ?>
                                <option value="<?= $format->getFormat(); ?>" <?= isset($formatStored) && $formatStored == $format->getFormat()?'selected':'' ?>><?= $format->getFormat(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Kategória -->
                    <div class="mb-2">
                        <label for="selectCategory" class="h6">Kategória: </label>
                        <select name="selectCategory" id="selectCategory" class="form-select input-bg" onchange="userToTable();">
                            <option value="default" hidden selected>Válaszd ki a kategóriát..</option>
                            <option value="all">Összes</option>
                            <option disabled>-----------</option>
                            <?php foreach (Album::findAllCategories() as $album) : ?>
                                <option value="<?= $album->getCategory(); ?>" <?= isset($categoryStored) && $categoryStored == $album->getCategory()?'selected':'' ?>><?= $album->getCategory(); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Ár -->
                    <div class="mb-2">
                        <h6>Ár*: </h6>
                        <div class="input-bg rounded px-3 pt-2 priceDiv">
                            <label for="priceRangeMinMobile" id="priceRangeMinLabelMobile" class="form-label">Minimum ár: <?= Product::findLowestPrice()->getPrice() ?> Ft</label>
                            <input type="range" name="priceRangeMinMobile" id="priceRangeMinMobile" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= Product::findLowestPrice()->getPrice() ?>" onmousemove="priceFilterMinMobile()">
                            <label for="priceRangeMaxMobile" id="priceRangeMaxLabelMobile" class="form-label">Maximum ár: <?= Product::findHighestPrice()->getPrice() ?> Ft</label>
                            <input type="range" name="priceRangeMaxMobile" id="priceRangeMaxMobile" class="form-range" min="<?= Product::findLowestPrice()->getPrice() ?>" max="<?= Product::findHighestPrice()->getPrice() ?>" value="<?= Product::findHighestPrice()->getPrice() ?>" onmousemove="priceFilterMaxMobile()">
                        </div>
                        <small class="form-text text-muted">*Kizárólag árra nem lehet szűrni.</small>
                    </div>
                    <div class="btn-holder mt-3">
                        <input type="submit" value="Szűrés" class="btn btn-dark d-block w-100">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container bg-light block-container pb-3 mt-2 px-1">
    <div class="row">
        <?php include('filter.php') ?>
    </div>
</div>