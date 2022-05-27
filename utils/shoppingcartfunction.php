<?php
require_once("ManagerIngredients.php");
require_once("HandMadeDrink.php");
require_once("Ingredient.php");
require_once("Product.php");
require_once("ManagerProducts.php");
require_once("ManagerInsertOrder.php");
require_once("Order.php");
require_once("OrderDetail.php");
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
 
    if($valueRead>$valueStored){
        $insuffIng = "";
        $val =  $valueRead - $valueStored;
       
        $ingredients = $drinkSelected -> getIngredient();
        foreach($ingredients as $ing){
            if( ($ing->getQty() * $val )> $mngIngredients -> getDisponibility($ing -> getIngredientId()) ){
                $insuffIng =  $insuffIng . $ing -> getName() . ", ";
            }
        }
        
        if(strcmp($insuffIng,"") == 0){
            foreach($ingredients as $ing){
    
                $mngIngredients -> updateIngredient($ing -> getIngredientId(), $mngIngredients -> getDisponibility($ing -> getIngredientId()) - ($ing->getQty() * $val ));
                
            }           
            array_push($list_drink_temp,array($drinkSelected, $valueRead));
            echo "Added";
        }else{
            array_push($list_drink_temp,array($drinkSelected, $valueStored));
            echo $valueStored;
        }
      
    }
    if($valueRead<$valueStored){
        $max = "maggiore";
        $val = $valueStored - $valueRead;
        foreach($drinkSelected -> getIngredient() as $ing){
            $ingredients = $mngIngredients -> getIngredientById($ing -> getIngredientID());
            $mngIngredients -> updateIngredient($ing -> getIngredientID(), $ingredients[0]["qtystock"] + ($val * $ing -> getQty()));  
        }
        array_push($list_drink_temp, array($drinkSelected, $valueRead));
        $max = "maggiore";
    }
    $_SESSION["shopping_cart_hmd"] = serialize($list_drink_temp) ;
}
if($action == 5){
    $total = 0;
    
    if(isset( $_SESSION["shopping_cart_hmd"]) && !empty( $_SESSION["shopping_cart_hmd"])) {
        $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
        foreach( $list_drink as $drink){
            $total = $total + ($drink[0]->getTotalPrice() * $drink[1]);
    
        }
    
    }
    if(isset( $_SESSION["shopping_cart_prod"]) && !empty( $_SESSION["shopping_cart_prod"])) {
        $list_prod = unserialize( $_SESSION["shopping_cart_prod"]);
        foreach( $list_prod as $prod){
            $total = $total + ($prod[0]->getPrice() * $prod[1]);
    
        }
    
    }
   

    echo $total;
}
if($action == 6){
    $tot = 0;
    if(isset( $_SESSION["shopping_cart_hmd"]) && !empty( $_SESSION["shopping_cart_hmd"])) {
        $list_drink = unserialize( $_SESSION["shopping_cart_hmd"]);
        $tot = $tot +  count($list_drink);
    
    }
    if(isset( $_SESSION["shopping_cart_prod"]) && !empty( $_SESSION["shopping_cart_prod"])) {
        $list_prod = unserialize( $_SESSION["shopping_cart_prod"]);
        $tot = $tot +  count($list_prod);
    
    }
    echo $tot;
   
}
if($action == 7){
    $id = $_REQUEST["id"];
    
    $list_prod = unserialize( $_SESSION["shopping_cart_prod"]);
    $list_prod_temp = array();
    $mngProducts = new ManagerProducts();
    

    foreach($list_prod as $prod){
        if(!($prod[0] -> getProductID() == $id)){
            array_push($list_prod_temp, array($prod[0],$prod[1]));
        }else{
            $mngProducts ->updateProduct($prod[0] -> getProductID(), $prod[1] + $mngProducts -> getProductDisponibility($prod[0] -> getProductID()));
        }
    }
    $_SESSION["shopping_cart_prod"] = serialize( $list_prod_temp );

   
}
if($action == 8){
    $id = $_REQUEST["id"];
    $valueRead = $_REQUEST["value"];
    $valueStored = 0;
    $prodSelected ="";
    $mngProducts = new ManagerProducts();
    $insuffIng = "";
    $list_prod_temp = array();
    $list_prod = unserialize( $_SESSION["shopping_cart_prod"]);   
    
    foreach($list_prod as $prod){
        if($prod[0] -> getProductID() == $id){
            $prodSelected = $prod[0];
            $valueStored = $prod[1];
        }else{
            array_push($list_prod_temp, array($prod[0],$prod[1]));
        }
    }
 
    if($valueRead>$valueStored){
        $val =  $valueRead - $valueStored;
        $valDb = intval($mngProducts ->getProductDisponibility($id));
       
        if($val >$valDb){
            
            $insuffIng = "insuff";
            
        }

   
        if(strcmp($insuffIng,"") == 0){
            $mngProducts -> updateProduct($prodSelected -> getProductID(), $mngProducts -> getProductDisponibility($prodSelected -> getProductID()) - $val);
            $v = $mngProducts -> getProductDisponibility($prodSelected -> getProductID()) - $val;            
            array_push($list_prod_temp,array($prodSelected, $valueRead));
            echo "Added";
        }else{
            array_push($list_prod_temp,array($prodSelected, $valueStored));
            echo $valueStored;
        }
      
    }
    if($valueRead<$valueStored){
       
        $val = $valueStored - $valueRead;
        $mngProducts -> updateProduct($prodSelected -> getProductID(), $mngProducts -> getProductDisponibility($prodSelected -> getProductID()) + $val);
        
        array_push($list_prod_temp, array($prodSelected, $valueRead));
        
    }
    $_SESSION["shopping_cart_prod"] = serialize($list_prod_temp) ;
}



?>