<?php
require_once("bootstrap.php");

$nome = $_POST["nome"];
$venditore = $_SESSION["email"];
$prezzo = $_POST["prezzo"];		
$tipo = $_POST["tipo"];	
$quantità = $_POST["quantità"];
$breve_descrizione = $_POST["breve_descrizione"];
$descrizione = $_POST["descrizione"];

// Controllo immagine
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES['immagine_prodotto']['tmp_name']);
if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png') {
	// Tipo file supportato
	$target_file = PROD_IMAGES_DIR.basename($_FILES["immagine_prodotto"]["name"]);
	move_uploaded_file($_FILES["immagine_prodotto"]["tmp_name"], $target_file);
	$checkInsert = $dbh->insertProduct($nome, $venditore, $prezzo, $tipo, $quantità, $breve_descrizione, $descrizione, basename($_FILES["immagine_prodotto"]["name"]));
	if($checkInsert){	
		$Message = "Inserimento del prodotto: ".$nome." eseguita con successo.";
		require("your_product.php");	
	}else{
		$ErrorMessage = "INSERIMENTO DEL PRODOTTO FALLITO";
		require("new_product.php");
	}	
} else {
	//tipo file non supportato
	$ErrorMessage = "FORMATO IMMAGINE NON VALIDO";
	require("new_product.php");
}
?>