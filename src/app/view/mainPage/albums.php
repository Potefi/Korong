<?php

use app\model\Album;

$albums = Album::FindAll();

?>
<?php for ($i = 0; $i < 3; $i++) : ?>
    <?php foreach ($albums as $album) : ?>
        <?php
            include ("albumXXL.php");
            include ("albumSM.php");
        ?>
    <?php endforeach; ?>
<?php endfor; ?>