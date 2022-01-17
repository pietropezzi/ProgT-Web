<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Profilo";
$location = "PROFILO";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Carrello", "Ordini", "I Tuoi Prodotti", "Notifiche"];
		$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "notifications.php"];		
	}	
}
 else {
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php", "Login" => "login.php"];
}

if(isset($_SESSION["Message"])){
    $Message = $_SESSION["Message"];
    unset($_SESSION["Message"]);
}
if(isset($_SESSION["ErrPass"])){
    $AggPassErr = $_SESSION["ErrPass"];
    unset($_SESSION["ErrPass"]);
}
if(isset($_SESSION["ErrDb"])){
    $AggPassErr = $_SESSION["ErrDb"];
    unset($_SESSION["ErrDb"]);
}
if(isset($_SESSION["ErrEmpty"])){
    $AggDataErr = $_SESSION["ErrEmpty"];
    unset($_SESSION["ErrEmpty"]);
}
if(isset($_SESSION["ErrNewEmail"])){
    $AggDataErr = $_SESSION["ErrNewEmail"];
    unset($_SESSION["ErrNewEmail"]);
}
if(isset($_SESSION["ErrDbDati"])){
    $AggDataErr = $_SESSION["ErrDbDati"];
    unset($_SESSION["ErrDbDati"]);
}

$profile_data = $dbh->getUser($_SESSION["email"]);
$profile_image = "default.png";

require("template/user/user-base.php");
?>
