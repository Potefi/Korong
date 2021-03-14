<?php

use app\model\Format;
use app\model\Product;
use app\model\Track;

/** @var $product Product */

$collapse = 'id="data' . $product->getId() . '" data-toggle="collapse" aria-controls="tracks ' . $product->getId() . '" data-target="#tracks' . $product->getId() . '" class="accordion-toggle table-toggle" onclick="backgroundChanger(' . "'" . 'data' . $product->getId() . "', '" . 'row' . $product->getId() . "')" . '"';
$collapseNoWrap = 'id="data' . $product->getId() . '" data-toggle="collapse" aria-controls="tracks ' . $product->getId() . '" data-target="#tracks' . $product->getId() . '" class="accordion-toggle text-nowrap table-toggle" onclick="backgroundChanger(' . "'" . 'data' . $product->getId() . "', '" . 'row' . $product->getId() . "')" . '"';

?>
<!-- Lists the details of the selected product // expands tracks -->
<tr id="row<?= $product->getId(); ?>">
    <th <?= $collapse ?> scope="row"><?= Format::findOneById($product->getFormatId())->getFormat(); ?></th>
    <td <?= $collapse ?>><?= $product->getCondition(); ?></td>
    <td <?= $collapse ?>><i><?= is_null($product->getDescription())?'-':$product->getDescription(); ?></i></td>
    <td <?= $collapseNoWrap ?>><?= $product->getPrice(); ?> Ft</td>
    <!-- Form to place product in cart - activates actionPlaceInCart in CartController -->
    <form action="/zarodolgozat/?controller=cart&action=PlaceInCart" method="post">
        <td><input type="number" name="quantity" id="quantity" min="0" class="form-control w-50 mx-auto" required></td>
        <td class="d-none"><input type="hidden" name="id" value="<?= $product->getId(); ?>"></td>
        <td><input type="submit" value="Kosárba" class="btn btn-dark"></td>
    </form>
</tr>
<tr>
    <td colspan="6" class="py-0 px-3">
        <!-- Expand this row on click // change color of header element on click -->
        <div onclick="backgroundChanger('data<?= $product->getId(); ?>', 'row<?= $product->getId(); ?>')" id="tracks<?= $product->getId(); ?>" class="collapse hide text-left table-toggle" aria-labelledby="data<?= $product->getId(); ?>" data-parent="#accordionTable" data-toggle="collapse" data-target="#tracks<?= $product->getId(); ?>">
            <h4 class="py-2 text-center font-weight-bold">Számok</h4>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cím</th>
                    <th scope="col">Hossz</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through tracks and list them -->
                <?php foreach (Track::findAllByProductId($product->getId()) as $track) : ?>
                    <?php /** @var $track Track */ ?>
                    <tr class="table-hover-none">
                        <th scope="row"><?= $track->getNumberOfTrack(); ?></th>
                        <td><?= $track->getTitle(); ?></td>
                        <td><?= $track->getLength() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </td>
</tr>