<?php

use app\model\Album;
use app\model\Artist;
use app\model\Format;
use app\model\Product;

$album = Album::findOneById($_GET['id']);
$products = Product::findAllByAlbumId($_GET['id']);
$formats = Product::findAllFormatsOfProduct($_GET['id']);

/** @var Album $album */
/** @var Product[] $products */
/** @var Product[] $formats */
?>



<div class="container">
    <div class="row my-3">
        <div class="col-xxl-3 col-md-4">
            <?php if ($album->getCover() == null || !file_exists("img/albumCovers/{$album->getCover()}")) : ?>
                <img src="img/logo/logoResized-v1.svg" class="img-fluid selected-album-img" alt="<?= $album->getTitle(); ?>">
            <?php else : ?>
                <img src="img/albumCovers/<?= $album->getCover(); ?>" class="img-fluid selected-album-img shadow w-100" alt="<?= $album->getTitle(); ?>">
            <?php endif ?>
        </div>
        <div class="col-xxl-9 col-md-8">
            <h2 class="selected-album-title mb-0"><?= $album->getTitle(); ?></h2>
            <h4 class="text-muted mt-0">Megjelenés: <?= $album->getReleaseDate() ?></h4>
            <p class="mb-0 pb-0">Előadó: <i><?= Artist::findOneById($album->getArtistId())->getName(); ?></i></p>
            <form action="http://localhost/zarodolgozat/?controller=album&action=albumSelected&id=<?= $album->getId(); ?>" name="formatSelect" method="post">
                <div class="input-group mt-2 format-select">
                    <label for="format" class="input-group-text">Formátum</label>
                    <select class="form-select" name="format" id="format" onchange="formatSelect.submit();">
                        <option hidden>Válassz formátumot...</option>
                        <option value="all" <?= (isset($_POST['format']) && $_POST['format'] == 'all')?'selected':''; ?> class="font-italic">Összes</option>
                        <?php foreach ($formats as $format) : ?>
                            <option class="font-weight-bold" <?= (isset($_POST['format']) && $_POST['format'] == Format::findOneById($format->getFormatId())->getFormat())?'selected':''; ?>><?= Format::findOneById($format->getFormatId())->getFormat(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
            <?php if (isset($_SESSION['cantPlaceNullInCart'])) : ?>
                <div class="alert alert-warning my-3 shadow-sm" role="alert">
                    <?= $_SESSION['cantPlaceNullInCart'] ?>
                </div>
                <?php unset($_SESSION['cantPlaceNullInCart']); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['placeInCurtSuccessful'])) : ?>
                <div class="alert alert-success my-3 shadow-sm" role="alert">
                    Sikeres kosárba helyezés.
                </div>
                <?php unset($_SESSION['placeInCurtSuccessful']); ?>
            <?php endif; ?>
            <div class="container-fluid d-none d-xxl-block">
                <div class="row">
                    <?php include ('albumSelectedTableXXL.php')?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="d-none d-md-block d-xxl-none mb-3">
            <?php include ('albumSelectedTableMD.php')?>
        </div>
    </div>
    <!--
        TODO - SM
    -->
</div>