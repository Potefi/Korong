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
            <!-- Details of the album -->
            <h2 class="selected-album-title mb-0"><?= $album->getTitle(); ?></h2>
            <h4 class="text-muted mt-0">Megjelenés: <?= $album->getReleaseDate() ?></h4>
            <p class="mb-0 pb-0">Előadó: <i><?= $album->getArtist()->name; ?></i></p>
            <!-- Filter products by format -->
            <form action="/zarodolgozat/?controller=album&action=albumSelected&id=<?= $album->getId(); ?>" name="formatSelect" method="post">
                <div class="input-group mt-2 format-select">
                    <label for="format" class="input-group-text">Formátum</label>
                    <select class="form-select" name="format" id="format" onchange="formatSelect.submit();">
                        <option hidden>Válassz formátumot...</option>
                        <option value="all" <?= (isset($_POST['format']) && $_POST['format'] == 'all')?'selected':''; ?> class="font-italic">Összes</option>
                        <?php foreach ($formats as $format) : ?>
                            <option class="font-weight-bold" <?= (isset($_POST['format']) && $_POST['format'] == $format->getFormat()->format)?'selected':''; ?>><?= Format::findOneById($format->getFormatId())->getFormat(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
            <!-- Error if user tries to put 0 of selected item in cart -->
            <?php if (isset($_SESSION['cantPlaceNullInCart'])) : ?>
                <div class="alert alert-warning my-3 shadow-sm" role="alert">
                    <?= $_SESSION['cantPlaceNullInCart'] ?>
                </div>
                <?php unset($_SESSION['cantPlaceNullInCart']); ?>
            <?php endif; ?>
            <!-- Notification that placing item in cart was successful -->
            <?php if (isset($_SESSION['placeInCurtSuccessful'])) : ?>
                <div class="alert alert-success my-3 shadow-sm" role="alert">
                    Sikeres kosárba helyezés.
                </div>
                <?php unset($_SESSION['placeInCurtSuccessful']); ?>
            <?php endif; ?>
            <!-- PC view for products list -->
            <div class="container-fluid d-none d-xxl-block">
                <div class="row">
                    <?php include('albumSelectedTable.php') ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Tablet view for products list -->
    <div class="row">
        <div class="d-none d-md-block d-xxl-none mb-3">
            <?php include('albumSelectedTable.php') ?>
        </div>
    </div>
    <!-- Mobile view for products list -->
    <div class="row">
        <div class="d-block d-md-none mb-3">
            <h3 class="my-3 px-0">Termékek</h3>
            <?php foreach ($products as $product) : ?>
                <?php if (isset($_POST['format']) && $_POST['format'] != 'all') : ?>
                    <?php if ($product->getFormat()->format == $_POST['format']) : ?>
                        <?php include('albumSelectedProductsMobile.php'); ?>
                    <?php endif; ?>
                <?php else : ?>
                    <?php include('albumSelectedProductsMobile.php'); ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>