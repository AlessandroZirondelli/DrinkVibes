<?php
require_once 'bootstrap.php';
require_once("utils/ManagerAccounts.php");
require_once("utils/Account.php");  

$cssArray[0]="./assets/css/login-style.css";

$manager = new ManagerAccounts();

//check username e password
if(isset($_POST["username"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["username"], $_POST["password"]);
    if($login_result==false){
        //Login failed
        $templateParams["errorelogin"] = "Wrong username or password! Try again.";
    }
    else{
        echo "ciao";
        $loggedUser = $manager->getInfoAccount($_POST["username"]);
        $manager -> registerLoggedUser($loggedUser);
        
        // It is used for redirection when I click on Order but I am not logged in
        // Then I click on order, it redirects me to login, after which it automatically returns to order
        if(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="orders")){
            $_SESSION["redirect"]="empty"; // risetto la variabile ad empty in quanto altrimenti ogni volta che si carica la pagina di login mi si reindirizza in automativo alla pagina degli ordini
            header("location:orders.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="insertProduct")){
            $_SESSION["redirect"]="empty";
            header("location:insertProduct.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="insertIngredient")){
            $_SESSION["redirect"]="empty";
            header("location:insertIngredient.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="notifications")){
            $_SESSION["redirect"]="empty";
            header("location:notifications.php");
        }
        elseif(isset($_SESSION["redirect"]) && ($_SESSION["redirect"]=="shoppingcart")){
            $_SESSION["redirect"]="empty";
            header("location:shoppingcart.php");
        }
    }
}




if($manager -> isUserLoggedIn()){ //if the user is already logged in
    if($_SESSION["type"] == "Admin") { 
        $templateParams["title"] = "Manage Account";
        $templateParams["main-content"] = "main-manageaccounts.php";
    }else{
        $templateParams["title"] = "Summary Account";
        $templateParams["main-content"] = "main-summaryaccount.php";
    } 
}
else{ //if the user isn't logged in
    $templateParams["title"] = "Login";
    $templateParams["main-content"] = "main-loginform.php";
}


require_once("template/base.php");

?>