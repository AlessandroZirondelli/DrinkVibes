<?php
    
    require_once($_SERVER['DOCUMENT_ROOT']."/DrinkVibes/utils/ManagerAccounts.php");

    session_start();
    $action = $_REQUEST["action"];
    $mngAccounts = new ManagerAccounts();
    if($action == 1){       
        $userId = $_REQUEST["userId"];
        echo $mngAccounts -> isAvailableUserId($userId);
    }

?>