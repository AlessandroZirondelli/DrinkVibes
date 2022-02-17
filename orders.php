<?php
    require_once("./utils/ManagerOrders.php");
    require_once("bootstrap.php");
    /*require_once("./utils/functions.php");
    
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    */

    $templateParams["title"] = "Home";
    $templateParams["main-content"] = "main-orders.php";
    $cssArray[0]="./assets/css/orders-style.css";
    $jsArray[0]="./assets/js/sendNotifications.js";
    $jsArray[1]="./assets/js/dropdownStatus.js";
    $manager= new ManagerOrders();
    //$manager->createOrdersByUser($_SESSION["userID"]);

    $type="Admin";
    $userID="Admin12";//$userID = $_SESSION["user"];

    $manager->createOrdersTab($userID,$type);
    $ordersTab1=$manager->getOrdersTab1();
    $ordersTab2=$manager->getOrdersTab2();

    require_once("template/base.php");
?>

