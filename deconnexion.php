<?php
    session_start();
    // *TODO: Supprimer les cookies 
    setcookie('id', '', time()-3600);
    setcookie('username', '', time()-3600);
    // *TODO: Suprimme les variables en sessions
    unset($_SESSION['valid_data']);
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("Location: index.php");
?>
