<?php
require "scripts/db.php";

// session_start();
// if (!isset($_SESSION["user"])) {
// 	header("Location: index.php");
// 	return;
// }

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (
        empty($_POST["codigo"]) || empty($_POST["nameproduct"]) ||
        empty($_POST["description"]) || empty($_POST["tipo"]) ||
        empty($_POST["precio"]) || empty($_POST["cantidad"]) ||
        empty($_POST["datepro"]) || empty($_FILES["foto"]["name"])
    ) {
        $error = "Please fill all the fields.";
    } else {

        $check = @getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {

            $carpeta_destino = "fotos/";
            $tmp_name = $_FILES['foto']['tmp_name'];
            $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
            copy($tmp_name, $archivo_subido);


            $statement = $conn->prepare("INSERT INTO products (codigo_pro, nombre_pro, descripccion, tipo, precio, cantidad, fecha_regis, estado, img)
         VALUES (:codigo, :nombre, :descripcion, :tipo, :precio, :cantidad, :fecha, :status, :imagen);");
            $statement->execute(array(
                ":status" => $status = 1,
                ":codigo" => $_POST["codigo"],
                ":nombre" => $_POST["nameproduct"],
                ":descripcion" => $_POST["description"],
                ":tipo" => $_POST["tipo"],
                ":precio" => $_POST["precio"],
                ":cantidad" => $_POST["cantidad"],
                ":fecha" => $_POST["datepro"],
                ":imagen" => $_FILES['foto']['name']
            ));
            header("Location: products.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Nuevo Producto</h1>
                        </div>
                        <form id="registerUser" enctype="multipart/form-data" name="registerUser" class="user" method="POST" action="addProduct.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="codigo" name="codigo" placeholder="codigo de producto">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nameproduct" name="nameproduct" placeholder="Nombre Del Producto">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="description" id="description" placeholder="Descrpcion del producto">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="number" class="form-control form-control-user" id="precio" name="precio" placeholder="Precio ">
                                </div>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control form-control-user" id="cantidad" name="cantidad" placeholder="Cantidad">
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" name="datepro" id="datepro" placeholder="Fecha de Regsitro">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-user" name="foto" id="foto" placeholder="imagen">
                            </div>
                            <div class="form-group">
                                <select id="tipo" name="tipo" class="form-control" placeholder="TIPO" required>
                                    <option value="MEDICAMENTO">MEDICAMENTOS</option>
                                    <option value="ALIMENTO">ALIMENTO</option>
                                    <option value="ACCESORIO">ACCESORIO</option>
                                </select>
                            </div>

                            <button class="btn btn-success btn-user btn-block" id="guarda" name="guarda" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">GUARDAR NUEVO</span>
                            </button>
                            <a href="produts.php" class="btn btn-warning btn-user btn-block">
                                REGRESAR
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