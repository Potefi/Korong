<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1>Bejelentkezés</h1>
        </div>
    </div>
    <div class="row">
        <?php if (isset($_SESSION['errorMadeByUser']) && $_SESSION['errorMadeByUser'] == 'wrongEmailOrPassword') : ?>
            <p class="font-italic text-danger">Hibás email cím, vagy jelszó!</p>
        <?php endif; ?>
        <?php $_SESSION['errorMadeByUser'] = ''; ?>
        <form action="index.php?controller=user&action=login" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email cím:</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Add meg az email címed">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Jelszó:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Add meg a jelszavad">
            </div>
            <input type="submit" value="Bejelentkezés" class="btn btn-dark btn-block mt-4">
            <hr>
            <div>
                <p class="float-right h6 font-weight-normal">Még nincs fiókod? <a href="index.php?controller=user&action=registration" class="text-decoration-none font-weight-bold registration-link">Regisztrálj!</a></p>
            </div>
        </form>
    </div>
</div>