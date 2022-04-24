<?php
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    require_once("utils/Product.php");
    $_SESSION["redirect"] = "empty";
    $templateParams["title"] = "Shopping cart";
    $templateParams["main-content"] = "main-shoppingcart.php";
    $cssArray[0]="./assets/css/shoppingcart-style.css";
  
    $jsArray[0]="./assets/js/shoppingcart.js";
    $jsArray[1]="./assets/js/sendNotifications.js";
    $templateParams["hmd"] = array();
    $templateParams["prod"] = array();
   
   // $templateParams["prod"] = array(array(new Product(1,"vodka",4,5,"aaff","Wine") ,4));
   $_SESSION["shopping_cart_prod"]= serialize(array(array(new Product(1,"vodka",4,5,"aaff","Wine") ,4)));

    if(isset( $_SESSION["shopping_cart_hmd"]) && !empty( $_SESSION["shopping_cart_hmd"])) {
        $templateParams["hmd"] = unserialize( $_SESSION["shopping_cart_hmd"]);
    }
    
    if(isset( $_SESSION["shopping_cart_prod"]) && !empty( $_SESSION["shopping_cart_prod"])) {
        $templateParams["prod"] = unserialize( $_SESSION["shopping_cart_prod"]);
    }
    //$templateParams["prod"] = array(array(new Product(1,"vodka",4,5,"aaff","Wine") ,4));

   // $templateParams["product"] = unserialize( $_SESSION["shopping_cart_product"]);

    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>