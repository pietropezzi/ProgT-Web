<?php
require_once("bootstrap.php");

$venditore = $_POST["venditore"];		
$quantita = $_POST["quantita"];	
$nome = $_POST["nome"];	

$checkInsert = $dbh->updateQuantity($nome, $venditore, $quantita);
    if($checkInsert){        
        $Message = "Aggiornata la quantità di ".$nome." con successo.";
        require("your_product.php");
    }else{
        $ErrorMessage = "AGGIORNAMENTO FALLITO";
        require("your_product.php");
    }
?>