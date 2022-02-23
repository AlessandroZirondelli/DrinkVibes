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
    $primo = "first";
    $secondo  = "second";

    $id = $mngIngredients -> maxId()[0]["max_id"] + 1 ;
    $ciao = "ciao";
    $by = "by";
    if($handMadeDrink -> getNumberTypeIng() > 0){
        $list_shopping_cart_hdm = $_SESSION["shopping_cart_hmd"];
        $list_shopping_cart_hdm_temp = array();
        $isEqual = true;
        $qtn = $_REQUEST["qtn"];
        $insuffIng = "";
        $firstAdd = true;
       // var_dump($id);
        foreach($list_shopping_cart_hdm as $hdm){
            $isEqual = true;
            //var_dump($hdm[0]);
            
            foreach($handMadeDrink -> getIngredient() as $ing){
                if(!$hdm[0] -> isEqualIngredient($ing)){
                    $isEqual = false;
                    
                }
            }
            if($isEqual && $handMadeDrink->getNumberTypeIng() == $hdm[0]-> getNumberTypeIng()){
        
                //$hdm[1] = intval($hdm[1]) + $qtn;
              
                $firstAdd = false;
                array_push($list_shopping_cart_hdm_temp,array($hdm[0],$hdm[1] + $qtn));
            }else{
              

                array_push($list_shopping_cart_hdm_temp,array($hdm[0],$hdm[1]));
            }

        }
        if($firstAdd){
            array_push($list_shopping_cart_hdm_temp,array($handMadeDrink,$qtn));
        }
        //controllo drink
        
        $ingredients = $handMadeDrink -> getIngredient();
        foreach($ingredients as $ing){
            $firstAdd = $isEqual ? $ing->getQty() : 0;
            if( ($ing->getQty() * $qtn - $firstAdd )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $insuffIng =  $insuffIng . $ing -> getName() . ", ";
            }
        }
    
        if(strcmp($insuffIng,"") == 0){
            foreach($ingredients as $ing){
            // if( ($ing->getQty() * $qtn - $ing->getQty() )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $firstAdd = $isEqual ? $ing->getQty() : 0;    
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $qtn - $firstAdd ));
                //}
            }
            echo "Added to shopping cart";
            //echo "1";
        }else{
            echo "I seguenti prodotti non sono sufficienti nelle quantità selezionate ".$insuffIng;
        }
        $_SESSION["shopping_cart_hmd"] = $list_shopping_cart_hdm_temp;
    }else{
        echo "Select ingredients before add to shopping cart";
    }
    /*$sep = "____________________";
    $arr = array();
    $arr = $_SESSION["shopping_cart_hmd"];
    foreach($arr as $dr){
        var_dump($dr);
        var_dump($sep);
    }
   
    
    var_dump($_SESSION["shopping_cart_temp"]);*/
    //var_dump($list_shopping_cart_hdm_temp);
}
?>