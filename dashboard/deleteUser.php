<?php

require "scripts/db.php";

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
  echo("HTTP 404 NOT FOUND");
  return;
}

$users = $statement->fetch(PDO::FETCH_ASSOC);

$conn->prepare("DELETE FROM users WHERE id = :id")->execute([":id" => $id]);

$_SESSION["flash2"] = ["message" => "Usuario {$users['name']} Eliminado."];

header("Location: users.php");