<?php
require_once("ManagerIngredients.php");
require_once("ManagerProducts.php");
require_once("HandMadeDrink.php");
require_once("Ingredient.php");

session_start();

//it serves to understand what situation I am in
$action = $_REQUEST["action"];

$mngProducts = new ManagerProducts();
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
        $list_shopping_cart_hdm = unserialize( $_SESSION["shopping_cart_hmd"]);
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
            $firstQtn = $ing->getQty();
            if( ($ing->getQty() * $qtn - $firstQtn )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $insuffIng =  $insuffIng . $ing -> getName() . ", ";
            }
        }
    
        if(strcmp($insuffIng,"") == 0){
            foreach($ingredients as $ing){   
                $firstQtn = $ing->getQty();
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $qtn - $firstQtn ));
                
            }
            echo "Added to shopping cart";
            if($firstAdd){  
                $id_max=0;
                foreach($list_shopping_cart_hdm_temp as $drink){
                    if($drink[0]->getId()>$id_max){
                        $id_max = $drink[0]->getId();
                    }
                }
                $handMadeDrink -> setId($id_max + 1);
                array_push($list_shopping_cart_hdm_temp,array($handMadeDrink,$qtn));
                
            }else{
                array_push($list_shopping_cart_hdm_temp,array($hdm[0],$hdm[1] + $qtn));
            }
        }else{
            echo "Ingredients aren't available for selected quantity:".$insuffIng;
        }
        $_SESSION["shopping_cart_hmd"] = serialize($list_shopping_cart_hdm_temp);
       
    }else{
        echo "Select ingredients before add to shopping cart";
    }
}
if($action == 3){
    $id = $_REQUEST["id"];
    echo $mngProducts -> getDisponibility($id);
}
?>