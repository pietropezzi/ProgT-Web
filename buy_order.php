<?php
require_once("bootstrap.php");

$cliente = $_SESSION["email"];
$status = "cart";

$prodotti = $dbh->getProductsCart($cliente, $status);

foreach($prodotti as $prod): 
    $checkInsert = $dbh->buyingProdoct($prod["id"]);
    $checkUpdate = $dbh->updateOrderStatus($prod["id"]);

    if(!$checkInsert){
        $ErrorMessage = "ACQUISTO FALLITO";
        require("cart.php");
    }

endforeach;

require("index.php");

?>
