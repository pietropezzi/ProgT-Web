<?php 
require_once("bootstrap.php");

$nome = $_POST["nome"];
$venditore = $_POST["venditore"];	

$title = $nome." - Dettaglio";
$Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
$CatToLink = ["Home" => "index.php", "Carrello" => "#", "Ordini" => "#", "Notifiche" => "#"];

$AuthForm = "details-form.php";


$result = $dbh->searchProduct($nome, $venditore);
if(empty($result)){
  // Prodotto non trovato
  $ErrorMessage = "ERRORE PRODOTTO NON TROVATO";
  require("index.php");
}
else{
  $nome = $result->nome;
  $venditore = $result->venditore;
  $prezzo = $result->prezzo;
  $tipo = $result->tipo;
  $quantita = $result->quantita;
  $descrizione = $result->descrizione;
   
  require("template/home.php");
}

?>