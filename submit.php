<?php
require("utils/ManagerIngredients.php");
require("utils/HandMadeDrink.php");
require("utils/Ingredient.php");
session_start();
$action = $_REQUEST["action"];

$mngIngredients = new ManagerIngredients();
$handMadeDrink = new HandMadeDrink();
$handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]); 

if($action == 1){
    $id = $_REQUEST["id"];
    echo $mngIngredients -> getDisponibility($id);
}

if($action == 2){  
    $id = $mngIngredients -> maxId()[0]["max_id"] + 1 ;
    if($handMadeDrink -> getNumberTypeIng() > 0){
        $list_shopping_cart_hdm = $_SESSION["shopping_cart_hmd"];
        $list_shopping_cart_hdm_temp = array();
        $isEqual = true;
        $qtn = $_REQUEST["qtn"];
        $insuffIng = "";
        $firstAdd = true;
        
        foreach($list_shopping_cart_hdm as $hdm){
            $isEqual = true;
            foreach($handMadeDrink -> getIngredient() as $ing){
                if(!$hdm[0] -> isEqualIngredient($ing)){
                    $isEqual = false;      
                }
            }
            if($isEqual && $handMadeDrink->getNumberTypeIng() == $hdm[0]-> getNumberTypeIng()){
                $firstAdd = false;
            }else{
              
                array_push($list_shopping_cart_hdm_temp,array($hdm[0],$hdm[1]));
            }

        }
 
        $ingredients = $handMadeDrink -> getIngredient();
        foreach($ingredients as $ing){
            $firstQtn = $firstAdd ?  $ing->getQty() : 0;
            $firstQtn = $ing->getQty();
            if( ($ing->getQty() * $qtn - $firstQtn )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $insuffIng =  $insuffIng . $ing -> getName() . ", ";
            }
        }
    
        if(strcmp($insuffIng,"") == 0){
            foreach($ingredients as $ing){
                $firstQtn = $firstAdd ? $ing->getQty() : 0;    
                $firstQtn = $ing->getQty();
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $qtn - $firstQtn ));
                
            }
            echo "Added to shopping cart";
            if($firstAdd){  
                array_push($list_shopping_cart_hdm_temp,array($handMadeDrink,$qtn));
                
            }else{
                array_push($list_shopping_cart_hdm_temp,array($hdm[0],$hdm[1] + $qtn));
            }
        }else{
            echo "I seguenti prodotti non sono sufficienti nelle quantità selezionate ".$insuffIng;
        }
        $_SESSION["shopping_cart_hmd"] = $list_shopping_cart_hdm_temp;
    }else{
        echo "Select ingredients before add to shopping cart";
    }
}
?>