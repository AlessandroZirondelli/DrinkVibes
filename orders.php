<?php
    /*questo file di boostrap si occupa do sistmare la connesione al database  */
    require_once("./utils/ManagerOrders.php");
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    $templateParams["title"] = "Home";
    $templateParams["main-content"] = "main-orders.php";
    $cssArray[0]="./assets/css/orders-style.css";
    $jsArray[0]="./assets/js/dropdownStatus.js";
    $manager= new ManagerOrders();
    $manager->createOrdersByUser("Nick987");
    $orders= $manager->getAllOrders();
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php
?>

