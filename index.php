<?php require "partials/header.php" ?>

<div id="hero" class="hero overlay">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Your story begins from here.</h1>
            <p>Your clients on the internet. Learn how to receive them.</p>
            <a href="#" class="btn btn-border">Learn more</a>
        </div><!-- /.hero-text -->
    </div><!-- /.hero-content -->
</div><!-- /.hero -->

<main id="main" class="site-main">

    <section class="site-section section-features">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h2>HOSPITAL VETERINARIO DR.CERON te ofrece</h2>
                    <p>Servicios clínicos: tratamiento de animales enfermos y control de enfermedades que limitan la producción.
                        Servicios preventivos de enfermedades.
                        Suministro de medicamentos, vacunas y otros productos (v.g. inseminación artificial).
                        Protección de la salud humana (por ejemplo, inspección de productos animales para la venta).</p>
                    <p class="testimonial-text">"Medico a cargo "</p>
                    <div class="testimonial-author">
                        <center>Dr. Arturo Cerón Martínez</center>
                    </div>

                </div>
                <div class="col-sm-7 hidden-xs">
                    <img src="assets/images/img-ds.jpg" alt="">
                </div>
            </div>
        </div>
    </section><!-- /.section-features -->

    <section class="site-section section-services gray-bg text-center">
        <div class="container">
            <h2 class="heading-separator">Nuestros Servicios</h2>
            <p class="subheading-text"> texto </p>
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="service">
                        <img src="assets/img/anchor.svg" alt="">
                        <h3 class="service-title">Medicamentos</h3>
                        <p class="service-info"> De una excelente calidad. </p>
                    </div><!-- /.service -->
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="service">
                        <img src="assets/img/bycicle.svg" alt="">
                        <h3 class="service-title">Alimentos </h3>
                        <p class="service-info"> Con excelencia alimentaria.</p>
                    </div><!-- /.service -->
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="service">
                        <img src="assets/img/paper-plane.svg" alt="">
                        <h3 class="service-title">Accesorios</h3>
                        <p class="service-info">Para comodidad de sus mascotas.</p>
                    </div><!-- /.service -->
                </div>
            </div>
        </div>
    </section><!-- /.section-services -->

    <section class="site-section section-services text-center">

        <div id="carouselExampleIndicators" class="carousel slide container" data-bs-ride="carousel" >
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>

    </section><!-- /.section-map-feature -->

    <?php require "partials/footer.php" ?>