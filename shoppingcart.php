<?php
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");

    $templateParams["title"] = "Shopping cart";
    $templateParams["main-content"] = "main-shoppingcart.php";
    $cssArray[0]="./assets/css/shoppingcart-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $jsArray[1]="./assets/js/shoppingcart.js";
    $templateParams["hmd"] = array(array());
    $templateParams["hmd"] = unserialize( $_SESSION["shopping_cart_hmd"]);
    $sep = "__";
    var_dump($sep);
    var_dump($templateParams["hmd"]);
   // $templateParams["product"] = unserialize( $_SESSION["shopping_cart_product"]);

    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>