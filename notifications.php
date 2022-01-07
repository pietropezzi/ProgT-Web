<?php
include("bootstrap.php");


$title = isset($_SESSION["nome"]) ? $_SESSION["nome"]." - Notifiche" : "No Account - Notifiche";
$location = "NOTIFICHE";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "#"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "#"];		
	}	
}
 else {
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
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
}
require("template/user/user-base.php");
?>