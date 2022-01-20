<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Ordini";

if($_SESSION["type"] == "cliente"){
    $Categories = ["Home", "Carrello", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Notifiche" => "notifications.php"];
}else{
    $Categories = ["Home", "Ordini", "I Tuoi Prodotti", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Ordini" => "order.php", "I Tuoi Prodotti" => "your_product.php", "Notifiche" => "notifications.php"];		
}
// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$ordini = $dbh->getSellerOrder($_SESSION["email"]);

$AuthForm = "order-form.php";
require("template/home.php");
?>
