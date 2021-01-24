<?php
    session_start();
    if(($_SESSION['role']=="BACKOFFICE")){
        header('Location: /web_project/auth/notAuthorized.php');
        exit;
    }
    else if(!($_SESSION['role']=="ADMINISTRADOR")){
        header('Location: /web_project/auth/login.php');
        exit;
    }
?>