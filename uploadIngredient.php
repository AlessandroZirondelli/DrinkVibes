<?php
    require_once("bootstrap.php"); 
    require_once("utils/ManagerIngredients.php");
    require_once("utils/HandMadeDrink.php");
    require_once("utils/Ingredient.php");

    session_start();
    
    //it serves to understand what situation I am in
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

?>