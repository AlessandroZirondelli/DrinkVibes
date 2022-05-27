<?php
    require_once("bootstrap.php"); 
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");  
    require_once("utils/HandMadeDrink.php");
    require_once("utils/ManagerAccounts.php");
    require_once("utils/Account.php");  

    $cssArray[0]="./assets/css/products-style.css"; 

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
            //if logged as admin, it show products admin
            $jsArray[0]="./assets/js/products/products-admin.js";
            $templateParams["main-content"] = "main-products-admin.php"; 
        } else {
            //if logged as client it show normal products
            $jsArray[0]="./assets/js/products/products.js";
            $templateParams["main-content"] = "main-products.php"; 
        }
        
    } else {
        // if not logged in show normal products -> but can't buy
        $jsArray[0]="./assets/js/products/products.js";
        $templateParams["main-content"] = "main-products.php"; 
    }


    require_once("template/base.php");
?>