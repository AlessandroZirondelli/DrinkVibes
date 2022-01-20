<?php
    /*questo file di boostrap si occupa do sistmare la connesione al database  */
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    $templateParams["title"] = "Home";
    $templateParams["main-content"] = "main-orders.php";
    $cssArray[0]="./assets/css/orders-style.css";
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

