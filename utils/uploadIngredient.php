<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/bootstrap.php"); 
    require_once("ManagerIngredients.php");
    require_once("HandMadeDrink.php");
    require_once("Ingredient.php");

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