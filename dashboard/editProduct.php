<?php
require "scripts/db.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    return;
}

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM products WHERE id = :id LIMIT 1");
$statement->execute([":id" => $id]);

if ($statement->rowCount() == 0) {
    http_response_code(404);
    header("Location: 404.php");
    echo ("HTTP 404 NOT FOUND");
    return;
}

$producto = $statement->fetch(PDO::FETCH_ASSOC);

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        empty($_POST["codigo"]) || empty($_POST["nameproduct"]) ||
        empty($_POST["description"]) || empty($_POST["tipo"]) ||
        empty($_POST["precio"]) || empty($_POST["cantidad"]) ||
        empty($_POST["datepro"])
    ) {
        $error = "Please fill all the fields.";
    } else {

        $statement = $conn->prepare("UPDATE products SET codigo_pro = :codigo, nombre_pro = :nombre , descripccion =:descripcion, tipo= :tipo, precio =:precio , cantidad =:cantidad , fecha_regis = :fecha, estado = :status, img = :imagen WHERE id = :id ");
        $statement->execute(array(
            ":id" => $id,
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

        $_SESSION["flash3"] = ["message" => "Producto {$_POST['nameproduct']} Editado."];
        header("Location: products.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Editar Producto</h1>
                        </div>
                        <form id="registerUser" enctype="multipart/form-data" name="registerUser" class="user" method="POST" action="editProduct.php?id=<?= $producto['id'] ?>">
                            <div class="form-group">
                                <input value="<?= $producto['codigo_pro'] ?>" type="text" class="form-control form-control-user" id="codigo" name="codigo" placeholder="codigo de producto">
                            </div>
                            <div class="form-group">
                                <input value="<?= $producto['nombre_pro'] ?>" type="text" class="form-control form-control-user" id="nameproduct" name="nameproduct" placeholder="Nombre Del Producto">
                            </div>
                            <div class="form-group">
                                <input value="<?= $producto['descripccion'] ?>" type="text" class="form-control form-control-user" name="description" id="description" placeholder="Descrpcion del producto">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input value="<?= $producto['precio'] ?>" type="number" class="form-control form-control-user" id="precio" name="precio" placeholder="Precio ">
                                </div>
                                <div class="col-sm-6">
                                    <input value="<?= $producto['cantidad'] ?>" type="number" class="form-control form-control-user" id="cantidad" name="cantidad" placeholder="Cantidad">
                                </div>
                            </div>

                            <div class="form-group">
                                <input value="<?= $producto['fecha_regis'] ?>" type="date" class="form-control form-control-user" name="datepro" id="datepro" placeholder="Fecha de Regsitro">
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
                                <span class="text">GUARDAR EDITADO</span>
                            </button>
                            <a href="products.php" class="btn btn-warning btn-user btn-block">
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