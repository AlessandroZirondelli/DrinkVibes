<?php
require_once("utils/ManagerIngredients.php");
$mngIngredients = new ManagerIngredients();

// get the q parameter from URL
$qtn = $_REQUEST["qtn"];
$id = $_REQUEST["id"];
echo $qtn;
echo $id;
$ingredients = $mngIngredients -> getIngredientById($id);
var_dump( $ingredients);
if($qtn<= $ingredients[0]["qtystock"]){
    echo "v";
}else{
    echo "f";
}
$table = "";

// lookup all hints from array if $q is different from ""


// Output "no suggestion" if no hint was found or output correct values
echo $table === "" ? "no suggestion" : $table;
?> 