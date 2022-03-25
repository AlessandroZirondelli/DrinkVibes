<?php
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");
    session_start();
    $action = $_REQUEST["action"];
    $mngIngredients = new ManagerIngredients();
if($action == 1){
    $id = $_REQUEST["id"];
    $qtn = $_REQUEST["qtn"];
    $mngIngredients -> updateIngredient($id, $qtn);
   
}
if($action == 2){
    $id = $_REQUEST["id"];
    $mngIngredients -> deleteIngredient($id);
}
if($action == 3){
    $id = 1;
    $name = $_REQUEST["name"];
    $image = $_REQUEST["imageurl"];
    $description = $_REQUEST["descr"];
    $quantity = $_REQUEST["qtn"];
    $category = $_REQUEST["category"];
    $tipology = $_REQUEST["tipology"];
    $price = $_REQUEST["price"];
    echo $name;
    echo $image;
    echo $description;
    echo $quantity;
    echo $category;
    echo $tipology;
    echo $price;
    $mngIngredients -> insertIngredient($id,$name,$image,$description,$quantity,$category,$tipology,$price);
}



?>