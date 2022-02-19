<?php
require("utils/ManagerIngredients.php");
require("utils/HandMadeDrink.php");
require("utils/Ingredient.php");
session_start();
$ciao = "ciao";
$type = $_REQUEST["type"];
var_dump($ciao);

if(strcmp($type,"handmadedrink")){
    //var_dump($ciao);
    $mngIngredients = new ManagerIngredients();
    $id = $mngIngredients -> getNewIngredientId();
    $qtn = $_REQUEST["qtn"];
    //var_dump();
    $handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]); 
    if($handMadeDrink -> getNumberTypeIng()>0){
        $list_shopping_cart_hdm= $_SESSION["shopping_cart_hmd"];
        $isEqual = true;
        foreach($list_shopping_cart_hdm as $hdm){
            foreach($handMadeDrink -> getIngredient() as $ing){
                if(!$hdm[0] -> isEqualIngredient($ing){
                    $isEqual = false;
                }
            }
            if( $isEqual ){
                $hdm[1] = $hdm[1] + $qtn; 
            }else{
                array_push($list_shopping_cart_hdm,array($handMadeDrink,$qtn));
            }
        }
        
        //array_push($list_shopping_cart_hdm,array($handMadeDrink,$qtn));
        $_SESSION["shopping_cart_hmd"] = $list_shopping_cart_hdm;
        var_dump($_SESSION["shopping_cart_hmd"]);
    }
    
}
?>