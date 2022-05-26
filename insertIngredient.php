<?php
    require_once("bootstrap.php");
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    $templateParams["title"] = "Insert Ingredient";
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="insertIngredient"; //redirect to insertIngredientPage if user now is logged
        header("location:login.php");
    }else if($_SESSION["type"]!="Admin"){
        $templateParams["main-content"] = "main-accessdenied.php";
    }
    else{
        $templateParams["main-content"] = "main-insertingredient.php";
        $cssArray[0]="./assets/css/makeyourdrinkadmin-style.css";
        $jsArray[0]="./assets/js/insertIngredient.js";
    }
    require_once("template/base.php");
?>