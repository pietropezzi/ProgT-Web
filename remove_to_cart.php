<?php
require_once("bootstrap.php");

$cliente = $_SESSION["email"];
$venditore = $_POST["venditore"];
$nome = $_POST["nome"];	
$status = "cart";

$checkInsert = $dbh->removeToCart($cliente, $venditore, $nome, $status);

if($checkInsert){		
    require("cart.php");	
    
}else{
	$ErrorMessage = "RIMOZIONE DEL PRODOTTO FALLITA";
	require("cart.php");
}
?>