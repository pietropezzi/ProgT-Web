<?php
require_once("bootstrap.php");
$email = $_POST["email"];
$name = $_POST["name"];
$username = $_POST["username"];			
$password = $_POST["password"];	
$type = $_POST["type"];
$phone = $_POST["phone"];

$password_hash = password_hash($password, PASSWORD_BCRYPT);

$checkInsert = $dbh->insertUser($email, $name, $username, $password_hash, $type, $phone);

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