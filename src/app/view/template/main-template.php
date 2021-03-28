<?php

/** @var string $title */
/** @var string $content */

use app\model\User;

?>
<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <?php if ($title == 'Kosár - üres') : ?>
        <link rel="stylesheet" href="css/cart.css">
    <?php endif; ?>
    <link rel="icon" href="img/logo/logoResized-v1.svg">
    <title><?= $title ?></title>
</head>
<body class="bg-light">
<!-- Including the navbar -->
<?php include ("navbar.php") ?>

<!-- Show the page struct on admin page for easier navigation -->
<?php if (strpos($title, "Admin") !== false) : ?>
    <p class="mt-3">
        <a href="/zarodolgozat/?controller=<?= $_GET['controller'] ?>" class="text-dark text-decoration-none pl-5 h5">admin</a> /
        <!-- If action contains artist then show a link for artists page -->
        <?php if (isset($_GET['action']) && strpos(strtolower($_GET['action']), "artist") !== false) : ?>
            <a href="/zarodolgozat/?controller=<?= $_GET['controller'] ?>&action=artists" class="text-dark text-decoration-none h5">artists</a> /
        <?php endif; ?>
        <!-- If action contains album then show a link for albums page -->
        <?php if (isset($_GET['action']) && strpos(strtolower($_GET['action']), "album") !== false) : ?>
            <a href="/zarodolgozat/?controller=<?= $_GET['controller'] ?>&action=albums" class="text-dark text-decoration-none h5">albums</a> /
        <?php endif; ?>
    </p>
<?php endif; ?>

<!-- The actual content of the page redirected from the given controller -->
<div class="page-wrapper">
    <?= $content ?>
</div>

<!-- Including the footer file -->
<?php include ("footer.php") ?>
<script src="js/filter.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/code.js"></script>
</body>
</html>
