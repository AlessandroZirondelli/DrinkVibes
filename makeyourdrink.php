<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");

    // It is to avoid that if I am logged in, I don't redirect me to makeyourdrink, if I am not logged in
    $_SESSION["redirect"] = "empty";
    $templateParams["title"] = "Make your drink";

    if(isset($_SESSION["type"]) && $_SESSION["type"] == "Admin") { 
        $templateParams["main-content"] = "main-makeyourdrink-admin.php";
        $cssArray[0]="./assets/css/makeyourdrinkadmin-style.css";
        $jsArray[0]="./assets/js/notifications/sendNotifications.js";
        $jsArray[1]="./assets/js/makeyourdrink/makeyourdrinkadmin.js";
    }else{
        $templateParams["main-content"] = "main-makeyourdrink.php";
        $cssArray[0]="./assets/css/makeyourdrink-style.css";
        $jsArray[0]="./assets/js/notifications/sendNotifications.js";
        $jsArray[1]="./assets/js/makeyourdrink/tablemakeyourdrinks.js";
    }

    if(!isset( $_SESSION["shopping_cart_hmd"])) {
        $_SESSION["shopping_cart_hmd"] =  serialize(array());
    }
    if(!isset( $_SESSION["shopping_cart_prod"])) {
        $_SESSION["shopping_cart_prod"] = serialize(array());
    }

    
  
    
    $mngIngredients = new ManagerIngredients();
    // $_SESSION["shopping_cart_hmd"] = serialize(array());
    $_SESSION["shopping_cart_temp"] = serialize(new HandMadeDrink());
   
    $prova =array(new HandMadeDrink());
    $_SESSION["prova"]= serialize($prova);

    $templateParams["categories"] = ["Alcohol", "Beverages","Decoration"];
    
    $templateParams["Alcohol"] = $mngIngredients -> getAlcoholIngredient();
    $templateParams["Beverages"] = $mngIngredients -> getBeveragesIngredients();
    $templateParams["Decoration"] = $mngIngredients -> getDecorationIngredients();
    require_once("template/base.php"); 
?>

