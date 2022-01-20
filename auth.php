<?php 
require_once("bootstrap.php");

$title = "PCHW - Registrazione";
$Categories = ["Home", "Login"];
$CatToLink = ["Home" => "index.php", "Login" => "login.php"];

$AuthForm = "register-form.php";
require("template/home.php");
?>
