<?php
require_once("./../assets/db/database.php");

header("location: ./../notifications.php");
$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

$notifType = $_REQUEST["notifType"]; 
$notifID = (int) $_REQUEST["notifID"];

if($notifType=="stateChanged"){
    $dbh->readNotificationStateChangedByUser($notifID);
}

elseif($notifType=="orderReady"){
    $dbh->readNotificationOrderReadyByExpress($notifID);
}

elseif($notifType=="newOrder"){
    $whois = $_REQUEST["whois"];
    if($whois=="User"){
        $dbh->readNotificationNewOrderByUser($notifID);
    }
    elseif($whois=="Admin"){
        $dbh->readNotificationNewOrderByAdmin($notifID);
    }
}

elseif($notifType=="soldout"){
    $dbh->readNotificationSoldOutByAdmin($notifID);
}

?>