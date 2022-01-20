<?php 
require_once("../bootstrap.php");

$nome = $_POST["nome"];
$username = $_POST["username"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];

if(empty($nome) && empty($username) && empty($email) && empty($telefono)){
    $_SESSION["ErrEmpty"] = "Nessun dato da aggiornare inserito.";
    header("Location: ../profile.php");
}else{
    if($dbh->getUser($email)){
        $_SESSION["ErrNewEmail"] = "La nuova mail inserita è gia in utilizzo da un altro utente.";
        header("Location: ../profile.php");
    }else{
        if(!$dbh->updateUserData($_SESSION["email"], $email, $nome, $username, $telefono)){
            $_SESSION["ErrDbDati"] = "Errore durante aggiornamento dei dati.";
            header("Location: ../profile.php");
        }else{
            session_start();
            session_destroy();
            header("Location: ../login.php");
        }
    }
}
?>