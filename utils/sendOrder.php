<?php
require_once("./../assets/db/database.php");
require_once("./ManagerOrders.php");
session_start();

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

if(empty($_SESSION["userID"])){
    $_SESSION["redirect"]="shoppingcart"; 
    header("location:../login.php");
}
else{
    $manager = new ManagerOrders();
    $manager->insertOrder();
    //To empty arrays
    $_SESSION["shopping_cart_prod"] = serialize(array());
    $_SESSION["shopping_cart_hmd"] =  serialize(array());
    header("location:../orders.php");
}



?>