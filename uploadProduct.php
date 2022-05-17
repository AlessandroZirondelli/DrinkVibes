<?php
//chiamato dai file js
    require_once("bootstrap.php");
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");

    //come in login
    session_start();

    //serve per capire in che situazione sono
    $action = $_REQUEST["action"];
    
    $manager = new ManagerProducts();
    if ($action == 1) {
        $id = $_REQUEST["id"];
        $qtn = $_REQUEST["qtn"];
        $manager -> updateProduct($id, $qtn);
    }

    if ($action == 2) {
        $id = $_REQUEST["id"];
        $manager->deleteProduct($id);
    }
/*
    if($action == 3){
        $name = $_REQUEST["name"];
        $image = $_REQUEST["imageurl"];
        $description = $_REQUEST["descr"];
        $quantity = $_REQUEST["qtn"];
        $tipology = $_REQUEST["tipology"];
        $price = $_REQUEST["price"];
        echo $name;
        echo $image;
        echo $description;
        echo $tipology;
        echo $price;
                                             
        $manager -> insertProduct($name,$image,$description,$quantity, $tipology,$price);
    
    
    }
   */
?>