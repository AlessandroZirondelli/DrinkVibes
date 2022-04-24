<?php
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    //session_start();
    //Serve per evitare che se sono su login non mi reindirizzi a index, se non mi loggo 
    $_SESSION["redirect"] = "empty";
    $templateParams["title"] = "Home";
    $templateParams["main-content"] = "main-index.php";
    $templateParams["aside-content"] = "aside-index.php"; //nome indica il nome del template
    $cssArray[0]="./assets/css/index-style.css";
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

