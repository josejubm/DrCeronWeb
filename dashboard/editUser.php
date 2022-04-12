<?php
require 'scripts/db.php';
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    return;
}

$id = $_GET["id"];

$statement = $conn->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
$statement->execute([":id" => $id]);

if ($statement->rowCount() == 0) {
    http_response_code(404);
    header("Location: 404.php");
    echo ("HTTP 404 NOT FOUND");
    return;
}

$user = $statement->fetch(PDO::FETCH_ASSOC);

$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["date"]) || empty($_POST["tipo"])) {
        $error = "Please fill all the fileds. ";
    } else if (!str_contains($_POST["email"], "@")) {
        $error = "Email Format Is Incorrect. ";
    } else {

            $conn
                ->prepare("UPDATE users SET name = :name, email = :email , password = :password, date_regis = :fecha, tipe = :tipo WHERE id = :id ")
                ->execute([ 
                    ":id" => $id,
                    ":name" => $_POST["name"],
                    ":email" => $_POST["email"],
                    ":password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
                    ":fecha" => $_POST["date"],
                    ":tipo" => $_POST["tipo"]
                ]);

            $_SESSION["flash3"] = ["message" => "Usuario {$_POST['name']} Editado."];
           
            header("Location: users.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Editar Usuario </h1>
                        </div>
                        <form  class="user" method="POST" action="editUser.php?id=<?= $user['id'] ?>">
                            <div class="form-group">
                                <input value="<?= $user['name'] ?>" type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input value="<?= $user['email'] ?>" type="email" class="form-control form-control-user" name="email" id="email" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group">
                                <input value="" type="password" class="form-control form-control-user" name="password" id="password" placeholder="Nueva Contraseña">
                            </div>
                            <div class="form-group">
                                <input value="<?= $user['date_regis'] ?>" type="date" class="form-control form-control-user" name="date" id="date" placeholder="Fecha de Regsitro">
                            </div>

                            <div class="form-group">
                                <select id="tipo" name="tipo" class="form-control" placeholder="TIPO" required>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option value="NORMAL USER">USUARIO NORMAL</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>

                            <button class="btn btn-success btn-user btn-block" id="guarda" name="guarda" type="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">GUARDAR NUEVO</span>
                            </button>
                            <a href="users.php" class="btn btn-warning btn-user btn-block">
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