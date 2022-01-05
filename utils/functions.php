<?php 

function registerLoggedUser($nome, $username, $email, $type){
    $_SESSION["nome"] = $nome;
    $_SESSION["username"] = $username;
	$_SESSION["email"] = $email;
    $_SESSION["type"] = $type;
}


?>