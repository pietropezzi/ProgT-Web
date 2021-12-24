<?php
require_once("bootstrap.php");

if(isset($_SESSION["email"])){
    $Categories = ["Carrello", "Ordini", "Notifiche"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];
} else {
    $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
    $CatToLink = ["Carrello" => "#", "Ordini" => "#", "Notifiche" => "#", "Login" => "login.php"];
}

require("template/home.php");
?>