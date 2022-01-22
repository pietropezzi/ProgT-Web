<?php 
require_once("bootstrap.php");

$nome = $_POST["nome"];
$venditore = $_POST["venditore"];	

$title = $nome." - Dettaglio";

if(isset($_SESSION["email"])){
  $Categories = ["Home", "Carrello", "Ordini", "Notifiche"];
  $CatToLink = ["Home" => "index.php", "Carrello" => "cart.php", "Ordini" => "order.php", "Notifiche" => "#"];

  if($_SESSION["type"] == "venditore"){
		$Categories = ["Home", "Ordini", "Notifiche"];
		$CatToLink = ["Home" => "index.php", "Ordini" => "order.php", "Notifiche" => "notifications.php"];		
	}
}

else {
  $Categories = ["Home","Login"];
  $CatToLink = ["Home" => "index.php", "Login" => "login.php"];
}

// Quantità nuove notifiche in sidebar
if(isset($_SESSION["email"])){
  $new_not = $dbh->getNewNotificationsAmount($_SESSION["email"]);
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
  $immagine = $result->immagine;
   
  require("template/home.php");
}

?>