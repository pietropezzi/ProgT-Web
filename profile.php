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

if(isset($_GET["Message"])){
    $Message = $_GET["Message"];
}
if(isset($_GET["ErrPass"])){
    $AggPassErr = "La vecchia password inserita non è corretta.";
}
if(isset($_GET["ErrDb"])){
    $AggPassErr = "Errore aggiornamento della password.";
}

$profile_data = $dbh->getUser($_SESSION["email"]);
$profile_image = "default.png";

require("template/user/user-base.php");
?>
