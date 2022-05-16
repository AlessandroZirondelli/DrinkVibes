<?php

    require_once("bootstrap.php");
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");
    $manager = new ManagerProducts();
    var_dump($_FILES["imageToSave"]);
    var_dump($_FILES["imageToSave"]["name"] );
    if($_FILES["imageToSave"]["name"] != ""){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
        $image = "./upload/" .  $_FILES["imageToSave"]["name"]  ;
    }else{
        $image = "assets/img/i.png";
    }
    var_dump($_REQUEST["name"]);
    var_dump($_REQUEST["qtn"]);
    var_dump($_REQUEST["description"]);

    var_dump($_REQUEST["optradiotipology"]);
    var_dump($image);
    $name = $_REQUEST["name"];
    //$image =$_FILES["imageToSave"]["name"];
    $description = $_REQUEST["description"];
    $quantity = $_REQUEST["qtn"];
    $tipology = $_REQUEST["optradiotipology"];
    $price = $_REQUEST["price"];

    $manager -> insertProduct($name,$image,$description,$quantity, $tipology,$price);
    
    header("location:products.php");
?>


    