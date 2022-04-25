<?php
require_once("./../assets/db/database.php");
require_once("./ManagerOrders.php");
session_start();

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

//$userID = $_SESSION["userID"];


$manager = new ManagerOrders();
$manager->insertOrder();



?>