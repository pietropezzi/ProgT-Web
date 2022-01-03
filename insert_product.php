<?php
require_once("bootstrap.php");

$nome = $_POST["nome"];
$venditore = $_SESSION["email"];
$prezzo = $_POST["prezzo"];		
$tipo = $_POST["tipo"];	
$quantità = $_POST["quantità"];
$breve_descrizione = $_POST["breve_descrizione"];
$descrizione = $_POST["descrizione"];
$checkInsert = $dbh->insertProduct($nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione);

if($checkInsert){	
	$Message = "Inserimento del prodotto: ".$nome." eseguita con successo.";
	require("your_product.php");	
}else{
	$ErrorMessage = "INSERIMENTO DEL PRODOTTO FALLITO";
	require("new_product.php");
}
?>