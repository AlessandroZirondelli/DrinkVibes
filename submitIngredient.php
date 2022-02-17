<?php
require("utils/ManagerIngredients.php");
$id = $_REQUEST["id"];
$mngIngredients = new ManagerIngredients();
//var_dump($id);
//var_dump($qtn);
//var_dump($mngIngredients -> isDisponibility($id,$qtn));
/*if($mngIngredients -> isDisponibility($id,$qtn)){
    echo "1";
}else{
    echo "0";
}*/
echo $mngIngredients -> getDisponibility($id);
?>