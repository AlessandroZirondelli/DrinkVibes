<?php
require_once("./../assets/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

$notifType= $_REQUEST["notifType"]; 
//$notifType="stateChanged";
/* 
    notifType=stateChanged; //questa è la notifica relativa al cambio di stato 
    notifType=orderReady; //questa è la notifica relativa ad un nuovo ordine prondo per spedire
    notifType=newOrder; //questa è la notificarelativa ad un nuovo ordine effettuato
*/


if($notifType=="stateChanged"){ //se è una notifica di cambio di stato
    $orderRef=$_REQUEST["orderRef"]; //prendo il riferimento all'ordine
    $userRef = $dbh->getUserIDByOrderID($orderRef);
    $changedState = $dbh->getStateByOrderID($orderRef);

    $dbh->insertNotifOrderState($orderRef,$userRef,$changedState);

    //Lo stato dell'ordine numero 5362762 è in stato : Ready to prepare "

    //Quando vado a scaricare i dati per far vedere le notofioche:
    //faccio il filtro delle notifiche con forWho:User con specifico userRef
}
elseif($notifType=="orderReady"){
    $orderRef=$_REQUEST["orderRef"];
    $userRef = $dbh->getUserIDByOrderID($orderRef);
}

/*$id = $_REQUEST["id"];
$state = $_REQUEST["state"];
*/




?>