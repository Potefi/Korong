<?php

use app\model\Product;

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center display-1 mt-0">Termékek</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <ul class="list-unstyled">
                <?php foreach (Product::FindAll() as $product) : ?>
                    <li class="h4 admin-selection-row-hover px-2 py-1 my-0">
                        <div class="row">
                            <div class="col-sm-6" id="admin-selection-title"><?= $product->getName(); ?></div>
                            <div class="col-sm-6" id="admin-selection-links"><a href="" class="text-decoration-none">Módosítás</a> | <a href="" class="text-decoration-none">Törlés</a></div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
