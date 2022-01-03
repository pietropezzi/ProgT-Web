<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Profilo";
$location = "PROFILO";
if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Carrello" => "#", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "#"];		
	}	
}
 else {
    $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
}

$profile_data = $dbh->getUser($_SESSION["email"]);
$profile_image = "default.png";

require("template/user/user-base.php");
?>
