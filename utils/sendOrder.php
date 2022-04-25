<?php
require_once("./../assets/db/database.php");
require_once("./ManagerOrders.php");
session_start();

$dbh = new DatabaseHelper("localhost", "root", "", "drinkdb",3306);

//$userID = $_SESSION["userID"];

if(empty($_SESSION["userID"])){
    $_SESSION["redirect"]="shoppingcart"; //indica che deve ritornare sulla pag
    header("location:../login.php");
}
else{
    $manager = new ManagerOrders();
    $manager->insertOrder();
    $_SESSION["shopping_cart_prod"] = serialize(array());
    $_SESSION["shopping_cart_hmd"] =  serialize(array());
    header("location:../orders.php");
}



?>