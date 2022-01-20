<?php
require_once("bootstrap.php");

$title = "PCHW - Home";
if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "cart.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Carrello" => "cart.php", "Ordini" => "order.php", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "notifications.php"];		
	}	
}
 else {
    $Categories = ["Login"];
    $CatToLink = ["Login" => "login.php"];
}

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$prodotti = $dbh->getProducts();

require("template/home.php");
?> 