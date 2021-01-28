<?php

/**
 * @var Album $album
 */

use app\model\Album;

?>


<div class="d-flex d-xxl-none col-sm-6 col-md-4 col-lg-3 align-items-stretch" id="card-sm">
    <div class="card px-0 album-shadow albumCard position-relative">
        <img src="img/albumCovers/<?= $album->getImg(); ?>" class="card-img-top" alt="<?= $album->getName(); ?>">
        <div class="card-body">
            <a href="http://localhost/zarodolgozat/?controller=search" style="text-decoration: none;" class="text-dark stretched-link"><h5 class="card-title"><?= $album->getName(); ?></h5></a>
            <p class="card-text">This is going to be some text about this album, tho it might be cooler, if there was nothing.</p>
            <p class="font-weight-light">Eminem</p>
            <p class="card-text d-inline">19000 Ft</p>
            <a href="" class="btn btn-dark float-right" id="buyLink">Vásárlás</a>
        </div>
    </div>
</div>