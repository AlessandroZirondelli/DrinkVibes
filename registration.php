<?php
require_once 'bootstrap.php';
require_once("utils/ManagerAccounts.php");
require_once("utils/Account.php");  

$cssArray[0]="./assets/css/login-style.css";
//va in base per le icone <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
$jsArray[0]="./assets/js/insertAccount.js";
$manager = new ManagerAccounts();


if($manager -> isUserLoggedIn()){
    //pagina admin
    $templateParams["title"] = "Registration";
    if($_SESSION["type"] == "Admin") { 
        $templateParams["main-content"] = "main-registrationform.php";
    } else {
        $templateParams["main-content"] = "main-registrationhome.php";
    }

}else{
    $templateParams["title"] = "Registration";
    $templateParams["main-content"] = "main-registrationform.php";

}


require 'template/base.php';

?>