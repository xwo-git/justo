<?php
    //connexion a la base de donner des
    $connexion = mysqli_connect("localhost","root","","produitsjusto");
    // verifier la connexion
    if(!$connexion) die('Erreur : '.mysqli_connect_error());
?>