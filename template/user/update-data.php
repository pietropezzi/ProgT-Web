<?php 
require_once("../../bootstrap.php");

$nome = $_POST["nome"];
$username = $_POST["username"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$tipo = $_POST["tipo"];

if(($tipo == $_SESSION["type"]) && empty($nome) && empty($username) && empty($email) && empty($telefono)){
    $_SESSION["ErrEmpty"] = "Nessun dato da aggiornare inserito.";
}else{
    $_SESSION["Message"] = "Dati aggiornati con successo.";
}

header("Location: ../../profile.php");
?>