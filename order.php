<?php 
require_once("bootstrap.php");



if($_SESSION["type"] == "cliente"){
    $Categories = ["Home", "Carrello", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Notifiche" => "notifications.php"];
}else{
    $Categories = ["Home", "Notifiche"];
    $CatToLink = ["Home" => "index.php", "Notifiche" => "notifications.php"];		
}
// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
    $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
}

if($_SESSION["nome"]){
    $title = $_SESSION["nome"]." - Ordini";
    if($_SESSION["type"] == "venditore"){
        $ordini = $dbh->getSellerOrder($_SESSION["email"]);
        $AuthForm = "order-form.php";
    }else{
        $ordini = $dbh->getClientOrders($_SESSION["email"]);
        $AuthForm = "order-form-client.php";
    }
}


require("template/home.php");
?>
