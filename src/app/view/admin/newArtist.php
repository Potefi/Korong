<div class="container shadow pt-3 pb-4 rounded bg-white">
    <div class="row">
        <div class="col-12">
            <h1 class="display-6 mt-0">Új előadó</h1>
        </div>
    </div>
    <?php if (isset($_SESSION['errorMadeByUser']) && $_SESSION['errorMadeByUser'] == 'errorWhileUploadingToDatabase') : ?>
        <div class="alert alert-danger my-3 shadow-sm" role="alert">
            Hiba törént az adatok felvitele közben. Előfordulhat, hogy már létezik az előadó az adatbázisban.
        </div>
        <?php unset($_SESSION['errorMadeByUser']); ?>
    <?php endif; ?>
    <form action="/zarodolgozat/?controller=admin&action=newArtist" method="post">
        <div class="row">
            <div class="col-12 col-xxl-10 mt-3">
                <div class="input-group">
                    <span class="input-group-text" id="nameLabel">Név</span>
                    <input type="text" name="name" id="name" aria-describedby="nameLabel" class="form-control" required>
                </div>
            </div>
            <div class="col-12 col-xxl-2 mt-3">
                <input type="submit" value="Előadó felvitele" class="btn btn-dark w-100">
            </div>
        </div>
    </form>
</div>