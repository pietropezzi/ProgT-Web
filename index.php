<?php
require_once("bootstrap.php");

$title = "PCHW - Home";
if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "cart.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Ordini", "Notifiche"];
		$CatToLink = ["Ordini" => "order.php", "Notifiche" => "notifications.php"];
        
	}	
}
 else {
    $Categories = ["Login"];
    $CatToLink = ["Login" => "login.php"];
}

$prodotti = $dbh->getProducts();

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);

    if($_SESSION["type"] == "venditore"){
        $AuthForm = "your_product-form.php";
        $prodotti = $dbh->getProductsBySeller($_SESSION["email"]);
        $title = "PCHW - I Tuoi Prodotti";
    }
}

require("template/home.php");


?> 