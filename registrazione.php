<?php
require_once("bootstrap.php");

$email = $_POST["email"];
$name = $_POST["name"];
$username = $_POST["username"];			
$password = $_POST["password"];	
$phone = $_POST["phone"];

$checkInsert = $dbh->insertUser($email, $name, $username, $password, $phone);
if($checkInsert){
	registerLoggedUser($name, $email);
	header("Location: index.php");
}else{
	$ErrorMessage = "REGISTRAZIONE FALLITA";
	require("auth.php");
}
?>
