<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    $templateParams["title"] = "Insert Ingredient";
    $templateParams["main-content"] = "main-insertingredient.php";
    $cssArray[0]="./assets/css/makeyourdrinkadmin-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $jsArray[1]="./assets/js/insertIngredient.js";
    
  
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>

