<?php
session_start();
require_once("db/database.php");
require_once("utils/functions.php");
$dbh = new DatabaseHelper("localhost", "root", "", "pc_hardware", 3306);
define("IMAGES_DIR", "images/");
define("PROD_IMAGES_DIR", "images/products/");
?>