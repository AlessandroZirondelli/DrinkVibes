<?php
//include il file per connessione a DB
//require_once("utils/functions.php");
require_once("./assets/db/database.php");

session_start();
define("UPLOAD_DIR", "./upload/");

require_once("assets/db/database.php");
$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);


?>