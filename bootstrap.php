<?php

require_once("utils/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/assets/db/database.php");
session_start();
define("UPLOAD_DIR", "../upload/");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);


?>