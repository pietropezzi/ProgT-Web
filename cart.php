<?php 
require_once("bootstrap.php");

$title = "PCHW - Registrazione";
$Categories = ["Home", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "cart-form.php";
require("template/home.php");
?>
