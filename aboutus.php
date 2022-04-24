<?php
    
    $templateParams["title"] = "Contacts";
    $templateParams["main-content"] = "main-aboutus.php";
    $cssArray[0]="./assets/css/aboutus-style.css";
    session_start();
    $_SESSION["redirect"] = "empty";
    require_once("template/base.php");
?>

