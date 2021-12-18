<?php
require_once("db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "pc_hardware", 3306);
define("IMAGES_DIR", "images/");
?>