<?php
 session_start();
 if (!isset($_SESSION["user"])) {
 	header("Location: index.php");
 	return;
 }
 ?>

<?php include "utils/header.php" ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bienvenido <?= $_SESSION["user"]["name"] ?></h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registra Nuevo Producto
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">
                                    <a class="btn btn-success" href="addProduct.php"> Nuevo</a>
                                </div>
                                
                                <div class="col-8">
                                <a class="btn btn-info" href="products.php"> Ver Todo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registra Nuevo Servicio
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">
                                    <a class="btn btn-success" href="addService.php"> Nuevo</a>
                                </div>
                                
                                <div class="col-8">
                                <a class="btn btn-info" href="services.php"> Ver Todo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Registra Nuevo Usuario
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-4">
                                    <a class="btn btn-success" href="addUser.php"> Nuevo</a>
                                </div>
                                
                                <div class="col-8">
                                <a class="btn btn-info" href="users.php"> Ver Todo</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

</div>
<!-- /.container-fluid -->

<?php include "utils/footer.php" ?>
