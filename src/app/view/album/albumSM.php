<?php

/**
 * @var Album $album
 */

use app\model\Album;
use app\model\Artist;
use app\model\Format;
use app\model\Product;

$formats = '';

foreach (Product::findAllFormatsOfProduct($album->getId()) as $item){
    $formats .= '<b> ' . Format::findOneById($item->getFormatId())->getFormat() . '</b>' . ',';
}


?>

<?php if ($album->getCover() == null || !file_exists("img/albumCovers/{$album->getCover()}")) : ?>
<div class="d-flex d-xxl-none col-sm-6 col-md-4 col-lg-3 align-items-stretch" id="card-sm">
    <div class="card px-0 album-shadow albumCard position-relative no-cover-img">
        <img src="img/logo/logoResized-v1.svg" class="card-img-top" alt="<?= $album->getTitle(); ?>">
        <div class="card-body btn-container">
            <a href="http://localhost/zarodolgozat/?controller=album&action=albumSelected&id=<?= $album->getId(); ?>" target="_blank" style="text-decoration: none;" class="text-dark stretched-link"><h5 class="card-title"><?= $album->getTitle(); ?></h5></a>
            <p class="card-text">Kategória: <?= $album->getCategory(); ?></p>
            <p class="card-text mt-0">Formátum(ok): <?= substr($formats, 0, -1) ?></p>
            <p class="font-weight-light"><?= Artist::findOneById($album->getArtistId())->getName() ?></p>
            <p class="card-text price"><?= Product::findOneByIdOrderedByPriceAsc($album->getId())->getPrice() ?> Ft-tól</p>
            <div class="btn-holder">
                <a class="btn btn-dark d-block w-100" id="buyLink">Vásárlás</a>
            </div>
        </div>
    </div>
</div>
<?php else : ?>
<div class="d-flex d-xxl-none col-sm-6 col-md-4 col-lg-3 align-items-stretch" id="card-sm">
    <div class="card px-0 album-shadow albumCard position-relative">
        <img src="img/albumCovers/<?= $album->getCover(); ?>" class="card-img-top" alt="<?= $album->getTitle(); ?>">
        <div class="card-body btn-container">
            <a href="http://localhost/zarodolgozat/?controller=album&action=albumSelected&id=<?= $album->getId(); ?>" target="_blank" style="text-decoration: none;" class="text-dark stretched-link"><h5 class="card-title"><?= $album->getTitle(); ?></h5></a>
            <p class="card-text mb-0">Kategória: <?= $album->getCategory(); ?></p>
            <p class="card-text mt-0">Formátum(ok): <?= substr($formats, 0, -1) ?></p>
            <p class="font-weight-light"><?= Artist::findOneById($album->getArtistId())->getName() ?></p>
            <p class="card-text price"><?= Product::findOneByIdOrderedByPriceAsc($album->getId())->getPrice() ?> Ft-tól</p>
            <div class="btn-holder">
                <a class="btn btn-dark d-block w-100" id="buyLink">Vásárlás</a>
            </div>
        </div>
    </div>
</div>
<?php endif ?>