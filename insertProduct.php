<?php
    require_once("bootstrap.php"); 
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");

    $templateParams["title"] = "Insert Product";
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="insertProduct";
        header("location:login.php");
    }
    else if($_SESSION["type"]!="Admin"){
        $templateParams["main-content"] = "main-accessdenied.php";
    }
    else{
    $templateParams["main-content"] = "main-insertProduct.php";

    $cssArray[0]="./assets/css/products-style.css";
    $jsArray[0]="./assets/js/insertProduct.js";
    }
  
    require_once("template/base.php");

?>