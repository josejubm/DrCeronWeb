<?php

require 'dashboard/scripts/db.php';

$servicios = $conn->query("SELECT * FROM services WHERE estado = 1");

?>

<?php require "partials/header.php" ?>

    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Servicios</h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="services.php">Servicios</a></li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

    <?php foreach ($servicios as $servicio) : ?>
    <section class="site-section section-features">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h2> <?= $servicio['name_serv'] ?> </h2>
                    <div class="testimonial-author">
                    <?= $servicio['description'] ?>  
                    </div>

                </div>
                <div class="col-sm-7 hidden-xs">
                    <img src="dashboard/imagesServices/<?= $servicio['img'] ?>" alt="">
                </div>
            </div>
        </div>
    </section><!-- /.section-features -->

    <?php endforeach ?>

<?php require "partials/footer.php" ?>