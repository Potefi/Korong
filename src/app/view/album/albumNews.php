<?php

use app\model\Album;
use app\model\Product;

$albums = Album::FindLastThree();

?>
<?php foreach ($albums as $album) : ?>
    <?php
        if (gettype($album->findLowestPrice()->price) != 'boolean')
        {
            include("albumXXL.php");
            include("albumSM.php");
        }
    ?>
<?php endforeach; ?>