<?php
$type = $_REQUEST["type"];
if(strcmp($type,"handmadedrink")){
    $mngIngredients = new ManagerIngredients();
    $id = $mngIngredients -> getNewIngredientId();
    $qtn = $_REQUEST["qtn"];
    var_dump();
    $handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]); 
    if($handMadeDrink -> getNumberTypeIng()>0){
        $list_shopping_cart= $_SESSION["shopping_cart"];
        array_push($list_shopping_cart,array($handMadeDrink,$qtn));
        $_SESSION["shopping_cart"] = $list_shopping_cart;
    }
    
}
?>