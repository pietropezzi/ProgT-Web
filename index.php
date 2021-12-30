<?php
require_once("bootstrap.php");

if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Carrello", "Ordini", "Prodotti", "Notifiche"];
		$CatToLink = ["Carrello" => "#", "Ordini" => "#", "Prodotti" => "#", "Notifiche" => "#"];
		
	}
	
}
 else {
    $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
}

$prodotti = $dbh->getProducts();

require("template/home.php");
?> 