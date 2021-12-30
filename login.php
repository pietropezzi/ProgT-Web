<?php 
require_once("bootstrap.php");

$title = "PCWH - Login";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "login-form.php";
require("template/home.php");
?>