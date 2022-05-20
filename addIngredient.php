<?php

require_once("bootstrap.php");
require_once("utils/ManagerIngredients.php");
require_once("utils/HandMadeDrink.php");
require_once("utils/Ingredient.php");
$mngIngredients = new ManagerIngredients();

    if($_FILES["imageToSave"]["name"] != ""){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
        $image = "./upload/" .  $_FILES["imageToSave"]["name"];
    }else{
        $image = "assets/img/i.png";
    }
    
    $name = $_REQUEST["name"];
    $description = $_REQUEST["description"];
    $quantity = $_REQUEST["qtn"];
    $category = $_REQUEST["optradiocategory"];
    if($category == "Liquid"){
        $tipology = $_REQUEST["optradiotipology"];
    }else{
        $tipology = "";
    }
    $price = $_REQUEST["price"];
    $mngIngredients -> insertIngredient($name,$image,$description,$quantity,$category,$tipology,$price);


    header("location:makeyourdrink.php"); //mettere da qualche altra parte
?>