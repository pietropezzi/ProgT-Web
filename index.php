<?php
require_once("bootstrap.php");

$Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
$CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "auth.php"];

require("template/home.php");
?>