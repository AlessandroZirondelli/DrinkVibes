<?php

    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/bootstrap.php");
    require_once("ManagerProducts.php");
    require_once("Product.php");

    session_start();

    //it serves to understand what situation I am in
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
?>