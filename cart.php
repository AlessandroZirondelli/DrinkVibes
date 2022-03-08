<?php
require("utils/ManagerIngredients.php");
require("utils/HandMadeDrink.php");
require("utils/Ingredient.php");

session_start();

echo "<thead>";
echo "<th></th>";
echo "<th></th>";
echo "<th></th>";
echo "</thead>";
echo "<tbody>";
$list_shopping_cart_hdm = array();
$list_shopping_cart_hdm= unserialize($_SESSION["shopping_cart_hmd"]);

    echo "<tr>";
    echo "<td>carrello</td>";
    echo "<td></td>";
    echo "<td></td>";    
    echo '<td></td>';
    echo "</tr>"; 
foreach($list_shopping_cart_hdm as $hdm){
    
    echo "<tr>";
    echo "<td>".$hdm[0] -> getId()."</td>";
    echo "<td>"."Quantità: ".$hdm[1]."</td>";
    echo "<td></td>";    
    echo '<td></td>';
    echo "</tr>"; 
    foreach($hdm[0] -> getIngredient() as $ing){
        echo "<tr>";
        echo "<td></td>";
        echo "<td>".$ing -> getName()."</td>";
        echo "<td>".$ing -> getQty()."</td>";    
        echo '<td></td>';
        echo "</tr>"; 
    }
   
}
echo "<tr>";
echo "<td>Temp_drink</td>";
echo "<td></td>";
echo "<td></td>";    
echo '<td></td>';
echo "</tr>"; 
$list_shopping_cart_hdm_temp = new HandMadeDrink();
$ingredients =  array();
$list_shopping_cart_hdm_temp=unserialize($_SESSION["shopping_cart_temp"]);
$ingredients = $list_shopping_cart_hdm_temp ->getIngredient();
foreach($ingredients as $ing){
    echo "<tr>";
    echo "<td></td>";    
    echo "<td>".$ing->getName()."</td>";
    echo "<td>".$ing->getQty()."</td>";
    echo '<td></td>';
    echo "</tr>"; 
   
}

/*$ciao = "faufdhjdajodfjo";
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
    
}*/
?>