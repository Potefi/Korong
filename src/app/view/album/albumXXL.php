<?php

/**
 * @var Album $album
 */

use app\model\Album;
use app\model\Artist;
use app\model\Category;
use app\model\Product;
use app\model\Format;

$formats = '';

foreach (Product::findAllFormatsOfProduct($album->getId()) as $item){
    $formats .= '<b> ' . Format::findOneById($item->getFormatId())->getFormat() . '</b>' . ',';
}


?>


<div class="col-6 albumCard rounded pl-0 ml-3 album-shadow d-none d-xxl-block mt-2" style="max-width: 40rem; max-height: 200px;">
    <div class="row g-0 position-relative">
        <div class="col-md-4">
            <?php if ($album->getCover() == null || !file_exists("img/albumCovers/{$album->getCover()}")) : ?>
                <img src="img/logo/logoResized-v1.svg" class="rounded-left" style="width: 200px;" alt="<?= $album->getTitle(); ?>">
            <?php else : ?>
                <img src="img/albumCovers/<?= $album->getCover(); ?>" class="rounded-left" style="width: 200px;" alt="<?= $album->getTitle(); ?>">
            <?php endif ?>
        </div>
        <div class="col-md-8 mt-3">
            <a href="/zarodolgozat/?controller=album&action=albumSelected&id=<?= $album->getId(); ?>" class="text-decoration-none text-dark stretched-link h5 card-title"><?= $album->getTitle(); ?></a>
            <p class="card-text mb-0">Kategória: <?= $album->getCategoryName()->category ?></p>
            <p class="card-text my-0">Formátum(ok): <?= substr($formats, 0, -1) ?></p>
            <p class="font-weight-light"><?= $album->getArtist()->name; ?></p>
            <p class="card-text d-inline price" style="position: absolute; bottom: 15px;"><?= $album->findLowestPrice()->price ?> Ft-tól</p>
            <a class="btn btn-dark float-right mr-2" style="position:absolute; bottom: 15px; right: 0;" id="buyLink">Vásárlás</a>
        </div>
    </div>
</div>