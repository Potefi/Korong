<?php

use app\model\Artist;

?>
<div class="container">
    <!-- Including file for new artist form -->
    <?php include('newArtist.php'); ?>

    <div class="row my-5">
        <div class="col-12">
            <ul class="list-unstyled shadow rounded bg-white py-2">
                <li>
                    <h1 class="text-center display-1 mt-0 mb-3">Előadók</h1>
                </li>
                <li>
                    <?php if(isset($_SESSION['successfulDelete'])) : ?>
                        <?php if($_SESSION['successfulDelete'] == 'sikeres') : ?>
                            <div class="alert alert-success shadow-sm mx-2" role="alert">
                                Sikeres törlés.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger shadow-sm mx-2" role="alert">
                                Hiba történt a törlés során! Előfordulhat, hogy egyes albumok köthetőek ehhez az előadóhoz.
                            </div>
                        <?php endif; ?>
                        <?php unset($_SESSION['successfulDelete']) ?>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['successfulUpdate'])) : ?>
                        <?php if($_SESSION['successfulUpdate'] == 'sikeres') : ?>
                            <div class="alert alert-success shadow-sm mx-2" role="alert">
                                Sikeres frissítés.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger shadow-sm mx-2" role="alert">
                                Hiba történt a frissítés során!
                            </div>
                        <?php endif; ?>
                        <?php unset($_SESSION['successfulUpdate']) ?>
                    <?php endif; ?>
                </li>
                <?php foreach (Artist::FindAll() as $artist) : ?>
                    <li class="h4 admin-selection-row-hover my-0 py-1 px-3">
                        <form action="/zarodolgozat/?controller=admin&action=modifyArtist&id=<?= $artist->getId(); ?>" method="post">
                            <div class="row">
                                <div class="col-sm-6" id="admin-selection-title"><input type="text" name="<?= $artist->getId(); ?>" id="artist<?= $artist->getId(); ?>" value="<?= $artist->getName(); ?>" class="form-control"></div>
                                <div class="col-sm-6" id="admin-selection-links"><input type="submit" value="Módosítás" class="btn btn-dark"> <a href="/zarodolgozat/?controller=admin&action=deleteArtist&id=<?= $artist->getId(); ?>" class="btn btn-danger">Törlés</a></div>
                            </div>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>