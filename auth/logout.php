<?php
    session_start();
    unset($_SESSION['name']);
    session_destroy();
    header('Location: ../auth/login.php');
?>