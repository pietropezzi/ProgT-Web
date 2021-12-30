<?php 
require_once("bootstrap.php");

$title = "PCHW / Registrazione";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "register-form.php";
require("template/home.php");
?>
