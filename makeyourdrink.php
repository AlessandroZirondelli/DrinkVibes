<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    $templateParams["title"] = "Make your drink";
    $templateParams["main-content"] = "main-makeyourdrink.php";
    $cssArray[0]="./assets/css/makeyourdrink-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $jsArray[1]="./assets/js/sendNotifications.js";
    $jsArray[2]="./assets/js/tablemakeyourdrinks.js";
    $mngIngredients = new ManagerIngredients();
    $_SESSION["shopping_cart_hmd"] = array();
    $_SESSION["shopping_cart_temp"] = serialize(new HandMadeDrink());

    $templateParams["categories"] = ["Alcohol", "Beverages","Decoration"];
  
    $templateParams["Alcohol"] = $mngIngredients -> getAlcoholIngredient();
    $templateParams["Beverages"] = $mngIngredients -> getBeveragesIngredients();
    $templateParams["Decoration"] = $mngIngredients -> getDecorationIngredients();
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>

