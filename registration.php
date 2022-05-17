<?php

require_once("bootstrap.php");
require_once("./utils/ManagerAccounts.php");
require_once("./utils/Account.php");  

$cssArray[0]="./assets/css/login-style.css";
$jsArray[0]="./assets/js/account/insertAccount.js";
$manager = new ManagerAccounts();

$templateParams["title"] = "Registration";
$templateParams["main-content"] = "main-registrationform.php";


require_once ("template/base.php");


?>