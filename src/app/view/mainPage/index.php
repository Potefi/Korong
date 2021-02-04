<div class="flex-container">
    <div class="flex-sidebar border-right" style="background-color: rgb(232, 236, 242); color: #393e41">
        <?php include ('sidebar.php') ?>
    </div>
    <div class="flex-content container-fluid pb-3 bg-light">
        <div class="row slider mt-3">
            <?php include ('slider.php') ?>
        </div>
        <div class="row mt-3 ml-1 news">
            <p class="mb-0 newsText rounded-top">Újdonságok</p>
            <div class="newsLine"></div>
        </div>
        <div class="row">
            <?php include ('albumNews.php')?>
        </div>
        <div class="row mt-3 ml-1 news">
            <p class="mb-0 newsText2 rounded-top">Kiemelt termékek</p>
            <div class="newsLine"></div>
        </div>
        <div class="row">
            <?php include ('albums.php')?>
        </div>
    </div>
</div>
<div class="container bg-light block-container pb-3">
    <div class="row mt-3 ml-sm-1 news">
        <p class="mb-0 newsText rounded-top">Újdonságok</p>
        <div class="newsLine"></div>
    </div>
    <div class="row">
        <?php include ('albumNews.php')?>
    </div>
    <div class="row mt-3 ml-sm-1 news">
        <p class="mb-0 newsText2 rounded-top">Kiemelt termékek</p>
        <div class="newsLine"></div>
    </div>
    <div class="row">
        <?php include ('albums.php')?>
    </div>
</div>