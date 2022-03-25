<?php

require_once("bootstrap.php");
    if($_FILES["imageToSave"]!= NULL){
        list($result, $msg) = uploadImage(UPLOAD_DIR, $_FILES["imageToSave"]);
    }
    header("location:makeyourdrink-admin.php");
?>