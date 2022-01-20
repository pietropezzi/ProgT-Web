<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Ordini";
$Categories = ["Home", "Carrello", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Notifiche" => "notifications.php"];

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$ordini = $dbh->getSellerOrder($_SESSION["email"]);


$AuthForm = "order-form.php";
require("template/home.php");
?>
