<?php 
require_once("./../assets/db/database.php");
require_once("ManagerProducts.php");
require_once("Product.php");
session_start();
$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);
$mngProducts = new ManagerProducts();
$action = $_REQUEST["action"];
$list_prod = unserialize( $_SESSION["shopping_cart_prod"]);
$list_prod_temp = array();
$isFirst = true;
if($action == 1){
    $id = $_REQUEST["id"];
    $qtn = $_REQUEST["qtn"];
    $product = $mngProducts-> getProductsById($id); // Prendo l'ingredient dal DB

    //Prendo il temp ingredient nella SESSION
    if($qtn<= $product[0]["qtystock"]){
       
        $mngProducts -> updateProduct($product[0]["productID"], $product[0]["qtystock"] - $qtn);
        //Aggiungo l'ingredient al temp ingredient
        $sep ="___A___";
     //   var_dump( $list_prod);
        //var_dump($sep);
       // var_dump($product);
        foreach($list_prod as $prod){
            

            //echo $sep;
            //echo $prod;
            if($prod[0]->getProductID() != $id){
               //array_push($list_prod_temp,array(new Product($product[0]["productID"],$product[0]["name"],$product[0]["description"],$product[0]["price"],$product[0]["qtystock"],$product[0]["type"],$product[0]["imageURL"]),$qtn));
                array_push($list_prod_temp,array($prod[0],$prod[1]));
            }else{
                $isFirst = false;
                array_push($list_prod_temp,array($prod[0],$prod[1] + $qtn));
            }
        }
        if($isFirst == true){
           
            array_push($list_prod_temp,array(new Product($product[0]["productID"],$product[0]["name"],$product[0]["description"],$product[0]["price"],$product[0]["qtystock"],$product[0]["type"],$product[0]["imageURL"]),$qtn));

        }else{

        }
        //Rimetto nel temp ingredient della sessione
    }
    $_SESSION["shopping_cart_prod"] = serialize( $list_prod_temp);
}

?>