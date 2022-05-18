<?php
    require_once("./utils/ManagerOrders.php");
    require_once("bootstrap.php");
    /*require_once("./utils/functions.php");
    
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    */

    $templateParams["title"] = "Home";
    
    // It is used for redirection when I click on Order but I am not logged in
    // Check if the user is logged in or not. If not, then redirect to Orders
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="orders"; //indicates that it should return to the page
        header("location:login.php");
    }
    $templateParams["main-content"] = "main-orders.php";
    $cssArray[0]="./assets/css/orders-style.css";
    $jsArray[0]="./assets/js/sendNotifications.js";
    $jsArray[1]="./assets/js/dropdownStatus.js";
    $manager= new ManagerOrders();
    //$manager->createOrdersByUser($_SESSION["userID"]);
    
    $type=$_SESSION["type"];
    $userID=$_SESSION["userID"];
    

    $manager->createOrdersTab($userID,$type);
    $ordersTab1=$manager->getOrdersTab1();
    $ordersTab2=$manager->getOrdersTab2();

    require_once("template/base.php");
?>

