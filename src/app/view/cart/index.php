<?php

/**
 * @var $products Product[]
 */

/**
 * @var $purchase Purchase
 */


use app\model\Product;
use app\model\Purchase;


?>
<div class="container">
    <?php if (isset($_SESSION['errorMadeByUser']['cartNotNull'])) : ?>
        <div class="alert alert-warning my-3" role="alert">
            <?= $_SESSION['errorMadeByUser']['cartNotNull'] ?>
        </div>
        <?php unset($_SESSION['errorMadeByUser']['cartNotNull']); ?>
    <?php endif; ?>
    <?php if (isset($products) && !empty($products) && count($products) > 0) : ?>
        <?php $price = 0 ?>
        <div class="d-none d-lg-block">
            <?php include('cartPC.php'); ?>
        </div>
        <?php $price = 0 ?>
        <div class="d-block d-lg-none">
            <?php include('cartMobile.php'); ?>
        </div>
    <?php else: ?>
        <?php header("Location: /zarodolgozat/?controller=cart&action=empty"); ?>
        <?php exit(); ?>
    <?php endif; ?>
</div>