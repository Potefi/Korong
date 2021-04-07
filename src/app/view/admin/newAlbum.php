<?php

use app\model\Artist;
use app\model\Category;

?>
<div class="container">
    <div class="row shadow pt-3 pb-4 rounded bg-white">
        <h1 class="mt-0 mb-4">Új album felvitele</h1>
        <?php if(isset($_SESSION['successfulUpdate'])) : ?>
            <?php if($_SESSION['successfulUpdate'] == 'sikertelen') : ?>
                <div class="alert alert-danger shadow-sm mx-2" role="alert">
                    Hiba történt a frissítés során!
                </div>
            <?php endif; ?>
            <?php unset($_SESSION['successfulUpdate']) ?>
        <?php endif; ?>
        <!-- Form for modifying the album -->
        <form action="/zarodolgozat/?controller=admin&action=newAlbum" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <label for="artist" class="form-label">Előadó</label>
                    <select name="album[artistId]" id="artist" class="form-select" required>
                        <?php foreach (Artist::FindAll() as $artist) : ?>
                            <option value="<?= $artist->getId(); ?>"><?= $artist->getName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <label for="title" class="form-label">Cím</label>
                    <input type="text" name="album[title]" id="title" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-4 col-md-6">
                    <label for="category" class="form-label">Kategória</label>
                    <select name="album[category]" id="category" class="form-select" required>
                        <?php foreach (Category::findAll() as $category) : ?>
                                <option value="<?= $category->getId(); ?>"><?= $category->getCategory(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-4 col-md-6">
                    <label for="releaseDate" class="form-label">Megjelenési dátum</label>
                    <input type="date" name="album[releaseDate]" id="releaseDate" class="form-control" required>
                </div>
                <div class="col-lg-4">
                    <label for="cover" class="form-label">Borító</label>
                    <div class="form-file">
                        <input type="file" class="form-file-input" name="cover" id="cover">
                        <label class="form-file-label" for="cover">
                            <span class="form-file-text">Válassz egy fájlt..</span>
                            <span class="form-file-button">Browse</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <input type="submit" value="Adatok felvitele" class="btn btn-dark w-100">
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    document.getElementById('cover').addEventListener('change', function () {
        document.querySelector('.form-file-text').innerHTML = document.getElementById('cover').value.split('\\')[2];
    })
</script>