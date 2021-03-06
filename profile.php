<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Profilo";
$location = "PROFILO";
if(isset($_SESSION["email"])){
    $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];
		
	if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Ordini", "Notifiche"];
		$CatToLink = ["Home" => "index.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];		
	}	
}

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
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

require("user/user-base.php");
?>
