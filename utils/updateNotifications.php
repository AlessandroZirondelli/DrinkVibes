<?php
require_once("./../assets/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

$notifType = $_REQUEST["notifType"]; 
$notifID = $_REQUEST["notifID"];





?>