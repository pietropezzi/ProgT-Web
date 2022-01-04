<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Profilo";
$location = "PROFILO";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "#"];		
	}	
}
 else {
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
}

$profile_data = $dbh->getUser($_SESSION["email"]);
$profile_image = "default.png";

require("template/user/user-base.php");
?>
