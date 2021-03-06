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
        
        $archivo = $_FILES['fotoService']['name'];

            if (isset($archivo) && $archivo != "") {

                $tipo = $_FILES['fotoService']['type'];
                $tamano = $_FILES['fotoService']['size'];
                $temp = $_FILES['fotoService']['tmp_name'];

                //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
                        $_SESSION["flash2"] = ["message" => "La extensión o el tamaño de los archivos no es correcta."];
                } else {
                    if (move_uploaded_file($temp, 'imagesServices/' . $archivo)) {
                        chmod('imagesServices/' . $archivo, 0777);
                    } else {
                        $_SESSION["flash2"] = ["message" => "Ocurrió algún error al subir el fichero. No pudo guardarse."];
                    }
                 $_SESSION["flash"] = ["message" => "La imagen  {$_FILES['fotoService']['name']} se agrego ."];
                }
            }


            $statement = $conn->prepare("INSERT INTO services (name_serv, description, estado, img)
            VALUES (:nombre, :descripcion, :status, :imagen);");
            $statement->execute(array(
                ":nombre" => $_POST["nameserv"],
                ":descripcion" => $_POST["descriptionserv"],
                ":status" => $status = 1,
                ":imagen" => $_FILES['fotoService']['name']
            ));

            $_SESSION["flash"] = ["message" => "Servicio {$_POST['nameserv']} Agregado."];

            header("Location: services.php");
            return;
        
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
                            <label for="">Imagen del Servicio</label>
                                <input type="file" class="form-control form-control-user" name="fotoService" id="fotoService" placeholder="imagen">
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