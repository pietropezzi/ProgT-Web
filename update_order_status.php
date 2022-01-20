<?php
require_once("bootstrap.php");

$data = $_POST["data"];
$id = $_POST["id"];
$status = $_POST["status"];

$checkInsert = $dbh->updateBuyingStatus($data, $id, $status);

if($checkInsert){
    require("order.php");
}else{
    $ErrorMessage = "AGGIORNAMENTO FALLITO";
    require("order.php");
}
?>