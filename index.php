<?php
require("bootstrap.php");

$Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
$CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "template/registrazione.html"];

require("template/home.php");
?>