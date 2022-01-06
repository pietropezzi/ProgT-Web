<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Aggiungi";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "new_product-form.php";
require("template/home.php");
?>
