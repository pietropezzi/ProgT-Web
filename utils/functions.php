<?php 

function registerLoggedUser($nome, $email){
    $_SESSION["nome"] = $nome;
    $_SESSION["email"] = $email;
}

?>