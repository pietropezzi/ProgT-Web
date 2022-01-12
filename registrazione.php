<?php
require_once("bootstrap.php");
$email = $_POST["email"];
$name = $_POST["name"];
$username = $_POST["username"];			
$password = $_POST["password"];	
$type = $_POST["type"];
$phone = $_POST["phone"];
$checkInsert = $dbh->insertUser($email, $name, $username, $password, $type, $phone);

if($checkInsert){
	$dbh->insertNotificationNewUser($email, $type);
	registerLoggedUser($name, $username, $email, $type);
	$Message = "Registrazione per: ".$username." eseguita con successo.";
	require("index.php");	
}else{
	$ErrorMessage = "REGISTRAZIONE FALLITA";
	require("auth.php");
}
?>