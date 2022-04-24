<?php
    require_once("./utils/ManagerOrders.php");
    require_once("bootstrap.php");
    /*require_once("./utils/functions.php");
    
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    */

    $templateParams["title"] = "Home";
    //Serve per reindirizzamento nel momento in cui clicco su Order ma non sono loggato
    // Controllo se l'utente è loggato o meno. Se non lo è , allora reindirizzo a Orders
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="orders"; //indica che deve ritornare sulla pag
        header("location:login.php");
    }
    $templateParams["main-content"] = "main-orders.php";
    $cssArray[0]="./assets/css/orders-style.css";
    $jsArray[0]="./assets/js/sendNotifications.js";
    $jsArray[1]="./assets/js/dropdownStatus.js";
    $manager= new ManagerOrders();
    //$manager->createOrdersByUser($_SESSION["userID"]);
/*
    $type="Admin";
    $userID="Admin12";*/
    
    $type=$_SESSION["type"];
    $userID=$_SESSION["userID"];
    

    $manager->createOrdersTab($userID,$type);
    $ordersTab1=$manager->getOrdersTab1();
    $ordersTab2=$manager->getOrdersTab2();

    require_once("template/base.php");
?>

