<?php
require_once("bootstrap.php");

$email = $_POST["email"];		
$password = $_POST["password"];	

$login_result = $dbh->loginCheck($email, $password);
if(empty($login_result)){
  //Login fallito
  $ErrorMessage = "LOGIN FALLITO";
  require("login.php");
}
else{
  $name = $login_result->name;
  $username = $login_result->username;
  $type = $login_result->type;
  registerLoggedUser($name, $username, $email , $type);
  $Message = "Login per: ".$username." eseguita con successo.";
  require("index.php");
}
?>