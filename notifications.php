<?php
include("bootstrap.php");

$title = isset($_SESSION["nome"]) ? $_SESSION["nome"]." - Notifiche" : "No Account - Notifiche";
$location = "NOTIFICHE";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "order.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Ordini", "I Tuoi Prodotti"];
		$CatToLink = ["Home" => "index.php", "Ordini" => "order.php", "I Tuoi Prodotti" => "your_product.php"];		
	}	
}

if(isset($_SESSION["Message"])){
    $Message = $_SESSION["Message"];
    unset($_SESSION["Message"]);
}

if(!isset($_SESSION["email"])){
    $ErrorMessage = "Per visualizzare le notifiche è necessario effettuare il login!";
}else{
    $notifiche = $dbh->getNotifications($_SESSION["email"]);
    if($_SESSION["type"] == "cliente"){
        // info acquisti del cliente, se non ha acquistato niente è vuoto
        $tutti_acquisti = $dbh->getUserPurchases($_SESSION["email"]);
    }
}

require("user/user-base.php");
?>