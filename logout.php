<?php
session_start();
session_destroy();
$Message = "Logout eseguito.";
require("index.php");
?>