<?php
require_once("./../assets/db/database.php");

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

$notifType= $_REQUEST["notifType"]; 



if($notifType=="stateChanged"){ 
    $orderRef=$_REQUEST["orderRef"]; 
    $userRef = $dbh->getUserIDByOrderID($orderRef);
    $changedState = $dbh->getStateByOrderID($orderRef);

    $dbh->insertNotifOrderState($orderRef,$userRef,$changedState);

}
elseif($notifType=="orderReady"){
    $orderRef=$_REQUEST["orderRef"];
    $dbh->insertNotifOrderReady($orderRef,"Express"); // User taht must read notification is Express
}
elseif($notifType=="newOrder"){
    $orderRef=$_REQUEST["orderRef"];
    $description=$_REQUEST["description"];
    //$userRef =$_SESSIONE[""] 
    $userRef="Nick987";
    $dbh->insertNotifNewOrder($orderRef,$userRef,$description); 
}
elseif($notifType=="soldout"){
    $articleIDRef=$_REQUEST["articleIDRef"];
    $articleNameRef=$_REQUEST["articleNameRef"];
    $dbh->insertiNotifSoldout($articleIDRef,$articleNameRef);
}




?>