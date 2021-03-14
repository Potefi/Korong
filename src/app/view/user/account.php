<?php

use app\model\Album;
use app\model\Artist;
use app\model\Order;
use app\model\Product;
use app\model\Takeover;
use app\model\User;
use app\model\Purchase;

$user = $_SESSION['userId'];



?>
<div class="container">
    <div class="row">
        <h1><?= User::findOneById($_SESSION['userId'])->getUsername(); ?></h1>
    </div>
    <div class="row">
        <div class="col-12">
            <h2>Rendeléseim</h2>
            <div class="table-responsive">
                <table class="table table-striped vertical-align">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Rendelés azonosító</th>
                            <th scope="col" class="text-center">Termékek száma</th>
                            <th scope="col" class="text-center">Állapot</th>
                            <th scope="col" class="text-center">Rendelés dátuma</th>
                            <th scope="col" class="text-center">Összesen</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- List of orders -->
                        <?php foreach (Purchase::findAllByUserId($user) as $order) : ?>
                            <!-- Variable for the link // stretched link not working precisely on several devices with table -->
                            <?php $link = '<a href="#products' . $order->getId() . '" class="stretched-link d-block" data-toggle="collapse" aria-expanded="false" aria-controls="products' . $order->getId() . '></a>'; ?>
                            <!-- Calculate the sum of products and price -->
                            <?php $productSum = 0; ?>
                            <?php $priceSum = 0; ?>
                            <?php foreach (Order::findAllByOrderId($order->getId()) as $product) : ?>
                                <?php $productSum += $product->getQuantity(); ?>
                                <?php $priceSum += (Product::findOneById($product->getProductId())->getPrice() * $product->getQuantity()); ?>
                            <?php endforeach; ?>
                            <!-- The summary of the order -->
                            <tr>
                                <th scope="row" class="text-center">#<?= $order->getId(); ?></th>
                                <td class="text-center"><?= $productSum ?></td>
                                <td class="text-center"><?= $order->getStatus(); ?></td>
                                <td class="text-center"><?= $order->getDateOfOrder(); ?></td>
                                <td class="text-center"><?= $priceSum; ?> Ft</td>
                                <td class="text-center"><a href="#products<?= $order->getId(); ?>" class="btn btn-dark m-0 d-block" data-toggle="collapse" aria-expanded="false" aria-controls="products<?= $order->getId(); ?>">Megtekintés</a></td>
                            </tr>
                            <tr>
                                <!-- Details of the order -->
                                <td colspan="6" class="py-0">
                                    <div class="collapse" id="products<?= $order->getId(); ?>">
                                        <table class="table mb-0 table-borderless">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="col-3">Termék neve</th>
                                                    <th scope="col" class="col-2 text-center">Előadó</th>
                                                    <th scope="col" class="col-2 text-center">Mennyiség</th>
                                                    <th scope="col" class="col-2 text-center">Ár/db</th>
                                                    <th scope="col" class="col-2 text-center">Összesen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach (Order::findAllByOrderId($order->getId()) as $product) : ?>
                                                    <tr>
                                                        <td><?= Album::findOneById(Product::findOneById($product->getProductId())->getAlbumId())->getTitle(); ?></td>
                                                        <td class="text-center"><?= Artist::findOneById(Album::findOneById(Product::findOneById($product->getProductId())->getAlbumId())->getArtistId())->getName(); ?></td>
                                                        <td class="text-center"><?= $product->getQuantity() ?></td>
                                                        <td class="text-center"><?= Product::findOneById($product->getProductId())->getPrice(); ?> Ft</td>
                                                        <td class="text-center"><?= (Product::findOneById($product->getProductId())->getPrice() * $product->getQuantity()); ?> Ft</td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="row mx-0 px-0">
                                            <div class="col-8">
                                                <ul class="list-unstyled">
                                                    <li>Cím:</li>
                                                    <li><?= $order->getName(); ?></li>
                                                    <li><?= $order->getCity(); ?> <?= $order->getPostcode(); ?></li>
                                                    <li><?= $order->getAddress(); ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-4">
                                                <p class="text-right">Átvétel: <?= Takeover::findOneById($order->getTakeover())->getName(); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>