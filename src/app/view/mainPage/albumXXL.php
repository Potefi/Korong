<?php

/**
 * @var Album $album
 */

use app\model\Album;

?>


<div class="col-xxl-6 albumCard rounded pl-0 ml-3 album-shadow d-none d-xxl-block mt-2" style="max-width: 40rem;">
    <div class="row g-0 position-relative">
        <div class="col-md-4">
            <img src="img/albumCovers/<?= $album->getImg(); ?>" class="rounded-left" style="width: 200px;" alt="<?= $album->getName(); ?>">
        </div>
        <div class="col-md-8 mt-3">
            <h5 class="card-title"><?= $album->getName(); ?></h5>
            <p class="card-text">This is going to be some text about this album, tho it might be cooler, if there was nothing.</p>
            <p class="font-weight-light">Eminem</p>
            <p class="card-text d-inline">19000 Ft</p>
            <a href="http://localhost/zarodolgozat/?controller=search" class="btn btn-dark stretched-link float-right mr-2" target="_blank" id="buyLink">Vásárlás</a>
        </div>
    </div>
</div>