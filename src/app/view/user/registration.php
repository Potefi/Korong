<?php

/**
 * @var $user User
 */

use app\model\User;


?>
<div class="container">
    <div class="bg-white rounded-bottom shadow my-5 py-3 px-4">
        <div class="row">
            <div class="col-sm">
                <h1 class="mt-0">Regisztráció</h1>
            </div>
        </div>
        <div class="row">
            <?php if (isset($_SESSION['errorMadeByUser']) && $_SESSION['errorMadeByUser'] == 'emailAlreadyInUse') : ?>
                <p class="font-italic text-danger">Ez az email cím már használatban van!</p>
            <?php elseif (isset($_SESSION['errorMadeByUser']) && $_SESSION['errorMadeByUser'] == 'usernameAlreadyInUse') : ?>
                <p class="font-italic text-danger">Ez a felhasználónév már használatban van!</p>
            <?php endif; ?>
            <?php $_SESSION['errorMadeByUser'] = ''; ?>
            <form action="/zarodolgozat/?controller=user&action=registration" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Felhasználónév*:</label>
                    <input type="text" class="form-control <?= $user->hasError("username")?"is-invalid":""?>" id="username" name="username" aria-describedby="emailHelp" placeholder="Add meg a felhasználóneved" required>
                    <?php if($user->hasError("username")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($user->getErrors())["username"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email cím*:</label>
                    <input type="email" class="form-control <?= $user->hasError("email")?"is-invalid":""?>" id="email" name="email" required aria-describedby="emailHelp" placeholder="Add meg az email címed">
                    <?php if($user->hasError("email")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($user->getErrors())["email"] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Jelszó*:</label>
                    <input type="password" class="form-control <?= $user->hasError("password")?"is-invalid":""?>" id="password" name="password" placeholder="Add meg a jelszavad" aria-describedby="password" required>
                    <?php if($user->hasError("password")) : ?>
                        <div class="invalid-feedback mb-0 pb-0">
                            <?= ($user->getErrors())["password"] ?>
                        </div>
                    <?php else: ?>
                        <div id="password" class="form-text">A jelszónak legalább 8 karakterből kell állnia! Különleges karaktereket nem tartalmazhat!</div>
                    <?php endif; ?>
                </div>
                <input type="submit" value="Regisztráció" class="btn btn-dark btn-block mt-4">
                <hr>
                <div>
                    <p class="float-right font-italic">A *-al jelölt mezők kötöltése kötelező</p>
                </div>
            </form>
        </div>
    </div>
</div>