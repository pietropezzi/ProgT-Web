<?php
require_once("bootstrap.php");

$venditore = $_POST["venditore"];		
$quantita = $_POST["quantita"];	
$nome = $_POST["nome"];
$cliente = $_SESSION["email"];	

$checkInsert = $dbh->updateCartQuantity($nome, $venditore, $quantita, $cliente);

    if($checkInsert){         
        require("cart.php");
        
    }else{
        $ErrorMessage = "AGGIORNAMENTO FALLITO";
        require("cart.php");
    }
?>