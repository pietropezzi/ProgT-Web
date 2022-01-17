<?php
require_once("bootstrap.php");

$title = "PCHW - Home";
if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Carrello" => "cart.php", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "notifications.php"];		
	}	
}
 else {
    $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php", "Login" => "login.php"];
}

$prodotti = $dbh->getProducts();

require("template/home.php");
?> 