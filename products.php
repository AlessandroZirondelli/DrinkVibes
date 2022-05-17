<?php
    require_once("bootstrap.php"); 
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");  
    require_once("utils/HandMadeDrink.php");
    require_once("utils/ManagerAccounts.php");
    require_once("utils/Account.php");  

    $cssArray[0]="./assets/css/products-style.css"; 
    $jsArray[0]="./assets/js/products-admin.js";
    $jsArray[1]="./assets/js/products.js";

    $_SESSION["redirect"] = "empty";

    $manager = new ManagerProducts();
    $managerAcc = new ManagerAccounts();
    
    $templateParams["categories"] = ["Beverage", "Wine", "Spirits", "Default drink"];
    
    $templateParams["Wine"] = $manager -> getAllWineProducts();
    $templateParams["Spirits"] = $manager -> getAllSpiritsProducts();
    $templateParams["Beverage"] = $manager -> getAllBeverageProducts();
    $templateParams["Default drink"] = $manager -> getAllDefaultDrink();
    $templateParams["All"] = $manager -> getAllProducts();

    if(!isset( $_SESSION["shopping_cart_prod"])) {
        $_SESSION["shopping_cart_prod"] = serialize(array());
    }if(!isset( $_SESSION["shopping_cart_hmd"])) {
        $_SESSION["shopping_cart_hmd"] =  serialize(array());
    }
    $_SESSION["shopping_cart_temp"] = serialize(new HandMadeDrink());
    $templateParams["title"] = "Product list";
    
    if($managerAcc ->isUserLoggedIn()){
        if($_SESSION["type"] == "Admin") { 
            //se è loggato ma admin mostra products admin
            $templateParams["main-content"] = "main-products-admin.php"; 
        } else {
            //se è loggato mostra products normale
            $templateParams["main-content"] = "main-products.php"; 
        }
        
    } else {
        //se non è loggato mostra products normale --> ma non può comprare
        $templateParams["main-content"] = "main-products.php"; 
    }


    require_once("template/base.php");
?>