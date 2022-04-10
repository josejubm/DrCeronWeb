<?php
/* guarda el nuevo usuario */
session_start();

if (!isset($_SESSION["user"])) {
         header("Location: index.php");
     return;
 }
require 'scripts/db.php';
$error = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["date"]) || empty($_POST["tipo"])) {
		$error = "Please fill all the fileds. ";
	} else if (!str_contains($_POST["email"], "@")) {
		$error = "Email Format Is Incorrect. ";
	} else {
		$statement = $conn->prepare("SELECT * FROM users WHERE email = :email ;");
		$statement->bindParam(":email", $_POST["email"]);
		$statement->execute();

		if ($statement->rowCount() > 0) {
			$error = "This name is taken. ";
		} else {
			$conn
				->prepare("INSERT INTO users (name, email, password, date_regis, tipe, status) VALUES (:name, :email, :password, :fecha, :tipo , 1)")
				->execute([
					":name" => $_POST["name"],
					":email" => $_POST["email"],
					":password" => password_hash($_POST["password"], PASSWORD_BCRYPT),
					":fecha" => $_POST["date"],
					":tipo" => $_POST["tipo"]
				]);

            

			$statement = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
			$statement->bindParam(":email", $_POST["email"]);
			$statement->execute();
			$user = $statement->fetch(PDO::FETCH_ASSOC);

			$_SESSION["user"] = $user;

            $_SESSION["flash"] = ["message" => "Nuevo Usuario {$_POST['name']} Agregado."];
			header("Location: users.php");
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
                            <h1 class="h4 text-gray-900 mb-4">Crea un nuevo Usuario </h1>
                        </div>
                        <form id="registerUser" name="registerUser" class="user" method="POST" action="addUser.php">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" name="email" id="email" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control form-control-user" name="date" id="date" placeholder="Fecha de Regsitro">
                            </div>

                            <div class="form-group">
                                <select id="tipo" name="tipo" class="form-control" placeholder="TIPO" required>
                                    <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option value="NORMAL USER">NORMAL USER</option>
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