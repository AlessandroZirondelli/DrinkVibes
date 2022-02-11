<?php
    /*questo file di boostrap si occupa do sistmare la connesione al database  */
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("./utils/ManagerNotifications.php");
    $templateParams["title"] = "Notifications";
    $templateParams["main-content"] = "main-notifications.php";
    $cssArray[0]="./assets/css/notifications-style.css";
    
    $manager=new ManagerNotifications();
    $type="Admin";
    $userID="Admin12";//$userID = $_SESSION["user"];

    $manager->createNotifications($type,$userID);
    $notificationsTypeOne=$manager->getNotificationsTypeOne();
    $notificationsTypeTwo=$manager->getNotificationsTypeTwo();
    
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

