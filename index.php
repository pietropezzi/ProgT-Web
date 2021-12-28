<?php
require_once("bootstrap.php");

$Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
$CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];

require("template/home.php");
?>