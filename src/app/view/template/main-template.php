<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/logoResized-v1.svg">
    <title><?= $title ?></title>
</head>
<body>
<nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/zarodolgozat/" style="display: flex; align-items: center;"><img src="img/logoFullExpanded.svg" alt="korong" style="height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent" style="font-size: 1.3rem;">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Korong lemezbolt"){ echo "active"; } ?>" aria-current="page" href="http://localhost/zarodolgozat/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Elérhetőség"){ echo "active"; } ?>" href="http://localhost/zarodolgozat/?controller=contactDetails">Elérhetőség</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Termékek"){ echo "active"; } ?>" href="http://localhost/zarodolgozat/?controller=products">Termékek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Részletes keresés"){ echo "active"; } ?>" href="http://localhost/zarodolgozat/?controller=search">Részletes keresés</a>
                </li>
            </ul>
            <form class="d-flex ml-auto">
                <input class="form-control mr-2 in" type="search" placeholder="Keresés" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Keresés</button>
            </form>
            <ul class="navbar-nav float-right-xl mb-2 mb-lg-0">
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="nav-link <?php if($title == "Bejelentkezés"){ echo "active"; } ?>" href="http://localhost/zarodolgozat/?controller=login">Bejelentkezés</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?= $content ?>
<script src="js/bootstrap.js"></script>
</body>
</html>
