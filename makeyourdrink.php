<?php

    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    $templateParams["title"] = "Make your drink";
    $templateParams["main-content"] = "main-makeyourdrink.php";
    $templateParams["aside-content"] = "aside-index.php"; //nome indica il nome del template
    $cssArray[0]="./assets/css/index-style.css";
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

