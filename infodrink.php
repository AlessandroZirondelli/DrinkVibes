<?php
    require_once("bootstrap.php");
    require_once("./utils/ManagerInfoDrink.php");
    
    $templateParams["title"] = "Info drinks";
    $templateParams["main-content"] = "main-infodrink.php";
    
    $cssArray[0]="./assets/css/infodrink-style.css";
    
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

