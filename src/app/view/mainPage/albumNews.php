<?php

use app\model\Album;

$albums = Album::FindLastThree();

?>
<?php foreach ($albums as $album) : ?>
    <?php
    include ("albumXXL.php");
    include ("albumSM.php");
    ?>
<?php endforeach; ?>