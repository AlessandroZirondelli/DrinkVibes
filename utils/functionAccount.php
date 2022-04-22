<?php
    require_once("bootstrap.php"); //require once, se è gia incliso non lo reinclude. C'è anche require e basta.
    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/ManagerAccounts.php");

    session_start();
    $action = $_REQUEST["action"];
    $mngAccounts = new ManagerAccounts();
if($action == 1){
    $userId = $_REQUEST["userId"];
   
    $mngAccounts -> checkUserId($userId);
   
}


?>