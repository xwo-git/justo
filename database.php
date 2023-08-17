<?php
// definir la connexion a la base de donne 
    define('HOST', 'localhost');
    define('DB_NAME', 'justo');
    define('USER', 'root');
    define('PASS', '');
    
    try {
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
    }
?>