<?php

/**
 * @var string $title
 */

use app\model\User;

?>
<nav class="navbar navbar-expand-xl navbar-light sticky-top border-bottom" id="navBar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/zarodolgozat/" style="display: flex; align-items: center;"><img src="img/logo/logoFullExpanded.svg" alt="korong" style="height: 50px;"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mr-auto" id="navbarSupportedContent" style="font-size: 1.3rem;">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Korong lemezbolt") ? "active" : '' ?>" aria-current="page" href="/zarodolgozat/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Kapcsolat") ? "active" : '' ?>" href="/zarodolgozat/?controller=contactDetails">Kapcsolat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Kategóriák") ? "active" : '' ?>" href="/zarodolgozat/?controller=categories">Kategóriák</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == "Részletes keresés") ? "active" : '' ?>" href="/zarodolgozat/?controller=search">Részletes keresés</a>
                </li>
            </ul>
            <div class="d-flex ml-auto">
                <ul class="navbar-nav float-right-xl mb-2 mb-lg-0">
                    <li><hr class="dropdown-divider"></li>
                    <?php if (isset($_SESSION['userId'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link active disabled"><?= User::findOneById($_SESSION['userId'])->getUsername() ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-none d-xl-block">|</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == "Fiókom") ? "active" : '' ?>" href="/zarodolgozat/?controller=user&action=account">Fiókom</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == "Kosár" || $title == "Kosár - üres") ? "active" : '' ?>" href="/zarodolgozat/?controller=cart&action=list">Kosár<?= (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)? '(' . count($_SESSION['cart']) . ')':'' ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/zarodolgozat/?controller=user&action=logout">Kijelentkezés</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link <?= ($title == "Kosár" || $title == "Kosár - üres") ? "active" : '' ?>" href="/zarodolgozat/?controller=cart&action=list">Kosár<?= (isset($_SESSION['cart']) && count($_SESSION['cart']) != 0)? '(' . count($_SESSION['cart']) . ')':'' ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/zarodolgozat/?controller=user&action=login">Bejelentkezés</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>