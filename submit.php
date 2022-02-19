<?php
require("utils/ManagerIngredients.php");
require("utils/HandMadeDrink.php");
require("utils/Ingredient.php");
session_start();
$action = $_REQUEST["action"];
$mngIngredients = new ManagerIngredients();

if($action == 1){
    $id = $_REQUEST["id"];
    echo $mngIngredients -> getDisponibility($id);
}
if($action == 2){
    $qtn = $_REQUEST["qtn"];
    $insuffIng = "";
    $handMadeDrink = new HandMadeDrink();
    $handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]); 
 
    $ingredients = $handMadeDrink -> getIngredient();
    foreach($ingredients as $ing){
       if( ($ing->getQty() * $qtn - $ing->getQty() )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
        $insuffIng =  $insuffIng . $ing -> getName() . ", ";
       }
    }
  
    if(strcmp($insuffIng,"") == 0){
        $ciao = "ciao";
        foreach($ingredients as $ing){
           // if( ($ing->getQty() * $qtn - $ing->getQty() )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $qtn - $ing->getQty() ));
            //}
        }
        echo "Aggiunto al carrello";
        //echo "1";
    }else{
        echo "I seguenti prodotti non sono sufficienti nelle quantità selezionate".$insuffIng;

    }
}
?>