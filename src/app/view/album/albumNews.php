<?php

use app\model\Album;
use app\model\Product;

$albums = Album::findLastThree();


?>
<?php foreach ($albums as $album) : ?>
    <?php
        if (gettype($album->findLowestPrice()) != 'boolean')
        {
            include("albumXXL.php");
            include("albumSM.php");
        }
    ?>
<?php endforeach; ?>