<?php
require_once("bootstrap.php");

$data = $_POST["data"];
$id = $_POST["id"];
$status = $_POST["status"];
$current_date = date("Y-m-d H:i");

$checkInsert = $dbh->updateBuyingStatus($data, $id, $status, $current_date);

if($checkInsert){
    require("order.php");
}else{
    $ErrorMessage = "AGGIORNAMENTO FALLITO";
    require("order.php");
}
?>