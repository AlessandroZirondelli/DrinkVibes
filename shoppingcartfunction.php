<?php
require_once("utils/ManagerIngredients.php");
require_once("utils/HandMadeDrink.php");
require_once("utils/Ingredient.php");
session_start();

$action = $_REQUEST["action"];


if($action == 1){
  
    $id = $_REQUEST["id"];
    
    $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
    $list_drink_temp = array();
    $mngIngredients = new ManagerIngredients();
    $ingredients = $mngIngredients -> getIngredientById($id);

    foreach($list_drink as $drink){
        if(!($drink[0] -> getId() == $id)){
            array_push($list_drink_temp, array($drink[0],$drink[1]));
        }else{
            foreach($drink[0]->getIngredient() as $ing){
                $ingredients = $mngIngredients -> getIngredientById($ing -> getIngredientID());
                $mngIngredients -> updateIngredient($ing -> getIngredientID(), $ingredients[0]["qtystock"] + ($ing -> getQty() * $drink[1]));  
            }
        }
    }
    $_SESSION["shopping_cart_hmd"] = serialize( $list_drink_temp );
}
if($action == 2){
    $id = $_REQUEST["id"];
    $valueRead = $_REQUEST["value"];
    $valueStored = 0;
    $drinkSelected = new HandMadeDrink();
    $mngIngredients = new ManagerIngredients();
    $insuff = "";
    $list_drink_temp = array();
    $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
    
    foreach($list_drink as $drink){
        if($drink[0] -> getId() == $id){
            $drinkSelected = $drink[0];
            $valueStored = $drink[1];
        }else{
            array_push($list_drink_temp, array($drink[0],$drink[1]));
        }
    }
    $sep = "_______";
    //var_dump($sep);
    //var_dump( $drinkSelected);
    //var_dump( $valueStored);
    //var_dump( $valueRead);
    //var_dump($sep);
    if($valueRead>$valueStored){
        $insuffIng = "";
        $val =  $valueRead - $valueStored;
        $sep = "val___";
        //var_dump($sep);
        //var_dump($val);
        $sep1 = "valueRead___";
        //var_dump($sep1);
        //var_dump($valueRead);
        
        $sep2= "valueStored____";
        //var_dump($sep2);
        //var_dump($valueStored);
        

        $ingredients = $drinkSelected -> getIngredient();
        foreach($ingredients as $ing){
            if( ($ing->getQty() * $val )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $insuffIng =  $insuffIng . $ing -> getName() . ", ";
                $s = "_____";
                //var_dump($s);
                //var_dump($insuffIng);
            }
        }



        if(strcmp($insuffIng,"") == 0){
            foreach($ingredients as $ing){
    
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $val ));
                
            }
            //echo "Added to shopping cart";
            
            array_push($list_drink_temp,array($drinkSelected, $valueRead));
            echo "Added";
        }else{
            array_push($list_drink_temp,array($drinkSelected, $valueStored));
            echo $valueStored;
        }
       // $min = "minore";
       // var_dump($min);
    }
    if($valueRead<$valueStored){
        $max = "maggiore";
        //var_dump($max);
        $val = $valueStored - $valueRead;
        foreach($drinkSelected -> getIngredient() as $ing){
           // echo $ing->getQty();
           // echo $val;
           // echo $val * $ing -> getQty();
            //var_dump($ing->getQty());
            //var_dump($val);
            //var_dump($val * $ing-> getQty());
            $ingredients = $mngIngredients -> getIngredientById($ing -> getIngredientID());
            //var_dump($ingredients[0]["qtystock"]);
            //var_dump($ingredients[0]["qtystock"] + ($val * $ing -> getQty()) );
            $mngIngredients -> updateIngredient($ing -> getIngredientID(), $ingredients[0]["qtystock"] + ($val * $ing -> getQty()));  
        }
        array_push($list_drink_temp, array($drinkSelected, $valueRead));
        $max = "maggiore";
        //var_dump($max);
       // var_dump($val);
    }
    $_SESSION["shopping_cart_hmd"] = serialize($list_drink_temp) ;
}
if($action == 5){
    $total = 0;
    $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
    foreach( $list_drink as $drink){
        $total = $total + ($drink[0]->getTotalPrice() * $drink[1]);

    }

    echo $total;
}
if($action == 6){
    $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
   
}


?>