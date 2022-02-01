<?php

    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    $templateParams["title"] = "Make your drink";
    $templateParams["main-content"] = "main-makeyourdrink.php";
    $cssArray[0]="./assets/css/makeyourdrink-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $mngIngredients = new ManagerIngredients();
    $templateParams["liquidingredient"] = $mngIngredients -> getAllLiquidIngredients();
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>

