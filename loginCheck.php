<?php
require_once("bootstrap.php");

$email = $_POST["email"];		
$password = $_POST["password"];	

$login_result = $dbh->loginCheck($email, $password);
if(count($login_result)== 0){
        //Login fallito
        $ErrorMessage = "LOGIN FALLITO";
		require("login.php");
    }
    else{
		$name = implode($login_result[0]);
        registerLoggedUser($name, $email);
    $Message = "Login eseguito con successo!";
		require("index.php");
    }
?>
