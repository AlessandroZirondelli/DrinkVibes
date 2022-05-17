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




?>