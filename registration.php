<?php

require_once("bootstrap.php");
require_once("./utils/ManagerAccounts.php");
require_once("./utils/Account.php");  

$cssArray[0]="./assets/css/login-style.css";
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

}else{ //Registrazione come utente
    $templateParams["title"] = "Registration";
    $templateParams["main-content"] = "main-registrationform.php";

}

require_once ("template/base.php");


?>