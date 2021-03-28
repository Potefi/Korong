<?php

/** @var Product[] $products */

use app\model\Format;
use app\model\Product;

?>

<h3 class="my-3 px-0">Termékek: </h3>
<table class="table text-center vertical-align table-borderless">
    <thead>
        <tr>
            <th scope="col">Formátum</th>
            <th scope="col">Állapot</th>
            <th scope="col">Leírás</th>
            <th scope="col">Ár</th>
            <th scope="col">Mennyiség (db)</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="table-products accordion" id="accordionTable">
        <?php foreach ($products as $product) : ?>
            <?php if (isset($_POST['format']) && $_POST['format'] != 'all') : ?>
                <?php if ($product->getFormat()->format == $_POST['format']) : ?>
                    <?php include('albumSelectedTableRow.php'); ?>
                <?php endif; ?>
            <?php else: ?>
                <?php include('albumSelectedTableRow.php'); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>