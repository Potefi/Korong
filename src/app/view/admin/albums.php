<?php

use app\model\Album;

?>
<div class="container">
    <div class="row mb-5">
        <div class="col-12">
            <div class="px-4 shadow rounded bg-white pb-2 pt-3">
                <h1 class="text-center display-1 mt-0">Albumok</h1>
                <?php if(isset($_SESSION['successfulDelete'])) : ?>
                    <?php if($_SESSION['successfulDelete'] == 'sikeres') : ?>
                        <div class="alert alert-success shadow-sm mx-2" role="alert">
                            Sikeres törlés.
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger shadow-sm mx-2" role="alert">
                            Hiba történt a törlés során! Előfordulhat, hogy egyes termékek köthetőek ehhez az albumhoz.
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['successfulDelete']) ?>
                <?php endif; ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cím - <i>előadó</i></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-right position-relative">
                                <a href="/zarodolgozat/?controller=admin&action=newAlbum" class="text-decoration-none stretched-link">+ Új album felvitele</a>
                            </td>
                        </tr>
                    <?php foreach (Album::findAll() as $album) : ?>
                        <tr>
                            <th scope="row">#<?= $album->getId(); ?></th>
                            <td id="admin-selection-title"><?= $album->getTitle(); ?> - <i><?= $album->getArtist()->name ?></i></td>
                            <td id="admin-selection-links">
                                <a href="/zarodolgozat/?controller=admin&action=modifyAlbum&id=<?= $album->getId(); ?>" class="text-decoration-none">Módosítás</a> |
                                <a href="" class="text-decoration-none">Termékek</a> |
                                <a href="/zarodolgozat/?controller=admin&action=deleteAlbum&id=<?= $album->getId(); ?>" class="text-decoration-none">Törlés</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
