<?php 
require_once("../bootstrap.php");

$ins_oldpass = $_POST["oldpass"];
$ins_newpass = $_POST["newpass"];

$ins_newpass_hash = password_hash($ins_newpass, PASSWORD_BCRYPT);


$oldpass = $dbh->getUserPassword($_SESSION["email"]); 

if(!password_verify($ins_oldpass, $oldpass->password)){
    $_SESSION["ErrPass"] = "La password inserita non è corretta.";
}else{
    if($dbh->updateUserPassword($_SESSION["email"], $ins_newpass_hash) == false){
        $_SESSION["ErrDb"] = "Errore durante aggiornamento password.";
    }else{
        $_SESSION["Message"] = "Password aggiornata con successo.";
    }
}

header("Location: ../profile.php");
?>