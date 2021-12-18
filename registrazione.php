<?php
require_once("bootstrap.php");

$email = $_POST["email"];
$name = $_POST["name"];
$username = $_POST["username"];			
$password = $_POST["password"];	
$phone = $_POST["phone"];

$dbh->insertUser($email, $name, $username, $password, $phone);
?>
