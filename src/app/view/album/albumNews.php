<?php

use app\model\Album;
use app\model\Product;

$albums = Album::FindLastThree();

?>
<?php foreach ($albums as $album) : ?>
    <?php
        if (gettype(Product::findOneByIdOrderedByPriceAsc($album->getId())) != 'boolean')
        {
            include("albumXXL.php");
            include("albumSM.php");
        }
    ?>
<?php endforeach; ?>