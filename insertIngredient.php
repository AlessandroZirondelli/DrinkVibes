<?php
    
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    $templateParams["title"] = "Insert Ingredient";
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="insertIngredient"; //indica che deve ritornare sulla pag
        header("location:login.php");
    }else if($_SESSION["type"]!="Admin"){
        //header("location:./template/mainaccessdenied.php");
        $templateParams["main-content"] = "main-accessdenied.php";
    }
    else{
        $templateParams["main-content"] = "main-insertingredient.php";
        $cssArray[0]="./assets/css/makeyourdrinkadmin-style.css";
        $jsArray[0]="./assets/js/insertIngredient.js";
    }
    
    
  
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>

