<?php

use app\model\Album;
use app\model\Artist;
use app\model\Product;

$albums = Album::FindFiftyOldest();

/**
 * @var string $artist
 */
/**
 * @var string $title
 */
/**
 * @var string $category
 */

?>
<?php foreach ($albums as $album) : ?>
    <?php
        include("albumXXL.php");
        include("albumSM.php");
    ?>
<?php endforeach; ?>