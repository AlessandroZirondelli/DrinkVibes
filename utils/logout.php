<?php
   /* unset($_SESSION["userID"]);
    unset($_SESSION["name"]);
    unset($_SESSION["surname"]);
    unset($_SESSION["email"]);
    unset($_SESSION["type"]);
    unset($_SESSION["birthdate"]);*/
    /*$_SESSION["userID"]=null;
    $_SESSION["surname"]=null;
    $_SESSION["email"]=null;
    $_SESSION["type"]=null;
    $_SESSION["birthdate"]=null;

    $_POST["username"]=null;
    $_POST["password"]=null;*/
    session_start();
    session_unset();
    
    header("location:../index.php"); //mettere da qualche altra parte
?>