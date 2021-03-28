<?php

/**
 * @var $product Product
 */

use app\model\Format;
use app\model\Product;
use app\model\Track;

?>
<div class="card w-100 mb-2">
    <div class="card-body">
        <div class="position-relative" >
            <h5 class="card-title"><?= $product->getFormat()->format; ?> - <?= $product->getCondition(); ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $product->getPrice(); ?> Ft</h6>
            <p class="card-text">Leírás:</a> <i><?= is_null($product->getDescription())?'-':$product->getDescription(); ?></i></p>
            <!-- Link to collapse tracks -->
            <p><a href="#tracks<?= $product->getId(); ?>" data-toggle="collapse" aria-expanded="false" aria-controls="tracks<?= $product->getId(); ?>" class="stretched-link text-body text-decoration-none font-italic">Részletek...</a></p>
            <!-- Collapsable tracks -->
            <div class="collapse" id="tracks<?= $product->getId(); ?>">
                <h4 class="py-2">Számok</h4>
                <ol>
                    <!-- TODO - tracks optimization -->
                    <?php foreach ($product->getAllTracks() as $track) : ?>
                        <?php /** @var $track Track */ ?>
                        <li>
                            <?= $track->getTitle(); ?> - <?= $track->getLength() ?>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
        <!-- Form to place product in cart - activates actionPlaceInCart in CartController -->
        <form action="/zarodolgozat/?controller=cart&action=PlaceInCart" method="post" class="row">
            <input type="hidden" name="id" value="<?= $product->getId(); ?>">
            <div class="col-6">
                <input type="number" name="quantity" id="quantity" min="0" class="form-control" required placeholder="Mennyiség">
            </div>
            <div class="col-6">
                <input type="submit" value="Kosárba" class="btn btn-dark d-block w-100">
            </div>
        </form>
    </div>
</div>