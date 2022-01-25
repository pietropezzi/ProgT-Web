<?php
require_once("bootstrap.php");

$email = $_POST["email"];		
$password = $_POST["password"];

$login_result = $dbh->getUser($email);

if(!empty($login_result)){
  $password_hash = $login_result->password;
  if(password_verify($password, $password_hash)){
    $name = $login_result->name;
    $username = $login_result->username;
    $type = $login_result->type;
    registerLoggedUser($name, $username, $email , $type);
    $Message = "Login per: ".$username." eseguita con successo.";
    require("index.php");  
  }else{
  //Login fallito
  $ErrorMessage = "LOGIN FALLITO";
  require("login.php");
  }
} else{
  //Login fallito
  $ErrorMessage = "LOGIN FALLITO";
  require("login.php");
}
?>
