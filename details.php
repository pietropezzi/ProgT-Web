<?php 
require_once("bootstrap.php");

$nome = $_POST["nome"];
$venditore = $_POST["venditore"];	

$title = $nome." - Dettaglio";

if(isset($_SESSION["email"])){
  $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
  $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "#"];
}

else {
  $Categories = ["Carrello", "Ordini", "Notifiche", "Login"];
  $CatToLink = ["Carrello" => "cart.php", "Ordini" => "#", "Notifiche" => "notifications.php", "Login" => "login.php"];
}

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