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

    //$jsArray[1]="./assets/js/products-search.js";
    //$jsArray[1]="./assets/js/button-top.js"; //pulsante che va sopra
   
    $_SESSION["redirect"] = "empty";

    $manager = new ManagerProducts();
    $managerAcc = new ManagerAccounts();
    
    $templateParams["categories"] = ["Beverage", "Wine", "Spirits", "Default drink"];
    
    $templateParams["Wine"] = $manager -> getAllWineProducts();
    $templateParams["Spirits"] = $manager -> getAllSpiritsProducts();
    $templateParams["Beverage"] = $manager -> getAllBeverageProducts();
    $templateParams["Default drink"] = $manager -> getAllDefaultDrink();
    $templateParams["All"] = $manager -> getAllProducts();
    //$templateParams["Search"] = $manager -> getSearchProduct();
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


    // va in base per le icone <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    // <link href="https://fonts.googleapis.com/css?family=Merriweather:400,900,900i" rel="stylesheet">


    require_once("template/base.php");
?>