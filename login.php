<?php 
require_once("bootstrap.php");

$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];

$LoginForm = "login-form.php";
require("template/home.php");
?>
