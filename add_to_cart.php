<?php
require_once("bootstrap.php");

$cliente = $_SESSION["email"];
$venditore = $_POST["venditore"];
$nome = $_POST["nome"];	
$prezzo = $_POST["prezzo"];
$quantità = $_POST["quantità"];

$checkInsert = $dbh->doOrder($cliente, $venditore, $nome, $prezzo, $quantità);

if($checkInsert){	
	$Message = "".$nome." Inserito nel carrello.";
    require("index.php");	
    
}else{
	$ErrorMessage = "INSERIMENTO DEL PRODOTTO FALLITO";
	require("index.php");
}
?>