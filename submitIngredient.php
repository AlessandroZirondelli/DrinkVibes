<?php
require("utils/ManagerIngredients.php");
$id = $_REQUEST["id"];
$qtn = $_REQUEST["qtn"];
$mngIngredients = new ManagerIngredients();
//var_dump($id);
//var_dump($qtn);
//var_dump($mngIngredients -> isDisponibility($id,$qtn));
if($mngIngredients -> isDisponibility($id,$qtn)){
    echo "1";
}else{
    echo "0";
}
?>