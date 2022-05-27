<?php

require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/bootstrap.php");
require_once("ManagerIngredients.php");
require_once("HandMadeDrink.php");
require_once("Ingredient.php");
$mngIngredients = new ManagerIngredients();

    if($_FILES["imageToSave"]["name"] != ""){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
        if($result == 1){
            $image = "./upload/" . $msg;
        }else{
            $image = "assets/img/prd_default.png";
        }
    }else{
        $image = "assets/img/prd_default.png";
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


    header("location:../makeyourdrink.php"); //mettere da qualche altra parte
?>