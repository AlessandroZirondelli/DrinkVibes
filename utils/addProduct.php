<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/bootstrap.php");
    require_once("ManagerProducts.php");
    require_once("Product.php");
    $manager = new ManagerProducts();

    if($_FILES["imageToSave"]["name"] != ""){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
        $image = "./upload/" .  $_FILES["imageToSave"]["name"]  ;
    }else{
        $image = "assets/img/i.png";
    }
    
    $name = $_REQUEST["name"];
    $description = $_REQUEST["description"];
    $quantity = $_REQUEST["qtn"];
    $tipology = $_REQUEST["optradiotipology"];
    $price = $_REQUEST["price"];

    $manager -> insertProduct($name,$image,$description,$quantity, $tipology,$price);
    
    header("location:../products.php");
?>


    