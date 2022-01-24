<?php
require_once("bootstrap.php");
$cliente = $_SESSION["email"];
$status = "cart";

$prodotti = $dbh->getProductsCart($cliente, $status);
$data = date('Y-m-d H:i:s');
//controllo che si possa fare l'acquisto
foreach($prodotti as $prod){
    if($prod["quantita"] > $prod["prod_quantita"]){
        header("Location: cart.php");
        die();
    }
}

foreach($prodotti as $prod){
    /*Per ogni prodotto lo mette in acquisto*/
    $checkInsert = $dbh->buyingProduct($prod["id"], $data);
    $checkUpdate = $dbh->updateOrderStatus($prod["id"]);
    /*Ne aggiorna lo status su ordine*/
    $checkUpdateStatus = $dbh->updateOrderStatus($prod["id"]);
     /*Ne scala la quantità disponibile*/
    $result_get = $dbh->getMaxQuantity($prod["nome"], $prod["venditore"]);
    $max_quantity = implode($result_get[0]);
    $new_quantity = $max_quantity - $prod["quantita"];
    $checkUpdateQuantity = $dbh->updateQuantity($prod["nome"], $prod["venditore"], $new_quantity);
    $dbh->notifyVendorBoughtProd($prod["nome"], $prod["venditore"], $data, $prod["quantita"], $cliente);
    if($new_quantity == 0){
        // notifica venditore prodotto esaurito
        $dbh->notifyVendorOutOfStock($prod["nome"], $prod["venditore"], $data);
    }
    if(!$checkInsert){
        $ErrorMessage = "ACQUISTO FALLITO";
        require("cart.php");
}