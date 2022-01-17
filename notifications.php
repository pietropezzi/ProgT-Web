<?php
include("bootstrap.php");

$title = isset($_SESSION["nome"]) ? $_SESSION["nome"]." - Notifiche" : "No Account - Notifiche";
$location = "NOTIFICHE";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Carrello", "Ordini", "I Tuoi Prodotti"];
		$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php"];		
	}	
}
 else {
    $Categories = ["Home", "Carrello", "Ordini", "Login"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Login" => "login.php"];
}

if(isset($_SESSION["Message"])){
    $Message = $_SESSION["Message"];
    unset($_SESSION["Message"]);
}

$profile_image = "default.png";
if(!isset($_SESSION["email"])){
    $ErrorMessage = "Per visualizzare le notifiche è necessario effettuare il login!";
}else{
    // per ora solo client poi metto distizione fra cliente e venditore
    $notifiche = $dbh->getClientNotifications($_SESSION["email"]);
    if($_SESSION["type"] == "cliente"){
        // info acquisti del cliente, se non ha acquistato niente è vuoto
        $tutti_acquisti = $dbh->getUserPurchases($_SESSION["email"]);
    }else{
        // TODO: venditore
    }
}

require("template/user/user-base.php");
?>