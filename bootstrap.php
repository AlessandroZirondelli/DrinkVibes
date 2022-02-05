<?php
//include il file per connessione a DB
//require_once("utils/functions.php");
session_start();

require_once("./assets/db/database.php");
require_once("./utils/functions.php");

define("UPLOAD_DIR", "./upload/");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);


?>