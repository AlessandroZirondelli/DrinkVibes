<?php

require_once("bootstrap.php");
$entra = "entra";

    var_dump($entra);
    list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
   
    var_dump($result);
    var_dump($msg);

    header("location:makeyourdrink-admin.php");


?>