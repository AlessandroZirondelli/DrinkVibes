<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    $templateParams["title"] = "Make your drink";
    $templateParams["main-content"] = "main-makeyourdrink.php";
    $cssArray[0]="./assets/css/makeyourdrink-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $jsArray[1]="./assets/js/sendNotifications.js";
    $jsArray[2]="./assets/js/tablemakeyourdrinks.js";
    $mngIngredients = new ManagerIngredients();
    $_SESSION["shopping_cart_hmd"] = array();
    $_SESSION["shopping_cart_temp"] = serialize(new HandMadeDrink());
    /*$ing = new Ingredient("","","","","","","");
    $ing = $mngIngredients -> getIngredientById(1);
    
    $ing1 = new Ingredient($ing[0]["ingredientID"],$ing[0]["name"],$ing[0]["qtystock"],$ing[0]["price"],$ing[0]["description"],$ing[0]["typology"],$ing[0]["category"]);
    $ing2 = new Ingredient(2,$ing[0]["name"],400,$ing[0]["price"],$ing[0]["description"],$ing[0]["typology"],$ing[0]["category"]);
    $handMadeDrink1 = new HandMadeDrink();
    $handMadeDrink1 -> addIngredient($ing1);
    $isEqual = true;
    $handMadeDrink = new HandMadeDrink();
    $handMadeDrink -> addIngredient($ing2);
    $hdm = array();
    array_push($hdm, array($handMadeDrink1,4));
    var_dump($hdm[0][0]);
    foreach($handMadeDrink -> getIngredient() as $ingr){
        if(!$hdm[0][0] -> isEqualIngredient($ingr)){
            $isEqual = false;
        }
    }
    var_dump($isEqual);*/
    $templateParams["categories"] = ["Alcohol", "Beverages","Decoration"];
    
    $templateParams["Alcohol"] = $mngIngredients -> getAlcoholIngredient();
    $templateParams["Beverages"] = $mngIngredients -> getBeveragesIngredients();
    $templateParams["Decoration"] = $mngIngredients -> getDecorationIngredients();
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>

