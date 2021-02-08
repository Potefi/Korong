<?php

$path = 'src/app/view/album/';

?>

<!-- PC -->
<div class="flex-container">
    <div class="flex-sidebar border-right" style="background-color: rgb(232, 236, 242); color: #393e41">
        <?php include ('sidebar.php') ?>
    </div>
    <div class="flex-content container-fluid pb-3 bg-light">
        <div class="row">
            <?php include ("{$path}albums.php") ?>
        </div>
    </div>
</div>
<!-- Mobil -->
<!--
<div class="container bg-light block-container pb-3">
    <div class="row mt-3 ml-sm-1 news">
        <p class="mb-0 newsText rounded-top">Újdonságok</p>
        <div class="newsLine"></div>
    </div>
    <div class="row">
        <?php // include ('albumNews.php') ?>
    </div>
    <div class="row mt-3 ml-sm-1 news">
        <p class="mb-0 featuredProducts rounded-top">Kiemelt termékek</p>
        <div class="newsLine"></div>
    </div>
    <div class="row">
        <?php // include ('albums.php') ?>
    </div>
</div>
-->