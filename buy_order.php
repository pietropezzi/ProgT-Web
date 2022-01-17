<?php
require_once("bootstrap.php");

$cliente = $_SESSION["email"];
$status = "cart";

$prodotti = $dbh->getProductsCart($cliente, $status);

foreach($prodotti as $prod): 
    /*Per ogni prodotto lo mette in acquisto*/
    $checkInsert = $dbh->buyingProdoct($prod["id"]);
    /*Ne aggiorna lo status su ordine*/
    $checkUpdateStatus = $dbh->updateOrderStatus($prod["id"]);
     /*Ne scala la quantità disponibile*/
    $result_get = $dbh->getMaxQuantity($prod["nome"], $prod["venditore"]);
    $max_quantity = implode($result_get[0]);
    $new_quantity = $max_quantity - $prod["quantita"];

    $checkUpdateQuantity = $dbh->updateQuantity($prod["nome"], $prod["venditore"], $new_quantity);
    

    if(!$checkInsert){
        $ErrorMessage = "ACQUISTO FALLITO";
        require("cart.php");
    }

endforeach;

require("index.php");

?>
