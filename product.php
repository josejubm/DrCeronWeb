<?php

require 'dashboard/scripts/db.php';

$id = $_GET["id"];

$products = $conn->prepare("SELECT * FROM products WHERE id = :id LIMIT 1");
$products->execute([":id" => $id]);

?>

<?php require "partials/header.php" ?>


    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <?php foreach ($products as $product) : ?>
                <h1><?= $product['nombre_pro'] ?> </h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="products.php">Productos</a></li>
                  <li class="breadcrumb-item"><a href="#"><?= $product['nombre_pro'] ?></a></li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-project">

            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="project-img">
                            <img src="dashboard/imagesProducts/<?= $product['img'] ?>" class="img-res" alt="">
                        </div><!-- /.project-img -->

                    </div>
                    <aside class="col-md-4">
                        <div class="project-info">
                           
                            <h3><?= $product['nombre_pro'] ?></h3>
                            <p></p>
                            <h4>Descripción</h4>
                            <p class="project-description"> <?= $product['descripccion'] ?> </p>

                            <div class="project-date-category">

                                <p><span>Fecha Publicacion:</span> <?= $product['fecha_regis'] ?></p>

                                <p><span>Categoria:</span> <?= $product['tipo'] ?></p>

                                <p><span>Precio en Tienda:</span> $ <?= $product['precio'] ?> </p>

                                <p><span>Cantidad Disponible:</span> <?= $product['cantidad'] ?></p>
                            </div><!-- /.project-cat -->

                            <a href="contact.php" class="btn btn-gray">Reservar</a>
                        </div><!-- /.project-description -->
                    </aside>
                </div>
            </div>
            
        </section><!-- /.section-project -->
        <?php endforeach ?>

<?php require "partials/footer.php" ?>