<?php 
require_once("bootstrap.php");

$title = "PCHW - Registrazione";
$Categories = ["Home", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Ordini" => "#", "Notifiche" => "notifications.php"];

$cart_product = $dbh->getProductsCart($_SESSION["email"], "cart");


$AuthForm = "cart-form.php";
require("template/home.php");
?>
