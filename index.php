<?php
    require_once("bootstrap.php"); 
    //session_start();

    // It is to avoid that if I am on login it does not redirect me to index, if I do not log in
    $_SESSION["redirect"] = "empty";
    $templateParams["title"] = "Home";
    $templateParams["main-content"] = "main-index.php";
    $templateParams["aside-content"] = "aside-index.php"; 
    $cssArray[0]="./assets/css/index-style.css";
    
    require_once("template/base.php");
?>

