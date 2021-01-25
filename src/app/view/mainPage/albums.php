<?php

use app\model\Album;

$albums = Album::FindAll();

?>

<?php foreach ($albums as $album) : ?>
    <div class="col-lg-6 col-xl-4 albumCard">
        <div class="card" style="width: 18rem;">
            <img src="img/albumCovers/<?= $album->getImg(); ?>" class="card-img-top float-left" alt="<?= $album->getName(); ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $album->getName(); ?></h5>
                <p class="card-text">----</p>
                <a href="#" class="btn btn-primary">Vásárlás</a>
            </div>
        </div>
    </div>
<?php endforeach; ?>