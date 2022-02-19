<?php
 
require_once("utils/ManagerIngredients.php");
require_once("utils/Ingredient.php");
require_once("utils/HandMadeDrink.php");
session_start();
$mngIngredients = new ManagerIngredients();
$handMadeDrink = new HandMadeDrink();
//Prendo il temp ingredient nella SESSION
$handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]);
$action = $_REQUEST["action"];

if($action == 1){
    $qtn = $_REQUEST["qtn"];
    $id = $_REQUEST["id"];
   
    $ingredients = $mngIngredients -> getIngredientById($id); // Prendo l'ingredient dal DB

    //Prendo il temp ingredient nella SESSION
    if($qtn<= $ingredients[0]["qtystock"]){
        $mngIngredients -> updateIngredient($ingredients[0]["ingredientID"], $ingredients[0]["qtystock"] - $qtn);
        //Aggiungo l'ingredient al temp ingredient
        $handMadeDrink -> addIngredient(new Ingredient($ingredients[0]["ingredientID"],$ingredients[0]["name"],$qtn,$ingredients[0]["price"],$ingredients[0]["description"],$ingredients[0]["typology"],$ingredients[0]["category"]));
        //Rimetto nel temp ingredient della sessione
    }
    $_SESSION["shopping_cart_temp"] = serialize( $handMadeDrink);
}
if($action == 2){
    $arrayId = json_decode($_REQUEST["id"]);
    $handMadeDrink = unserialize($_SESSION["shopping_cart_temp"]);
    foreach($arrayId as $id){
        $ingredients = $mngIngredients -> getIngredientById($id);
        $mngIngredients -> updateIngredient($ingredients[0]["ingredientID"], $ingredients[0]["qtystock"] + $handMadeDrink ->getQtyIngredient($id));  
        $handMadeDrink -> removeIngredient($id);
    }
    $_SESSION["shopping_cart_temp"] = serialize($handMadeDrink);
}

$ingredientOnTable = $handMadeDrink -> getIngredient();
echo "<caption>Ingredients choosen</caption>";
echo "<thead>";
echo "<th>Ingredient</th>";
echo "<th>Quantity</th>";
echo "<th>Price</th>";
echo "</thead>";
echo "<tbody>";
$totalPrice=0;
foreach($ingredientOnTable as $ing){
    echo "<tr>";
    echo "<td>".$ing->getName()."</td>";
    echo "<td>".$ing->getQty()."</td>";
    echo "<td>".$ing->getPrice() * $ing->getQty() ."</td>";    
    echo '<td><div class="form-check"><input class="form-check-input" type="checkbox" id="cb'.$ing->getIngredientID().'" value="'.$ing->getIngredientID().'" aria-label="..." onclick = changeCheckbox('.$ing->getIngredientID().')></div></td>';
    echo "</tr>"; 
    $totalPrice = $totalPrice + $ing->getPrice() * $ing->getQty();
}
echo "</tbody>";
echo "<tfoot>";
echo "<tr>";
echo  "<td>Total</td>";
echo  "<td></td>";
echo  "<td>".$totalPrice."</td>";
echo  '<td><button class="btn btn-dark text-uppercase" onclick="deleteRow()">Remove</button></td>';
echo "</tr>";
echo"</tfoot>";

?>