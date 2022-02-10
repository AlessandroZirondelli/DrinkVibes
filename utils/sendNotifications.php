<?php
require_once("./../assets/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

$notifType= $_REQUEST["notifType"]; 
/* 
    notifType=stateChanged; //questa è la notifica relativa al cambio di stato 
    notifType=orderReady; //questa è la notifica relativa ad un nuovo ordine prondo per spedire
    notifType=newOrder; //questa è la notificarelativa ad un nuovo ordine effettuato
*/


/*$id = $_REQUEST["id"];
$state = $_REQUEST["state"];
*/




?>