<?php
    require_once("bootstrap.php"); 
    require_once("./utils/ManagerProducts.php"); 

    $templateParams["title"] = "Product list";
    $templateParams["main-content"] = "main-products.php"; 
    $cssArray[0]="./assets/css/product-style.css"; 
    //$jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    //$jsArray[1]="./assets/js/products-search.js";
    
    $manager = new ManagerProducts();
    
    $templateParams["wineProducts"] = $manager -> getAllWineProducts();
    $templateParams["spiritsProducts"] = $manager -> getAllSpiritsProducts();
    $templateParams["beverageProducts"] = $manager -> getAllBeverageProducts();    

    require_once("template/base.php");
?>