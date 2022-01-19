<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Carrello";
$Categories = ["Home", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Ordini" => "#", "Notifiche" => "notifications.php"];

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$cart_product = $dbh->getProductsCart($_SESSION["email"], "cart");


$AuthForm = "cart-form.php";
require("template/home.php");
?>
