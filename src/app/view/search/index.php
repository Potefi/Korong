<?php

use app\model\Album;
use app\model\Format;
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
                <?php include('sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<div class="container bg-light block-container pb-3 mt-2 px-1">
    <div class="row">
        <?php include('filter.php') ?>
    </div>
</div>