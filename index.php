<?php
require_once("bootstrap.php");

if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];
	
	$type_result = $dbh->getType($_SESSION["email"]);
	$type = implode($type_result[0]);
	
	if($type == "venditore"){
		$Categories = ["Carrello", "Ordini", "Prodotti", "Notifiche"];
		$CatToLink = ["Carrello" => "#", "Ordini" => "#", "Prodotti" => "#", "Notifiche" => "#"];
		
	}
	
}
 else {
    $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
}

require("template/home.php");
?> 