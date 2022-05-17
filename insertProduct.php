<?php
    //pagina x la creazione del nuovo prodotto
    require_once("bootstrap.php"); 
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");

    $templateParams["title"] = "Insert Product";
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="insertProduct"; //indica che deve ritornare sulla pag
        header("location:login.php");
    }
    else if($_SESSION["type"]!="Admin"){
        //header("location:./template/mainaccessdenied.php");
        $templateParams["main-content"] = "main-accessdenied.php";
    }
    else{ // se sono amministratore
    $templateParams["main-content"] = "main-insertProduct.php";

    $cssArray[0]="./assets/css/products-style.css";
    $jsArray[0]="./assets/js/insertProduct.js";
    }
  
    require_once("template/base.php");

?>