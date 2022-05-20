<?php
    //require_once("./utils/ManagerOrders.php");
    require_once("bootstrap.php");
    require_once("./utils/ManagerInfoDrink.php");
    /*require_once("./utils/functions.php");
    
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    */
    
    $templateParams["title"] = "Info drinks";
    $templateParams["main-content"] = "main-infodrink.php";
    
    $articID = $_REQUEST["articID"];
    $orderID = $_REQUEST["orderID"];

    if(!isset($orderID)&&!isset($articID)){
        header("location: errors.php");
    }

    $manager = new ManagerInfoDrink();
    $manager->createIngredientsOfDrink($articID);

    $ingredients = $manager->getAllIngredients();

    require_once("template/base.php");
?>

