<?php

require 'dashboard/scripts/db.php';

$products = $conn->query("SELECT * FROM products WHERE estado = 1");

?>

<?php require "partials/header.php" ?>

<div id="hero" class="hero overlay subpage-hero products-hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Productos</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Productos</li>
            </ol>
        </div><!-- /.hero-text -->
    </div><!-- /.hero-content -->
</div><!-- /.hero -->


<section class="site-section subpage-site-section section-portfolio">
    <div class="container">

        <ul class="portfolio-sorting list-inline text-center">
            <li><a href="#" class="btn btn-gray active" data-group="all">Todos</a></li>
            <li><a href="#" class="btn btn-gray" data-group="MEDICAMENTO">Medicamentos</a></li>
            <li><a href="#" class="btn btn-gray" data-group="ALIMENTO">Alimentos</a></li>
            <li><a href="#" class="btn btn-gray" data-group="ACCESORIO">Acesorios</a></li>

        </ul><!-- /.portfolio-sorting  -->

        <div id="grid" class="row">

            <?php foreach ($products as $product) : ?>

                <div class="col-lg-3 col-md-4 col-xs-6" data-groups='["<?= $product['tipo'] ?>"]'>
                    <div class="portfolio-item">
                        <img src="dashboard/imagesProducts/<?= $product['img'] ?>" class="img-res" alt="">
                        <h4 class="portfolio-item-title"><?= $product['nombre_pro'] ?></h4>
                        <a href="product.php?id=<?= $product["id"] ?>">Saber Mas<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div><!-- /.portfolio-item -->
                </div>
            <?php endforeach ?>
        </div>
        <div class="text-center">
            <a class="btn btn-gray" href="#" id="loadMore">Load More</a>
        </div>

    </div>
</section><!-- /.section-portfolio -->


<?php require "partials/footer.php" ?>