<?php
    /*questo file di boostrap si occupa do sistmare la connesione al database  */
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    
    $templateParams["title"] = "Notifications";
    $templateParams["main-content"] = "main-notifications.php";
    $cssArray[0]="./assets/css/notifications-style.css";
    //$jsArray[0]="./assets/js/dropdownStatus.js";

    $type="Admin";
    $userID="Admin12";//$userID = $_SESSION["user"];
    
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

