<?php

/**
 * @var string $path
 */

use app\model\Album;
use app\model\Format;
use app\model\Product;

if((isset($_POST['artist']) && !empty($_POST['artist'])) || (isset($_POST['album']) && !empty($_POST['album'])) || (isset($_POST['selectCategory']) && ($_POST['selectCategory'] != 'default' || $_POST['selectCategory'] == 'all')) || (isset($_POST['selectFormat'])) && ($_POST['selectFormat'] != 'default' || $_POST['selectFormat'] == 'all')){
    echo "<div class='row'>";
    echo "<h3 class='searchResultsText display-5'>Találatok:</h3>";
    echo "<div class='border-bottom mb-2 searchResultsLine'></div>";
    $sql = "SELECT DISTINCT Album.id AS 'id' FROM Artist ";
    $sql .= "JOIN `Album` ON Artist.id = Album.artistId ";
    $sql .= "JOIN `Product` ON Album.id = Product.albumId ";

    $operator = 'WHERE';

    if (isset($_POST['artist']) && $_POST['artist'] != ''){
        $artist = strtolower($_POST['artist']);
        $sql .= "$operator LOWER(Artist.name) LIKE '%{$artist}%' ";
        $operator = 'AND';
    }
    if (isset($_POST['album']) && $_POST['album'] != ''){
        $title = strtolower($_POST['album']);
        $sql .= "$operator LOWER(album.title) LIKE '%{$title}%' ";
        $operator = 'AND';
    }
    if (isset($_POST['selectFormat']) && ($_POST['selectFormat'] != 'default' && $_POST['selectFormat'] != 'all')){
        $format = Format::findOneByFormat($_POST['selectFormat'])->getId() . ' ';
        $sql .= "$operator product.formatId = {$format}";
        $operator = 'AND';
    }
    if (isset($_POST['selectCategory']) && ($_POST['selectCategory'] != 'default' && $_POST['selectCategory'] != 'all')){
        $category = strtolower($_POST['selectCategory']);
        $sql .= "$operator album.category LIKE '%{$category}%' ";
        $operator = 'AND';
    }
    if (isset($_POST['priceRangeMin'])){
        $minPrice = $_POST['priceRangeMin'];
        $sql .= "$operator product.price > '{$_POST['priceRangeMin']}' ";
        $operator = 'AND';
    }
    if (isset($_POST['priceRangeMax'])){
        $maxPrice = $_POST['priceRangeMax'];
        $sql .= "$operator product.price < '{$maxPrice}' ";
        $operator = 'AND';
    }
    $connect = mysqli_connect('127.0.0.1', 'root', '', 'musickorong');
    $stmt = mysqli_query($connect, $sql);

    /*
    var_dump($sql . '\n');
    var_dump($stmt);
    var_dump(mysqli_error($connect));
    die();
    */

    $numberOfResults = 0;
    while ($row = mysqli_fetch_assoc($stmt)){
        if (Product::checkIfProductExists($row['id'])) {
            $album = Album::findOneById($row['id']);
            include ("{$path}albumXXL.php");
            include ("{$path}albumSM.php");
            $numberOfResults++;
        }
    }
    if ($numberOfResults == 0){
        echo '<h3 class="display-6 text-center font-italic">Jelenleg nincs ilyen termék az áruházunkban...</h3>';
    }
    echo "</div>";
}else{
    echo '<div class="placeholderImage"><img src="img/logo/logoResized-v1.svg" class="rounded-left mx-auto mt-5" alt="Korong lemezbolt"></div>';
    echo "<h2 class='placeholderText mt-3'>Itt lesznek láthatóak a szűrés eredményei...</h2>";
}