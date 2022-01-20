<?php

    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    $templateParams["title"] = "Make your drink";
    $templateParams["main-content"] = "main-makeyourdrink.php";
    $cssArray[0]="./assets/css/makeyourdrink-style.css";
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

