<?php

/**
 * @var string $title
 */

?>


<nav class="navbar navbar-expand-xl navbar-light sticky-top border-bottom" id="navBar">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/zarodolgozat/" style="display: flex; align-items: center;"><img src="img/logo/logoFullExpanded.svg" alt="korong" style="height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent" style="font-size: 1.3rem;">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Korong lemezbolt") ? "active" : '' ?>" aria-current="page" href="http://localhost/zarodolgozat/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Elérhetőség") ? "active" : '' ?>" href="http://localhost/zarodolgozat/?controller=contactDetails">Elérhetőség</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Termékek") ? "active" : '' ?>" href="http://localhost/zarodolgozat/?controller=products">Termékek</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Részletes keresés") ? "active" : '' ?>" href="http://localhost/zarodolgozat/?controller=search">Részletes keresés</a>
                </li>
            </ul>
            <form class="d-flex ml-auto">
                <input class="form-control mr-2 in" type="search" placeholder="Keresés" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Keresés</button>
            </form>
            <ul class="navbar-nav float-right-xl mb-2 mb-lg-0">
                <li><hr class="dropdown-divider"></li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/zarodolgozat/?controller=login">Bejelentkezés</a>
                </li>
            </ul>
        </div>
    </div>
</nav>