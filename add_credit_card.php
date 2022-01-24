<?php
require_once("bootstrap.php");

$email = $_SESSION["email"];
$numero = $_POST["numero"];
$scadenzaMese = $_POST["scadenzaMese"];	
$scadenzaAnno = $_POST["scadenzaAnno"];
$cvv2 = $_POST["cvv2"];

$cvv2_hash = password_hash($cvv2, PASSWORD_BCRYPT);

$checkInsert = $dbh->addCreditCard($email, $numero, $scadenzaMese, $scadenzaAnno, $cvv2_hash);

if($checkInsert){		
	require("profile.php");
}
else{
	$AddCardErr = "INSERIMENTO DELLA CARTA FALLITA";
	require("profile.php");
}
?>