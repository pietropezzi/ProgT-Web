<?php
require_once("bootstrap.php");

$idprod = $_POST["idprod"];
$nome = $_POST["nome"];
$prezzo = $_POST["prezzo"];			
$venditore = $_SESSION["email"];
$breve_descrizione = $_POST["breve_descrizione"];
$descrizione = $_POST["descrizione"];
$checkInsert = $dbh->insertProduct($idprod, $nome, $prezzo, $venditore, $breve_descrizione, $descrizione);

if($checkInsert){	
	$Message = "Inserimento del prodotto: ".$idprod." eseguita con successo.";
	require("your_product.php");	
}else{
	$ErrorMessage = "INSERIMENTO DEL PRODOTTO FALLITO";
	require("new_product.php");
}
?>