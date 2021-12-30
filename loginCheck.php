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
		$name = $login_result[0]["name"];
		$username = $login_result[0]["username"];
		$type = $login_result[0]["type"];
        registerLoggedUser($name, $username, $email , $type);
		$Message = "Login per: ".$username." eseguita con successo.";
		require("index.php");
    }
?>
