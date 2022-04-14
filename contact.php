

<?php require "partials/header.php" ?>

    <div id="hero" class="hero overlay subpage-hero contact-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Contactanos</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" href="contact.php" >Contactanos</li>
                </ol>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->

    <main id="main" class="site-main">

        <section class="site-section subpage-site-section section-contact-us">

            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <h2>Envia un Mensaje</h2>
                        <form action="contact.php" method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Nombre:</label>
                                        <input type="text" class="form-control" id="name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">E-mail:</label>
                                        <input type="email" class="form-control" id="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Asunto:</label>
                                <input class="form-control" id="subject"></input>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje:</label>
                                <textarea class="form-control form-control-comment" id="message"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-green">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-5">
                        <div class="contact-info">
                            <h2>Informacion de Contacto </h2>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>Ubicacion</h3>
                                    <ul class="list-unstyled">
                                        <li>Constitución 1403, El Dulce Nombre</li>
                                        <li>41100 Chilapa de Álvarez, Gro. </li>
                                    </ul>
                                    <h3>E-mail</h3>
                                    <a href="mailto:hospitalveterinariodr.ceron@gmail.com" target="_blank">hospitalveterinariodr.ceron@gmail.com</a>
                                    <h3>Phone</h3>
                                    <a href="tel:756-104-0064 " target="_blank">756-104-0064 </a>
                                </div>
                            </div>
                        </div><!-- /.contact-info -->
                    </div>
                </div>
            </div>

        </section><!-- /.section-contact-us -->


        <?php require "partials/footer.php" ?>