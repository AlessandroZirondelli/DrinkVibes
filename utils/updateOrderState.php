<?php 
require_once("./../assets/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);
$id = $_REQUEST["id"];
$state = $_REQUEST["state"];
$arrayOfReplacements = array('+' => ' ');
$cleanState = strtr($state, $arrayOfReplacements);
$dbh->insertOrderState($cleanState,$id);// bisogna passare il nuovo stato e l'id dell'ordine 

?>