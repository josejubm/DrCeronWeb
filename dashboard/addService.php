<?php
require "scripts/db.php";

session_start();
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    return;
}

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nameserv"]) || empty($_POST["descriptionserv"])) {
        $error = "Please fill all the fields.";
    } else {

        $check = @getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {

            $carpeta_destino = "fotos/";
            $tmp_name = $_FILES['foto']['tmp_name'];
            $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
            copy($tmp_name, $archivo_subido);


            $statement = $conn->prepare("INSERT INTO services (name_serv, description, estado, img)
            VALUES (:nombre, :descripcion, :status, :imagen);");
            $statement->execute(array(
                ":nombre" => $_POST["nameserv"],
                ":descripcion" => $_POST["descriptionserv"],
                ":status" => $status = 1,
                ":imagen" => $_FILES['foto']['name']
            ));

            $_SESSION["flash"] = ["message" => "Servicio {$_POST['nameserv']} Agregado."];

            header("Location: services.php");
            return;
        }
    }
}

?>

<?php include "utils/header.php" ?>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row ">
                <div class="col-lg-7 container">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Nuevo Servicio</h1>
                        </div>
                        <form id="registerService" enctype="multipart/form-data" name="registerService" class="user" method="POST" action="addService.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nameserv" name="nameserv" placeholder="nombre del servicio">
                            </div>

                            <div class="form-group">
                                <textarea cols="30" rows="2" class="form-control form-control-user" name="descriptionserv" id="descriptionserv" placeholder="Descrpcion del Servicio"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-user" name="foto" id="foto" placeholder="imagen">
                            </div>

                            <button class="btn btn-success btn-user btn-block" id="guarda" name="guarda" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">GUARDAR NUEVO</span>
                            </button>

                            <a href="services.php" class="btn btn-warning btn-user btn-block">
                                <span class="icon text-white-50">
                                    <i class="fas fa-ban"></i>
                                </span>
                                <span>REGRESAR</span>
                            </a>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "utils/footer.php" ?>