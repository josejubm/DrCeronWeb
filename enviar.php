<?php

if (
    isset($_POST['name']) &&
    isset($_POST['email']) &&
    isset($_POST['subject']) &&
    isset($_POST['message'])
) {
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    $from = $correo;
    $to = "57201000026@utrng.edu.mx    ";
    $subjet = $asunto . "De " . $nombre;
    $message = $mensaje;
    $headers = "From:" . $from;
    
    if (mail($to, $subjet, $message, $headers )) {

      $_SESSION["flash"] = ["message" => "Mensaje Enviado Correctamente"];  

      echo 1;
    }else{
      $_SESSION["flash2"] = ["message" => "El Mensaje No Se Envio"];  
        echo 0;
    }

    header("Location: contact.php");
    return;

}else{
  $_SESSION["flash2"] = ["message" => "Ocurrio Un ERROR"];
  echo 0;
  header("Location: contact.php");
  return;
}

?>