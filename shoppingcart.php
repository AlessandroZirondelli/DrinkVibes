<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    $templateParams["title"] = "Shopping cart";
    $templateParams["main-content"] = "main-shoppingcart.php";

    
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>
