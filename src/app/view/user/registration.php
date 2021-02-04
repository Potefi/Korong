<div class="container">
    <div class="row">
        <div class="col-sm">
            <h1>Regisztráció</h1>
        </div>
    </div>
    <div class="row">
        <form action="index.php?controller=user&action=registration" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Felhasználónév*:</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Add meg a felhasználóneved">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email cím*:</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Add meg az email címed">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Jelszó*:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Add meg a jelszavad">
            </div>
            <input type="submit" value="Regisztráció" class="btn btn-dark btn-block mt-4">
            <hr>
            <div>
                <p class="float-right font-italic">A *-al jelölt mezők kötöltése kötelező</p>
            </div>
        </form>
    </div>
</div>