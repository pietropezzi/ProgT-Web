<?php 
require_once("bootstrap.php");

$title = $_SESSION["nome"]." - Prodotti";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "your_product-form.php";
require("template/home.php");
?>
