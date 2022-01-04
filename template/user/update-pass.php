<?php 
require_once("../../bootstrap.php");

$ins_oldpass = $_POST["oldpass"];
$ins_newpass = $_POST["newpass"];

$oldpass = $dbh->getUserPassword($_SESSION["email"]); 


if($oldpass->password != $ins_oldpass){
    header("Location: ../../profile.php?ErrPass=err");
}else{
    if($dbh->updateUserPassword($_SESSION["email"], $ins_newpass) == false){
        header("Location: ../../profile.php?ErrDb=err");
    }else{
        header("Location: ../../profile.php?Message=Password aggiornata con successo.");
    }
}
?>