<?php
    include_once "product_dbb.php";
    if(!isset($_SESSION)) {
        session_start();
    }
    if (!isset($_SESSION['id_product'])) {
        $_SESSION['id_product'] = array();
    }
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $produit = mysqli_query($connexion, "SELECT * FROM produits WHERE id = $id");
        if (empty(mysqli_fetch_assoc($produit))) {
            die("Ce produit n'existe pas");
        }
        if(isset($_SESSION['id_product'][$id])) {
            $_SESSION['id_product'][$id++];
        } else {
            $_SESSION['id_product'][$id] = 1;
            echo "Le produit a bien ete ajouter au panier";
        }
        header("location: produit.php");
    }
?>