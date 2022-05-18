<?php
    require_once("bootstrap.php"); //require once, if it's already include , it doesn't reinclude another time. 
    require_once("./utils/ManagerNotifications.php");
    $_SESSION["redirect"] = "empty";
    /*require_once("./utils/functions.php");
    
    if(!isUserLoggedIn()){
        header("location: login.php");
    }
    */
    $templateParams["title"] = "Notifications";
    if(empty($_SESSION["userID"])){
        $_SESSION["redirect"]="notifications"; //indicates that it should return to the page
        header("location:login.php");
    }
    $templateParams["main-content"] = "main-notifications.php";
    $cssArray[0]="./assets/css/notifications-style.css";
    
    $manager=new ManagerNotifications();
    /*
    $type="User";
    $userID="Nick987";//$userID = $_SESSION["user"];
*/
    
    $type=$_SESSION["type"];
    $userID=$_SESSION["userID"];
    
    $manager->createNotifications($type,$userID);
    $notificationsTypeOne=$manager->getNotificationsTypeOne();
    $notificationsTypeTwo=$manager->getNotificationsTypeTwo();
    
    require_once("template/base.php");
?>