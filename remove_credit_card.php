<?php
require_once("bootstrap.php");

$checkDelete = $dbh->removeCreditCard($_SESSION["email"]);

if($checkDelete){		
	require("profile.php");
}
else{
	$AddCardErr = "INSERIMENTO DELLA CARTA FALLITA";
	require("profile.php");
}
?>