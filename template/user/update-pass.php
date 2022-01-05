<?php 
require_once("../../bootstrap.php");

$ins_oldpass = $_POST["oldpass"];
$ins_newpass = $_POST["newpass"];

$oldpass = $dbh->getUserPassword($_SESSION["email"]); 

if($oldpass->password != $ins_oldpass){
    $_SESSION["ErrPass"] = "La password inserita non è corretta.";
}else{
    if($dbh->updateUserPassword($_SESSION["email"], $ins_newpass) == false){
        $_SESSION["ErrDb"] = "Errore durante aggiornamento password.";
    }else{
        $_SESSION["Message"] = "Password aggiornata con successo.";
    }
}

header("Location: ../../profile.php");
?>