<?php 
require_once("bootstrap.php");

$title = "PCWH - Login";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php"];

$AuthForm = "login-form.php";
require("template/home.php");
?>