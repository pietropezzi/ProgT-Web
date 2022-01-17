<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Prodotti";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php"];

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$prodotti = $dbh->getProductsBySeller($_SESSION["email"]);

$AuthForm = "your_product-form.php";
require("template/home.php");
?>
