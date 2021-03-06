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
    <link rel="icon" href="img/logo/logoResized-v1.svg">
    <title><?= $title ?></title>
</head>
<body class="bg-light">
    <?php include ("navbar.php") ?>
<div class="page-wrapper">
    <?= $content ?>
</div>
    <?php include ("footer.php") ?>
<script src="js/filter.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/code.js"></script>
</body>
</html>
