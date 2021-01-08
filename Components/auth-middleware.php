<?php
    session_start();
    if(!isset($_SESSION['name'])){
        header('Location: /web_project/auth/login.php');
        exit;
    }
?>