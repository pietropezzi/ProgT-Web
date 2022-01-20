<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Aggiungi";
$Categories = ["Home", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

$AuthForm = "new_product-form.php";
require("template/home.php");
?>
