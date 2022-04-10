<?php
 session_start();

 if (!isset($_SESSION["user"])) {
    header("Location: index.php");
 return;
 }

require 'scripts/db.php';

$servicios = $conn->query("SELECT * FROM services WHERE estado = 1");

?>

<?php include "utils/header.php" ?>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Productos</h1>
                <p class="mb-4">Tabla de los Productos</p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCION</th>
                                        <th>IMAGEN</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>NOMBRE</th>
                                        <th>DESCRIPCION</th>
                                        <th>IMAGEN</th>
                                    </tr>
                                </tfoot>
                                <tbody> <?php foreach ($servicios as $servicio) : ?>
                                        <tr>
                                            <td><?= $servicio['id'] ?></td>
                                            <td><?= $servicio['name_serv'] ?></td>
                                            <td><?= $servicio['description'] ?></td>
                                            <td><?= $servicio['img'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
            <?php include "utils/footer.php" ?>