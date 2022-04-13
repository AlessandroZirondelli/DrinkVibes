<?php
    //pagina x la creazione del nuovo prodotto
    require_once("bootstrap.php"); 
    require_once("utils/ManagerProducts.php");
    require_once("utils/Product.php");

    $templateParams["title"] = "Insert Product";
    $templateParams["main-content"] = "main-insertProduct.php";

    $cssArray[0]="./assets/css/products-style.css";
    $jsArray[0]="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js";
    $jsArray[1]="./assets/js/insertProduct.js";
    
  
    require_once("template/base.php"); //base.php vede la roba definita dentro  e dentro questo file index.php

?>